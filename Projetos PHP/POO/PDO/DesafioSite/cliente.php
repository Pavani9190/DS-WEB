<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business System - Cliente</title>
    <link rel="stylesheet" href="./assets/style/clienteStyle.css">
    <link rel="shortcut icon" type="imagex/png" href="./assets/img/icon.svg">
</head>
<body>
    <div class="menu">
        <ul>
            <li><a href="index.php" class="meumenu" title="Home">Home</a></li>
            <li><a href="cliente.php" class="meumenu meumenu-active" title="Clientes">Clientes</a></li>
            <li><a href="produto.php" class="meumenu" title="Produtos">Produtos</a></li>
            <li><a href="#" class="meumenu" title="Vendas">Vendas</a></li>
        </ul>
    </div>
    <div class="container">
        <hr>
        <div class="formulario">
            <form action="insertion.php" method="POST" name="formulario" onsubmit="return validarDadosCliente()">
                <label for="nome">Nome: </label>
                <input type="text" name="nome" id="nome">
                <p class="erro-input" id="erro-nome"></p>

                <label for="email">E-mail: </label>
                <input type="text" name="email" id="email">
                <p class="erro-input" id="erro-email"></p>

                <label for="observacao">Observação do Cliente:</label>
                <textarea name="observacao" cols="30" rows="4" id="observacao"></textarea>
                <p class="erro-input" id="erro-observacao"></p>
                <input type="submit">
            </form>
        </div>
    <table id="clientes">
        <tr>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Observação</th>
            <th>Editar</th>
            <th>Deletar</th>
        </tr>
    
    <?php  
        include 'conexao.php';

        echo "<h2>Consulta com muitas linhas:</h2>";
        $dados = $db->query("SELECT * FROM clientes");
        $todos = $dados->fetchAll(PDO::FETCH_ASSOC); //Todos os registros retornados
        foreach($todos as $linha){
            $idCliente = $linha['id'];
            $nomeCliente = $linha['nome'];
            $emailCliente = $linha['email'];
            $observacaoCliente = $linha['observacao'];

            echo "
                <tr>
                    <td>$nomeCliente</td>
                    <td>$emailCliente</td>
                    <td>$observacaoCliente</td>
                    <td><a href='clienteAlteracao.php?id=$idCliente'><i class='fa-solid fa-pencil'></i></a></td>
                    <td><a href='delete.php?id=$idCliente'><i class='fa-solid fa-trash-can'></i></a></td>
            
            ";

        }
    ?>
    </table>
    </div>
</body>
<script src="./assets/js/script.js"></script>
<script src="https://kit.fontawesome.com/0c933a4d91.js" crossorigin="anonymous"></script>
</html>