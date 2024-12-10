<?php
session_start();
include_once('connection.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario']) && !isset($_COOKIE['usuario'])) {
    header("Location: login.php");
    exit();
}

// Adicionando o cadastro de cliente na tabela usuarios
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cadastrar_cliente'])) {
    $nome_cliente = $_POST['nome_cliente'];
    $email_cliente = $_POST['email_cliente'];
    $senha_cliente = $_POST['senha_cliente'];

    // Cadastra o cliente na tabela usuarios
    $sql_cliente = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome_cliente', '$email_cliente', '$senha_cliente')";
    if (mysqli_query($conn, $sql_cliente)) {
        $sucesso_cliente = "Cliente cadastrado com sucesso!";
    } else {
        $erro_cliente = "Erro ao cadastrar o cliente: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Boas-vindas -->
    <h1>Bem-vindo(a), <?php echo $_SESSION['usuario'] ?? $_COOKIE['usuario']; ?></h1>
    <a href="logout.php"  id="bottone5"><button class="sair-btn">Sair</button></a>

    <!-- Cadastro de Produto -->
    <h2>Cadastrar Produto</h2>
    <form action="cadastro_produto.php" method="POST">
        <div class="form-container">
            <div class="form-box">
                <div class="group">
                    <input type="text" name="nome" class="input"  required>
                    <span class="bar"></span>
                    <label>Nome</label>
                </div>
                <div class="group">
                    <input type="text" name="descricao" class="input"  required>
                    <span class="bar"></span>
                    <label>Descrição</label>
                </div>
                <div class="group">
                    <input type="number" name="preco" class="input"  required>
                    <span class="bar"></span>
                    <label>Preço</label>
                </div>
                <button type="submit"  id="bottone5">Cadastrar Produto</button>
            </div>
        </div>
    </form>

    <!-- Produtos Cadastrados -->
    <h3>Produtos Cadastrados</h3>
    <?php
    $sql_produtos = "SELECT * FROM produtos";
    $result_produtos = mysqli_query($conn, $sql_produtos);

    if ($result_produtos) {
        while ($row = mysqli_fetch_assoc($result_produtos)) {
            echo "<p>" . $row['nome'] . " - " . $row['descricao'] . " - R$ " . $row['preco'] . "</p>";
        }
    } else {
        echo "<p>Erro ao carregar os produtos.</p>";
    }
    ?>

    <!-- Cadastro de Cliente -->
    <h2>Cadastrar Cliente</h2>
    <form method="POST" action="">
        <div class="form-container">
            <div class="form-box">
                <div class="group">
                    <input type="text" name="nome_cliente" class="input"  required>
                    <span class="bar"></span>
                    <label>Nome do Cliente</label>
                </div>
                <div class="group">
                    <input type="email" name="email_cliente" class="input"  required>
                    <span class="bar"></span>
                    <label>E-mail</label>
                </div>
                <div class="group">
                    <input type="password" name="senha_cliente" class="input"  required>
                    <span class="bar"></span>
                    <label>Senha</label>
                </div>
                <button type="submit" name="cadastrar_cliente" id="bottone5">Cadastrar Cliente</button>
            </div>
        </div>
    </form>

    <?php
    // Exibição de mensagens de sucesso ou erro
    if (isset($sucesso_cliente)) {
        echo "<p style='color:green;'>$sucesso_cliente</p>";
    }
    if (isset($erro_cliente)) {
        echo "<p style='color:red;'>$erro_cliente</p>";
    }
    ?>

    <!-- Clientes Cadastrados -->
    <h3>Clientes Cadastrados</h3>
    <?php
    $sql_clientes = "SELECT * FROM usuarios";
    $result_clientes = mysqli_query($conn, $sql_clientes);

    if ($result_clientes) {
        while ($row = mysqli_fetch_assoc($result_clientes)) {
            echo "<p>" . $row['nome'] . " - " . $row['email'] . "</p>";
        }
    } else {
        echo "<p>Erro ao carregar os clientes.</p>";
    }
    ?>
</body>
</html>
