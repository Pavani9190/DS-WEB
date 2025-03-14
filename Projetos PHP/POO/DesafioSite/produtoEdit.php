<?php  
if ($_SERVER['REQUEST_METHOD'] != 'GET' || !isset($_GET['id'])) {
    header("location: produto.php");
}

include 'conexao.php';

$id = $_GET['id'];
$stmt = $db->prepare("SELECT * FROM produto WHERE id_produto = :id");
$stmt->bindParam(':id', $id);
$stmt->execute();
$dados = $stmt->fetch(PDO::FETCH_ASSOC);

$idProduto = $dados['id_produto'];
$codigoProduto = $dados['codigo_produto'];
$nomeProduto = $dados['nome_produto'];
$estoqueProduto = $dados['estoque'];
$precoProduto = number_format($dados['preco'], 2, ',', '.');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business System - Editar Produto</title>
    <link rel="stylesheet" href="./assets/style/produtoStyle.css">
</head>
<body>
<div class="container">
        <hr>
        <h2>Editar Produto</h2>
        <div class="formulario">
            <form action="produtoUpdate.php?id=<?=$idProduto;?>" method="POST">
                <label for="codigo">Código do Produto: </label>
                <input type="number" name="codigo" id="codigo" value="<?= $codigoProduto; ?>">

                <label for="nome">Nome do Produto: </label>
                <input type="text" name="nome" id="nome" value="<?= $nomeProduto; ?>">

                <label for="estoque">Estoque: </label>
                <input type="number" name="estoque" id="estoque" value="<?= $estoqueProduto; ?>">

                <label for="preco">Preço: </label>
                <input type="text" name="preco" id="preco" value="<?= $precoProduto; ?>">

                <input type="submit" value="Atualizar Produto">
            </form>
        </div>
    </div>
</body>
</html>