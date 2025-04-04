<?php 
    if($_SERVER['REQUEST_METHOD'] != 'POST'){
        echo "<script>window.location.href = 'index.php'</script>";
    }
    
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $observacao = $_POST['observacao'];
    
    include "conexao.php";
    $stmt = $db->prepare('UPDATE clientes SET nome = :nome, email = :email, observacao = :observacao WHERE id = :id');
    $stmt->execute(array(
        ':nome'   => $nome,
        ':email' => $email,
        ':observacao' => $observacao,
        ':id' => $_GET['id']
    ));

    header("Location: cliente.php");
    
?>