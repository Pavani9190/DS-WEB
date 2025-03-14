<?php
require 'config.php'; // Conexão com o banco de dados

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigo = $_POST['codigo'] ?? '';
    $nome = $_POST['nome'] ?? '';
    $estoque = $_POST['estoque'] ?? '';
    $preco = $_POST['preco'] ?? '';
    
    // Validações básicas
    if (empty($codigo) || empty($nome) || empty($estoque) || empty($preco)) {
        echo json_encode(['status' => 'erro', 'mensagem' => 'Todos os campos são obrigatórios.']);
        exit;
    }
    if (!is_numeric($estoque) || $estoque < 0) {
        echo json_encode(['status' => 'erro', 'mensagem' => 'O estoque deve ser um número positivo.']);
        exit;
    }
    if (!is_numeric($preco) || $preco < 0) {
        echo json_encode(['status' => 'erro', 'mensagem' => 'O preço deve ser um número positivo.']);
        exit;
    }

    try {
        // Insere no banco de dados
        $stmt = $pdo->prepare("INSERT INTO produtos (codigo_produto, nome_produto, estoque, preco) VALUES (?, ?, ?, ?)");
        $stmt->execute([$codigo, $nome, $estoque, $preco]);
        
        echo json_encode(['status' => 'sucesso', 'mensagem' => 'Produto cadastrado com sucesso!']);
    } catch (PDOException $e) {
        echo json_encode(['status' => 'erro', 'mensagem' => 'Erro ao cadastrar o produto: ' . $e->getMessage()]);
    }
}
