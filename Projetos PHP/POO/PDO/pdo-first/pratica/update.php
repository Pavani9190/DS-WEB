<?php
    include 'conexao.php';
    $novoNome = "Carol Silva";
    $email = "carol@gmail.com";

    $stmt = $db->prepare('UPDATE clientes SET nome = :nome WHERE email = :email');
    $stmt->execute(array(
        ':nome'   => $novoNome,
        ':email' => $email
    ));
    
    if( $stmt->rowCount() > 0 ) {
        echo "Ocorreram ".$stmt->rowCount()." alterações na tabela.";
    } else {
        echo 'Nada foi alterado.';
    }
?>