<div>
    <?php if (isset($erro)) echo "<p style='color:red;'>$erro</p>"; ?>

    <form action="" method="post" enctype="multipart/form-data">
        <label>Nome do Produto:</label>
        <input type="text" name="nomeProduto" required>
        <br>

        <label>Preço:</label>
        <input type="number" name="precoProduto" step="0.01" required>
        <br>

        <label>Estoque:</label>
        <input type="number" name="estoqueProduto" required>
        <br>

        <input type="submit" value="Cadastrar Produto">
    </form>
</div>
