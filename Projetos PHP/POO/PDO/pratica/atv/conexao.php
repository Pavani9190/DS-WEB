<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $email = $_POST["email"];

        $db = new PDO("mysql:host=localhost;dbname=pdo", "root", "");

        $statement = $db->prepare("INSERT INTO clientes (nome, email) VALUES (?, ?)");
        $statement->execute(array($nome, $email));

        header("location: index.php");
        exit();

    }







?>