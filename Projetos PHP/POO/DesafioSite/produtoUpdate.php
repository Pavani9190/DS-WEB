<?php  
if($_SERVER['REQUEST_METHOD'] != 'POST'){
    echo "<script>alert('Método POST ausente!'); 
        window.location.href = 'produto.php';
        </script>";
}

$id = $_GET['id'];
$codigo = $_POST['codigo'];
$nome = $_POST['nome'];
$estoque = $_POST['estoque'];
$preco = str_replace(',', '.', $_POST['preco']);

include "conexao.php";

$statement = $db->prepare("UPDATE produto SET codigo_produto = :codigo, nome_produto = :nome, estoque = :estoque, preco = :preco WHERE id_produto = :id ");
$statement->bindParam(':codigo', $codigo);
$statement->bindParam(':nome', $nome);
$statement->bindParam(':estoque', $estoque);
$statement->bindParam(':preco', $preco);
$statement->bindParam(':id', $id);
$statement->execute();


header("Location: produto.php")
?>