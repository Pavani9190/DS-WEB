<?php
$conexao = new mysqli("localhost", "root", "usbw", "loja");

if ($conexao->connect_error) {
    die("Erro ao conectar: " . $conexao->connect_error);
}

$nome = $_POST['nome'];
$email = $_POST['email'];

$sql = "INSERT INTO cliente (nome, email) VALUES ('$nome', '$email')";
if ($conexao->query($sql) === TRUE) {
    echo "Cliente cadastrado com sucesso!";
} else {
    echo "Erro: " . $conexao->error;
}

$conexao->close();
header("Location: index.php");
?>
