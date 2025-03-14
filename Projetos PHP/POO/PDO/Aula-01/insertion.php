<?php 
    if ($_SERVER['REQUEST_METHOD'] != 'POST') {
        echo "<script>alert('Esta faltando o metodo POST)
        window.location.href = 'index.php';
        </script>";
        header("Location: index.php");
        
        
    }

    $nome = $_POST['nome'];
    $email = $_POST['email'];

    include "conexao.php";

    echo "<h2>Inserindo Dados</h2>";
    $statement = $db->prepare("INSERT INTO clientes (nome, email) VALUES (?, ?)");

    $statement->execute(array($nome, $email));

    header("Location: index.php")
?>