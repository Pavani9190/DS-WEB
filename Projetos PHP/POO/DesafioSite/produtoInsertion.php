<?php  
if($_SERVER['REQUEST_METHOD'] != 'POST'){
    echo "<script>alert('Método POST ausente!'); 
        window.location.href = 'produto.php';
        </script>";
}

$codigo = $_POST['codigo'];
$nome = $_POST['nome'];
$estoque = $_POST['estoque'];
$preco = str_replace(',', '.', $_POST['preco']);

include "conexao.php";

$statement = $db->prepare("INSERT INTO produto (codigo_produto, nome_produto, estoque, preco) VALUES (:codigo, :nome, :estoque, :preco)");
$statement->bindParam(':codigo', $codigo);
$statement->bindParam(':nome', $nome);
$statement->bindParam(':estoque', $estoque);
$statement->bindParam(':preco', $preco);
$statement->execute();


header("Location: produto.php")
?>