<?php
session_start();
include_once('connection.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario']) && !isset($_COOKIE['usuario'])) {
    header("Location: login.php");
    exit();
}

// Processa o cadastro de produto
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    // Cadastra o produto
    $sql = "INSERT INTO produtos (nome, descricao, preco) VALUES ('$nome', '$descricao', '$preco')";
    if (mysqli_query($conn, $sql)) {
        header("Location: login.php");
        exit();
    } else {
        $erro = "Erro ao cadastrar o produto.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Produto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Cadastrar Produto</h1>
    <form method="post" action="">
        <div class="form-container">
            <div class="form-box">
                <div class="group">
                    <input type="text" name="nome" class="input" placeholder="Nome do Produto" required>
                    <span class
