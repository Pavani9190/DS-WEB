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
            <li><a href="cliente.php" class="meumenu" title="Clientes">Clientes</a></li>
            <li><a href="produto.php" class="meumenu" title="Produtos">Produtos</a></li>
            <li><a href="venda.php" class="meumenu" title="Vendas">Vendas</a></li>
            <li><a href="vendas.php" class="meumenu meumenu-active" title="venda">Minhas vendas</a></li>
        </ul>
    </div>

 <?php

/* ==================== EXIBIÇÂO VENDAS ==================== */

include 'conexao.php';


    echo "<h3>Vendas:</h3>";


    $dadosVendas = $db->query("SELECT * FROM vendas");
    $vendas = $dadosVendas->fetchAll(PDO::FETCH_ASSOC);

    $dadosProdutos = $db->query("SELECT * FROM produtosVendidos");
    $produtosVendidos = $dadosProdutos->fetchAll(PDO::FETCH_ASSOC);

    $vendasComProdutos = [];

    foreach ($vendas as $venda) {
        $vendasComProdutos[$venda['id']] = $venda;
    }

    // Exibir a tabela
    echo "<table id='vendas'>";
    echo "
        <tr>
            <th>ID Venda:</th>
            <th>Data e hora da venda:</th>
            <th>ID Cliente:</th>
            <th>ID Produto:</th>
            <th>Preço:</th>
            <th>Quantidade:</th>
        </tr>
    ";

    foreach ($produtosVendidos as $produto) {
        $idVenda = $produto['idVenda'];
        
        echo "<tr>";
        echo "<td>".$vendasComProdutos[$idVenda]['id']."</td>";
        echo "<td>".$vendasComProdutos[$idVenda]['dataVenda']."</td>";
        echo "<td>".$vendasComProdutos[$idVenda]['idCliente']."</td>";
        echo "<td>".$produto['idProduto']."</td>";
        echo "<td>".$produto['preco']."</td>";
        echo "<td>".$produto['quantidade']."</td>";
        echo "</tr>";
    }

    echo "</table>";

?>
    </div>
</body>
<script src="./assets/js/venda.js"></script>
<script src="https://kit.fontawesome.com/8403ba6cce.js" crossorigin="anonymous"></script>
</html>
    