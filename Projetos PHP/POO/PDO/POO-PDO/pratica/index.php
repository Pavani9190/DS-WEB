<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="container">
        <h3>Inserção de Clientes</h3>
        <div class="formulario">
            <form action="insertion.php" method="POST" >
                <label>Nome do Cliente:</label>
                <input type="text" name="nome">
                <br>
                <label>E-mail do Cliente:</label>
                <input type="text" name="email">
                <br>
                <input type="submit">
            </form>
        </div>
    
    <br>
    <h3>Consulta de Clientes</h3>
    <?php  
        require_once 'conexao.php';
        $dados = $db->query("SELECT * FROM clientes");
        $todos = $dados->fetchAll(PDO::FETCH_ASSOC);//Todos os registros retornados
        foreach($todos as $linha){
            echo "Linha: ".$linha['id'];
            echo " Nome: ".$linha['nome'];
            echo " E-mail: ".$linha['email'];
            echo "<br>";
        }
    ?>

    </div>
    
</body>
</html>