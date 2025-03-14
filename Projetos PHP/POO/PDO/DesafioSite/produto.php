<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business System - Produtos</title>
    <link rel="stylesheet" href="./assets/style/produtoStyle.css">
    <link rel="shortcut icon" type="imagex/png" href="./assets/img/icon.svg">
</head>
<body>
    <div class="menu">
        <ul>
            <li><a href="index.php" class="meumenu" title="Home">Home</a></li>
            <li><a href="cliente.php" class="meumenu" title="Clientes">Clientes</a></li>
            <li><a href="produto.php" class="meumenu meumenu-active" title="Produtos">Produtos</a></li>
            <li><a href="#" class="meumenu" title="Vendas">Vendas</a></li>
        </ul>
    </div>
    <div class="container">
        <hr>
        <div class="formulario">
            <form action="produtoInsertion.php" method="POST" name="formulario" onsubmit="return validarDadosProduto()">
                <label for="codigo">Código do Produto: </label>
                <input type="number" name="codigo" id="codigo">
                <p class="erro-input" id="erro-codigo"></p>

                <label for="nome">Nome do Produto: </label>
                <input type="text" name="nome" id="nome">
                <p class="erro-input" id="erro-nome"></p>

                <label for="estoque">Estoque: </label>
                <input type="number" name="estoque" id="estoque">
                <p class="erro-input" id="erro-estoque"></p>

                <label for="preco">Preço: </label>
                <input type="text" name="preco" id="preco">
                <p class="erro-input" id="erro-preco"></p>

                <input type="submit" value="Cadastrar Produto"> <br><br><br>
            </form>
        </div>

        <table id="produtos">
            <tr>
                <th>Código</th>
                <th>Nome</th>
                <th>Estoque</th>
                <th>Preço</th>
                <th>Editar</th>
                <th>Deletar</th>
            </tr>

            <?php  
                include 'conexao.php';

                $dados = $db->query("SELECT * FROM produto");
                $todos = $dados->fetchAll(PDO::FETCH_ASSOC);
                foreach ($todos as $linha) {
                    $idProduto = $linha['id_produto'];
                    $codigoProduto = $linha['codigo_produto'];
                    $nomeProduto = $linha['nome_produto'];
                    $estoqueProduto = $linha['estoque'];
                    $precoProduto = number_format($linha['preco'], 2, ',', '.');

                    echo "
                        <tr>
                            <td>$codigoProduto</td>
                            <td>$nomeProduto</td>
                            <td>$estoqueProduto</td>
                            <td>$precoProduto</td>
                            <td><a href='produtoEdit.php?id=$idProduto'><i class='fa-solid fa-pencil'></i></a></td>
                            <td><a href='produtoDelete.php?id=$idProduto'><i class='fa-solid fa-trash-can'></i></a></td>
                        </tr>
                    ";
                }
        ?>
        </table>
    </div>
</body>
<script src="./assets/js/produtoScript.js"></script>
<script src="https://kit.fontawesome.com/0c933a4d91.js" crossorigin="anonymous"></script>
</html>