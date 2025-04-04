<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business System - Produtos</title>
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
    <div class="container">
        <hr>
        <div class="formulario">
            
            <form action="produtoInsertion.php" method="POST" name="formulario" onsubmit="">
                <label for="codigo">Codigo do Produto: </label>
                <input type="number" name="codigo" id="codigo">
                <p class="erro-input" id="erro-codigo"><?=isset($_SESSION['erroCodigo']) ? $_SESSION['erroCodigo'] : "";?></p>

                <label for="nome">Nome: </label>
                <input type="text" name="nome" id="nome">
                <p class="erro-input" id="erro-nome"><?=isset($_SESSION['erroNome']) ? $_SESSION['erroNome'] : "";?></p>

                <label for="estoque">Valor em estoque:</label>
                <input type="text" name="estoque" id="estoque">
                <p class="erro-input" id="erro-estoque"><?=isset($_SESSION['erroEstoque']) ? $_SESSION['erroEstoque'] : "";?></p>

                <label for="preco">Preço:</label>
                <input type="text" name="preco" id="preco">
                <p class="erro-input" id="erro-preco"><?=isset($_SESSION['erroPreco']) ? $_SESSION['erroPreco'] : "";?></p>
                
                <input type="submit">
            </form>
        </div>
    
    <?php  
        include 'conexao.php';

        echo "<h2>Consulta de Produtoss</h2>";
        $dados = $db->query("SELECT * FROM produto");
        $todos = $dados->fetchAll(PDO::FETCH_ASSOC); //Todos os registros retornados
        echo "<table id='produtos'>";
        echo "
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Estoque</th>
                <th>Preço</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        ";
        foreach($todos as $linha){
            $idProduto = $linha['id_produto'];
            $codigoProduto = $linha['codigo_produto'];
            $nomeProduto = $linha['nome_produto'];
            $estoque = $linha['estoque'];
            $preco = $linha['preco'];
            echo "<tr>";
            echo "<td>".$codigoProduto."</td>";
            echo "<td>".$nomeProduto."</td>";
            echo "<td>".$estoque."</td>";
            echo "<td>".$preco."</td>";
            echo "<td><a href='produtoAlteracao.php?id=$idProduto'><i class='fa-solid fa-pencil'></i></a></td>";
            echo "<td><a href='produtoDelete.php?id=$idProduto'><i class='fa-solid fa-trash'></i></a></td>";
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