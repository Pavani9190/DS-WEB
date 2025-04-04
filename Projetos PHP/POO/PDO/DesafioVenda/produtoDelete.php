<?php
    $id = $_GET['id'];

    include "conexao.php";

    $stmt = $db->prepare("DELETE FROM produto WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    if ($stmt->rowCount() > 0){
        echo "Deletou ".$stmt->rowCount()." linhas";
    }else{
        echo "Não deletou nenhuma linha";
    }

    header("Location: produto.php");
?>