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
        <div class="class">
            <form action="insertion.php" method="POST" name="formulario" onsubmit="return validarDadosCliente()">
                <label for="">Nome:</label>
                <input type="text" name="nome">
                <br><br>
                <label for="">E-mail:</label>
                <input type="text" name="email">
                <br><br>
                <label for="">Observação do Cliente:</label>
                <textarea name="observacao" id="" cols="30" rows="6"></textarea>
                <br><br>
                <input type="submit">
            </form>
        </div>
    




    <?php
        include 'conexao.php';
        
        echo "<h2>Exemplo de Consulta com muitas Linhas</h2>";
        $dados = $db->query("SELECT * FROM clientes");
        $todos = $dados->fetchAll(PDO::FETCH_ASSOC); //Todos os registros retornados
        foreach($todos as $linha){
            $idCliente = $linha['id'];
            $nomeCliente = $linha['nome'];
            $emailCliente = $linha['email'];




            echo "Linha: ".$idCliente;
            echo "<br><br>";
            echo "Nome: ".$nomeCliente;
            echo "<br><br>";
            echo "E-mail: ".$emailCliente;
            echo "<br><br>";
            echo "<a href= 'delete.php?id=$idCliente'>Editar Cliente</a>";
            echo "<br><br>";
            echo "<a href= 'delete.php?id=$idCliente'>Deletar Cliente</a>";
            echo "<br><br>";
        }
    
    
    
    
    
    
    ?>
    </div>
    <script src="script.js"></script>
</body>
</html>