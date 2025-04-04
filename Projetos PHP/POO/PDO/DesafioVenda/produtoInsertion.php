<?php
    if($_SERVER['REQUEST_METHOD'] != 'POST'){
        echo "<script>window.location.href = 'produto.php'</script>";
    }
        //include 'clienteValida.php';
        $codigo = $_POST['codigo'];
        $nome = $_POST['nome'];
        $estoque = $_POST['estoque'];
        $preco = $_POST['preco'];
        
        

            include "conexao.php";

            echo "<h2>Inserindo dados</h2>";
            $statement = $db->prepare("INSERT INTO produto (codigo, nome, estoque, preco) VALUES (:codigo, :nome, :estoque, :preco)");
            $statement->bindParam(':codigo',$codigo);
            $statement->bindParam(':nome',$nome);
            $statement->bindParam(':estoque',$estoque);
            $statement->bindParam(':preco',$preco);
            $statement->execute();
        

       header("Location: produto.php"); //Redirecionamento com PHP
    
?>