<?php
if($_SERVER['method'] != 'POST'){
    header('Location: index.php');
}
require 'conexao.php';

    $statement = $db->prepare("INSERT INTO clientes (nome, email) VALUES (?, ?)");
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    $statement->execute(array($nome, $email));

    header('Location: index.php');