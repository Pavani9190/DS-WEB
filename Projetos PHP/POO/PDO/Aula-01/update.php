<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
    $dados = $db->query("SELECT * FROM clientes");
    $todos = $dados->fetch(PDO::FETCH_ASSOC); //Todos os registros retornados
    print_r($todos);
    echo "<br>";
    echo $todos ['email'];
    ?>
    <div class="container">
        <div class="class">
            <form action="" method="POST">
                <label for="">Nome:</label>
                <input type="text" name="nome">
                <br><br>
                <label for="">E-mail:</label>
                <input type="email" name="email">
                <br><br>
                <input type="submit">
            </form>
        </div>
    


<?php 

$novoNome = "Bruno Attina";
$email = "bruno@gmail.com";
$stmt = $db->prepare('UPDATE clientes SET nome = :nome WHERE email = :email');
$stmt->execute(array(':nome' => $novoNome, ':email' => $email));
if( $stmt->rowCount() > 0 ) {
echo "Ocorreram ".$stmt->rowCount()." alterações na tabela.";
} else {
echo 'Nada foi alterado.';
}

?>



</div>
</body>
</html>