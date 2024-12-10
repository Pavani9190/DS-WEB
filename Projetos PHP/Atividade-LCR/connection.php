<?php
$host = "localhost";
$usuario = "root";
$senha = "usbw";
$banco = "floricultura";

// Conecta ao banco de dados
$conn = mysqli_connect($host, $usuario, $senha, $banco);

if (!$conn) {
    die("Erro na conexão: " . mysqli_connect_error());
}
?>
