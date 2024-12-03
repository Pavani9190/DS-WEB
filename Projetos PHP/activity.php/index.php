<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos e Clientes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .form-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .form-box {
            width: 45%;
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<h1>Cadastro de Produtos e Clientes</h1>

<div class="form-container">
    <!-- Formulário de Cadastro de Produtos -->
    <div class="form-box">
        <h2>Cadastrar Produtos</h2>
        <form action="insertionProduto.php" method="POST">
            <label for="produtoNome">Nome:</label><br>
            <input type="text" id="produtoNome" name="nome" required><br><br>
            <label for="produtoValor">Valor:</label><br>
            <input type="number" id="produtoValor" name="valor" required><br><br>
            <label for="produtoEstoque">Estoque:</label><br>
            <input type="number" id="produtoEstoque" name="estoque" required><br><br>
            <button type="submit">Cadastrar Produto</button>
        </form>
    </div>

    <!-- Formulário de Cadastro de Clientes -->
    <div class="form-box">
        <h2>Cadastrar Cliente</h2>
        <form action="insertionCliente.php" method="POST">
            <label for="clienteNome">Nome:</label><br>
            <input type="text" id="clienteNome" name="nome" required><br><br>
            <label for="clienteEmail">E-mail:</label><br>
            <input type="email" id="clienteEmail" name="email" required><br><br>
            <button type="submit">Cadastrar Cliente</button>
        </form>
    </div>
</div>

<?php

// Conexão com o banco de dados
$conexao = new mysqli("localhost", "root", "usbw", "loja");

if ($conexao->connect_error) {
    die("Erro ao conectar: " . $conexao->connect_error);
}

// Consultar e exibir produtos
echo "<h2>Produtos Cadastrados</h2>";
$resultProduto = $conexao->query("SELECT * FROM produto");
if ($resultProduto->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Nome</th><th>Valor</th><th>Estoque</th></tr>";
    while ($ro = $resultProduto->fetch_assoc()) {
        echo "<tr><td>{$ro['id']}</td><td>{$ro['nome']}</td><td>{$ro['valor']}</td><td>{$ro['estoque']}</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p>Nenhum produto cadastrado.</p>";
}

echo "<h2>Clientes Cadastrados</h2>";
$resultCliente = $conexao->query("SELECT * FROM cliente");
if ($resultCliente->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Nome</th><th>Email</th></tr>";
    while ($ro = $resultCliente->fetch_assoc()) {
        echo "<tr><td>{$ro['id']}</td><td>{$ro['nome']}</td><td>{$ro['email']}</td></tr>";
    }
    echo "</table>";
}else {
    echo "<p>Nenhum cliente cadastrado.</p>";
}

$conexao->close();
?>
</body>
</html>
