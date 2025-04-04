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
    <div>
        <ul class="menu">
            <li class="menu-li"><a href="index.php" class="meumenu" title="Home">Home</a></li>
            <li class="menu-li"><a href="cliente.php" class="meumenu" title="Clientes">Clientes</a></li>
            <li class="menu-li"><a href="produto.php" class="meumenu" title="Produtos">Produtos</a></li>
            <li class="menu-li"><a href="venda.php" class="meumenu" title="Vendas">Vendas</a></li>
        </ul>
    </div>
    <hr>
    <?php
        if ($_SERVER['REQUEST_METHOD'] != 'GET' or !isset($_GET['id'])) {
            header("Location: clientes.php");
        }   
        include 'conexao.php';
        $stmt = $db->prepare("SELECT * FROM clientes WHERE id=:id");
        $stmt->execute(array('id'=>$_GET['id']));
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

    ?>
    <div class="container">
        <h2>Alteração de cadastro de cliente</h2>
        <div class="formulario">
            <form action="clienteUpdate.php?id=<?=$_GET['id']?>" method="POST" name="formulario" onsubmit="return validarDadosCliente()">
                <label for="nome">Nome: </label>
                <input type="text" name="nome" id="nome" value="<?=$dados['nome']?>">
                <p class="erro-input" id="erro-nome"></p>
                <label for="email">E-mail: </label>
                <input type="text" name="email" id="email" value="<?=$dados['email']?>">
                <p class="erro-input" id="erro-email"></p>
                <label for="observacao">Observação do cliente</label>
                <textarea name="observacao" id="observacao" cols="30" rows="4"><?=$dados['observacao']?></textarea>
                <p class="erro-input" id="erro-observacao"></p>
                <input type="submit">
            </form>
        </div>
    </div>
<script src="./assets/js/script.js"></script>
</body>