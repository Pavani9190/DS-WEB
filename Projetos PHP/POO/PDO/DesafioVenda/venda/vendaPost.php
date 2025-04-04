<?php
header("Content-Type: application/json"); //Prepara o cabeçalho para responder em JSON
try{
    //Validando o conteúdo de requisição
    $json = file_get_contents('php://input');
        if (empty($json)) {
            throw new Exception("Nenhum dado JSON recebido");
        }

    //Validando estrutura do JSON
    $data = json_decode($json, true);

        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new Exception("JSON inválido: " . json_last_error_msg());
        }
        
        //Validar se a array cliente contém os dados
        if (!isset($data['cliente'])) {
            throw new Exception("Estrutura de dados inválida: campo 'cliente' ausente");
        }
        
        //Validar se a array produtos contém os dados
        if (!isset($data['produtos']) || !is_array($data['produtos'])) {
            throw new Exception("Estrutura de dados inválida: campo 'produtos' ausente ou não é array");
        }

        //Valida dados do cliente
        if (empty($data['cliente']['idCliente'])) {
            throw new Exception("ID do cliente é obrigatório");
        }
        
        if (!is_numeric($data['cliente']['idCliente'])) {
            throw new Exception("ID do cliente deve ser numérico");
        }
        
        if (empty($data['cliente']['nomeCliente'])) {
            throw new Exception("Nome do cliente é obrigatório");
        }

        //Valida dados dos produtos
        if (count($data['produtos']) === 0) {
            throw new Exception("Nenhum produto foi enviado");
        }
        
        foreach ($data['produtos'] as $produto) {
            if (empty($produto['id'])) {
                throw new Exception("ID do produto é obrigatório");
            }
            
            if (empty($produto['nome'])) {
                throw new Exception("Nome do produto é obrigatório");
            }
            
            if (!isset($produto['quantidade']) || $produto['quantidade'] <= 0) {
                throw new Exception("Quantidade do produto deve ser maior que zero");
            }
            
            if (!is_numeric($produto['preco']) || $produto['preco'] <= 0) {
                throw new Exception("Preço do produto deve ser um número positivo");
            }
        }



        //Valida dados presentes no banco de dados
        include '../conexao.php';
        // Verifica se cliente existe
        $stmt = $db->prepare("SELECT id FROM clientes WHERE id = :id");
        $stmt->bindParam(':id', $data['cliente']['idCliente']);
        $stmt->execute();
        if ($stmt->rowCount() === 0) {
            throw new Exception("Cliente não encontrado");
        }
        
        // Verifica estoque dos produtos
        foreach ($data['produtos'] as $produto) {
            $stmt = $db->prepare("SELECT estoque FROM produto WHERE id_produto = :id");
            $stmt->bindParam(':id', $produto['id']);
            $stmt->execute();
            $estoque = $stmt->fetchColumn();
            
            if ($estoque === false) {
                throw new Exception("Produto ID {$produto['id']} não encontrado");
            }
            
            if ($estoque < $produto['quantidade']) {
                throw new Exception("Estoque insuficiente para o produto ID {$produto['id']}");
            }
        }


        //Começa inclusão no banco de dados
        $stmt = $db->prepare("INSERT INTO vendas(idCliente) VALUES(:cliente)");
        $stmt->bindParam(':cliente', $data['cliente']['idCliente']);
        $stmt->execute();

        $idVenda = $db->lastInsertId();//Ultimo ID


        $produtos = $data['produtos'];
        foreach ($produtos as  $produto) {
            $stmt = $db->prepare("INSERT INTO produtosvendidos(idVenda, idProduto, preco, quantidade) VALUES(:idVenda, :idProduto, :precoProduto, :quantidade)");
            $stmt->bindParam(':idVenda', $idVenda);
            $stmt->bindParam(':idProduto', $produto['id']);
            $stmt->bindParam(':precoProduto', $produto['preco']);
            $stmt->bindParam(':quantidade', $produto['quantidade']);
            $stmt->execute();
            echo "Produto ID: {$produto['id']}, Nome: {$produto['nome']}, Quantidade: {$produto['quantidade']}\n";
        }



            //echo json_encode(["success" => true, "message" => "Venda registrada!"]);
            
    }catch(PDOException $e) {
        http_response_code(500);
        echo json_encode([
            'success' => false,
            'error' => 'Erro no banco de dados: ' . $e->getMessage()
        ]);
    }catch(Exception $e) {
        http_response_code(400);
        echo json_encode([
            'success' => false,
            'error' => $e->getMessage()
        ]);
    }
?>