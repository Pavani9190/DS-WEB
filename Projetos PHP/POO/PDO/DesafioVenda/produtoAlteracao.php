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
            <li><a href="cliente.php" class="meumenu" title="Clientes">Clientes</a></li>
            <li><a href="produto.php" class="meumenu meumenu-active" title="Produtos">Produtos</a></li>
            <li><a href="venda.php" class="meumenu" title="Vendas">Vendas</a></li>
        </ul>
    </div>
    <hr>
    <?php
        if ($_SERVER['REQUEST_METHOD'] != 'GET' or !isset($_GET['id'])) {
            header("Location: produtos.php");
        }   
        include 'conexao.php';
        $stmt = $db->prepare("SELECT * FROM produto WHERE id=:id");
        $stmt->execute(array('id'=>$_GET['id']));
        $dados = $stmt->fetch(PDO::FETCH_ASSOC);

    ?>
    <div class="container">
        <h2>Alteração de cadastro de cliente</h2>
        <div class="formulario">
            <form action="produtoUpdate.php?id=<?=$dados['id'];?>" method="POST" name="formulario" onsubmit="">
                <label for="codigo">Codigo do Produto: </label>
                <input type="number" name="codigo" id="codigo" value="<?=$dados['codigo']?>">
                <p class="erro-input" id="erro-codigo"><?=isset($_SESSION['erroCodigo']) ? $_SESSION['erroCodigo'] : "";?></p>

                <label for="nome">Nome: </label>
                <input type="text" name="nome" id="nome" value="<?=$dados['nome']?>">
                <p class="erro-input" id="erro-nome"><?=isset($_SESSION['erroNome']) ? $_SESSION['erroNome'] : "";?></p>

                <label for="estoque">Valor em estoque:</label>
                <input type="text" name="estoque" id="estoque" value="<?=$dados['estoque']?>">
                <p class="erro-input" id="erro-estoque"><?=isset($_SESSION['erroEstoque']) ? $_SESSION['erroEstoque'] : "";?></p>

                <label for="preco">Preço:</label>
                <input type="text" name="preco" id="preco" value="<?=$dados['preco']?>">
                <p class="erro-input" id="erro-preco"><?=isset($_SESSION['erroPreco']) ? $_SESSION['erroPreco'] : "";?></p>
                
                <input type="submit">
            </form>
        </div>
    </div>
<script src="./assets/js/script.js"></script>
</body>