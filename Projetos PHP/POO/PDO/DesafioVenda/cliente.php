<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business System</title>
    <link rel="shortcut icon" type="imagex/png" href="./assets/img/ico.svg">
    <link rel="stylesheet" href="./assets/style/style.css">

</head>
<body>
    <div class="menu">
        <ul>
            <li><a href="index.php" class="meumenu" title="Home">Home</a></li>
            <li><a href="cliente.php" class="meumenu meumenu-active" title="Clientes">Clientes</a></li>
            <li><a href="produto.php" class="meumenu" title="Produtos">Produtos</a></li>
            <li><a href="venda.php" class="meumenu" title="Vendas">Vendas</a></li>
        </ul>
    </div>
    <div class="container">
        <hr>
        <div class="formulario">
            
            <form action="clienteInsertion.php" method="POST" name="formulario">
                <label for="nome">Nome: </label>
                <input type="text" name="nome" id="nome" value="<?=isset($_SESSION['valorNome']) ? $_SESSION['valorNome'] : "";?>">
                <p class="erro-input" id="erro-nome"><?=isset($_SESSION['erroNome']) ? $_SESSION['erroNome'] : "";?></p>
                <label for="email">E-mail: </label>
                <input type="text" name="email" id="email" value="<?=isset($_SESSION['valorEmail']) ? $_SESSION['valorEmail'] : "";?>">
                <p class="erro-input" id="erro-email"><?=isset($_SESSION['erroEmail']) ? $_SESSION['erroEmail'] : "";?></p>
                <label for="observacao">Observação do cliente</label>
                <textarea name="observacao" id="observacao" cols="30" rows="4"><?=isset($_SESSION['valorObservacao']) ? $_SESSION['valorObservacao'] : "";?></textarea>
                <p class="erro-input" id="erro-observacao"><?=isset($_SESSION['erroObservacao']) ? $_SESSION['erroObservacao'] : "";?></p>
                <input type="submit">
            </form>
        </div>
    
    <?php  
        include 'conexao.php';

        echo "<h2>Consulta de Clientes</h2>";
        $dados = $db->query("SELECT * FROM clientes");
        $todos = $dados->fetchAll(PDO::FETCH_ASSOC); //Todos os registros retornados
        echo "<table id='clientes'>";
        echo "
            <tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Observacao</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        ";
        foreach($todos as $linha){
            $idCliente = $linha['id'];
            $nomeCliente = $linha['nome'];
            $emailCliente = $linha['email'];
            $observacaoCliente = $linha['observacao'];
            echo "<tr>";
            echo "<td>".$nomeCliente."</td>";
            echo "<td>".$emailCliente."</td>";
            echo "<td>".$observacaoCliente."</td>";
            echo "<td><a href='clientesAlteracao.php?id=$idCliente'><i class='fa-solid fa-pencil'></i></a></td>";
            echo "<td><a href='clienteDelete.php?id=$idCliente'><i class='fa-solid fa-trash'></i></a></td>";
            echo "</tr>";
        }
        echo "</table>";
    ?>
    </div>
</body>
<script src="./assets/js/script.js"></script>
<script src="https://kit.fontawesome.com/8403ba6cce.js" crossorigin="anonymous"></script>
</html>
<?php
    session_unset();
?>