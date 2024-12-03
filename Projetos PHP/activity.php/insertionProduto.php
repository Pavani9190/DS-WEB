<?php
$conexao = new mysqli("localhost", "root", "usbw", "loja");

if ($conexao->connect_error) {
    die("Erro ao conectar: " . $conn->connect_error);
}

$nome = $_POST['nome'];
$valor = $_POST['valor'];
$estoque = $_POST['estoque'];

$sql = "INSERT INTO produto (nome, valor, estoque) VALUES ('$nome', $valor, $estoque)";
if ($conexao->query($sql) === TRUE) {
    echo "Produto cadastrado com sucesso!";
} else {
    echo "Erro: " . $conexao->error;
}

$conexao->close();
header("Location: index.php");
?>
