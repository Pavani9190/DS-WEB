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
            background-color: #f7f7f7;
            color: #333;
        }
        h1, h2 {
            text-align: center;
            color: #5264AE;
        }
        .form-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .form-box {
            width: 45%;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        .group {
            position: relative;
            margin-bottom: 20px;
        }
        .input {
            font-size: 16px;
            padding: 10px 10px 10px 5px;
            display: block;
            width: 100%;
            border: none;
            border-bottom: 1px solid #515151;
            background: transparent;
        }
        .input:focus {
            outline: none;
        }
        label {
            color: #999;
            font-size: 18px;
            font-weight: normal;
            position: absolute;
            pointer-events: none;
            left: 5px;
            top: 10px;
            transition: 0.2s ease all;
        }
        .input:focus ~ label, .input:valid ~ label {
            top: -10px;
            font-size: 14px;
            color: #5264AE;
        }
        .bar {
            position: relative;
            display: block;
            width: 100%;
        }
        .bar:before, .bar:after {
            content: '';
            height: 2px;
            width: 0;
            bottom: 1px;
            position: absolute;
            background: #5264AE;
            transition: 0.2s ease all;
        }
        .bar:before {
            left: 50%;
        }
        .bar:after {
            right: 50%;
        }
        .input:focus ~ .bar:before, .input:focus ~ .bar:after {
            width: 50%;
        }
        .highlight {
            position: absolute;
            height: 60%;
            width: 100px;
            top: 25%;
            left: 0;
            pointer-events: none;
            opacity: 0.5;
        }
        .input:focus ~ .highlight {
            animation: inputHighlighter 0.3s ease;
        }
        @keyframes inputHighlighter {
            from {
                background: #5264AE;
            }
            to {
                width: 0;
                background: transparent;
            }
        }
       /* From Uiverse.io by Custyyyy */ 
        #bottone5 {
            align-items: center;
            background-color: #FFFFFF;
            border: 1px solid rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            box-shadow: rgba(0, 0, 0, 0.02) 0 1px 3px 0;
            box-sizing: border-box;
            color: rgba(0, 0, 0, 0.85);
            cursor: pointer;
            display: inline-flex;
            font-family: system-ui,-apple-system,system-ui,"Helvetica Neue",Helvetica,Arial,sans-serif;
            font-size: 16px;
            font-weight: 600;
            justify-content: center;
            line-height: 1.25;
            min-height: 3rem;
            padding: calc(.875rem - 1px) calc(1.5rem - 1px);
            text-decoration: none;
            transition: all 250ms;
            user-select: none;
            -webkit-user-select: none;
            touch-action: manipulation;
            vertical-align: baseline;
            width: auto;
        }

        #bottone5:hover,
        #bottone5:focus {
            border-color: rgba(0, 0, 0, 0.15);
            box-shadow: rgba(0, 0, 0, 0.1) 0 4px 12px;
            color: rgba(0, 0, 0, 0.65);
        }

        #bottone5:hover {
            transform: translateY(-1px);
        }

        #bottone5:active {
            background-color: #F0F0F1;
            border-color: rgba(0, 0, 0, 0.15);
            box-shadow: rgba(0, 0, 0, 0.06) 0 2px 4px;
            color: rgba(0, 0, 0, 0.65);
            transform: translateY(0);
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
            padding: 10px;
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
            <div class="group">
                <input required="" type="text" class="input" id="produtoNome" name="nome">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label for="produtoNome">Nome</label>
            </div>
            <div class="group">
                <input required="" type="number" class="input" id="produtoValor" name="valor">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label for="produtoValor">Valor</label>
            </div>
            <div class="group">
                <input required="" type="number" class="input" id="produtoEstoque" name="estoque">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label for="produtoEstoque">Estoque</label>
            </div>
            <button id="bottone5">Cadastrar Produto</button>
        </form>
    </div>

    <!-- Formulário de Cadastro de Clientes -->
    <div class="form-box">
        <h2>Cadastrar Cliente</h2>
        <form action="insertionCliente.php" method="POST">
            <div class="group">
                <input required="" type="text" class="input" id="clienteNome" name="nome">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label for="clienteNome">Nome</label>
            </div>
            <div class="group">
                <input required="" type="email" class="input" id="clienteEmail" name="email">
                <span class="highlight"></span>
                <span class="bar"></span>
                <label for="clienteEmail">E-mail</label>
            </div>
            <button id="bottone5">Cadastrar Cliente</button>
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
