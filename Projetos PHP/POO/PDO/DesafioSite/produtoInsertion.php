<?php
include 'conexao.php'; 

function limpaEntrada($dado) {
    $dado = trim($dado);
    $dado = stripslashes($dado);
    $dado = htmlspecialchars($dado); 
    return $dado;
}


function validaProduto($nome, $codigo, $preco, $estoque) {
    $erroNome = $erroCodigo = $erroPreco = $erroEstoque = "";

    if (empty($nome)) {
        $erroNome = "O nome do produto é obrigatório.";
    } else {
        $nome = limpaEntrada($nome);
        if (strlen($nome) < 3) {
            $erroNome = "O nome do produto deve ter pelo menos 3 caracteres.";
        }
    }

    if (empty($codigo)) {
        $erroCodigo = "O código do produto é obrigatório.";
    }

    if (empty($preco)) {
        $erroPreco = "O preço do produto é obrigatório.";
    } else {
        $preco = limpaEntrada($preco);
        if (!is_numeric($preco)) {
            $erroPreco = "O preço deve ser um valor numérico.";
        }
    }

    if (empty($estoque)) {
        $erroEstoque = "O estoque do produto é obrigatório.";
    } else {
        $estoque = limpaEntrada($estoque);
        if (!is_numeric($estoque) || $estoque < 0) {
            $erroEstoque = "O estoque deve ser um número válido e não pode ser negativo.";
        }
    }

    if (empty($erroNome) && empty($erroCodigo) && empty($erroPreco) && empty($erroEstoque)) {
        return true;
    } else {
        session_start();
        $_SESSION['erroNome'] = $erroNome;
        $_SESSION['erroCodigo'] = $erroCodigo;
        $_SESSION['erroPreco'] = $erroPreco;
        $_SESSION['erroEstoque'] = $erroEstoque;
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nomeProduto = $_POST['nome'];
    $codigoProduto = $_POST['codigo'];
    $precoProduto = $_POST['preco'];
    $estoqueProduto = $_POST['estoque'];

    // Valida os dados
    if (validaProduto($nomeProduto, $codigoProduto, $precoProduto, $estoqueProduto)) {
        $sql = "INSERT INTO produto (codigo_produto, nome_produto, preco, estoque) VALUES (:codigo_produto, :nome_produto, :preco, :estoque)";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':codigo_produto', $codigoProduto);
        $stmt->bindParam(':nome_produto', $nomeProduto);
        $stmt->bindParam(':preco', $precoProduto);
        $stmt->bindParam(':estoque', $estoqueProduto);
        $stmt->execute();

        header('Location: produto.php'); 
        exit();
    } else {
        header('Location: produto.php');
        exit();
    }
}
?>
