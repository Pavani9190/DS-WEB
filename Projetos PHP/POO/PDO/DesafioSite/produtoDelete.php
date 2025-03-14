<?php
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: produto.php");
    exit();
}

include "conexao.php";

$id = $_GET['id'];

$stmt = $db->prepare("DELETE FROM produto WHERE id_produto = :id");
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    echo "<script>alert('Produto deletado com sucesso!');</script>";
} else {
    echo "<script>alert('Erro ao deletar o produto.');</script>";
}

header("Location: produto.php");
exit();
?>
