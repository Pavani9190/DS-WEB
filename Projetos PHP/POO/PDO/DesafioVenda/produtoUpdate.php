<?php 
    if($_SERVER['REQUEST_METHOD'] != 'POST'){
        echo "<script>window.location.href = 'index.php'</script>";
    }
    
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
    $estoque = $_POST['estoque'];
    $preco = $_POST['preco'];
    $id = $_GET['id'];
    
    include "conexao.php";
    $stmt = $db->prepare('UPDATE produto SET codigo = :codigo, nome = :nome, estoque = :estoque, preco = :preco WHERE id = :id');
    $stmt->bindParam(':codigo',$codigo);
    $stmt->bindParam(':nome',$nome);
    $stmt->bindParam(':estoque',$estoque);
    $stmt->bindParam(':preco',$preco);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    header("Location: produto.php");
    
?>