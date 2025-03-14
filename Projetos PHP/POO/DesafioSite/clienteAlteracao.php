<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business System - Cliente</title>
    <link rel="stylesheet" href="./assets/style/clienteStyle.css">
    <link rel="shortcut icon" type="imagex/png" href="./assets/img/icon.svg">
</head>
<body>
    <div class="menu">
        <ul>
            <li><a href="index.php" class="meumenu" title="Home">Home</a></li>
            <li><a href="cliente.php" class="meumenu meumenu-active" title="Clientes">Clientes</a></li>
            <li><a href="produto.php" class="meumenu" title="Produtos">Produtos</a></li>
            <li><a href="#" class="meumenu" title="Vendas">Vendas</a></li>
        </ul>
    </div>
    <div class="container">
        <hr>
        <?php  
            if ($_SERVER['REQUEST_METHOD'] != 'GET' || !isset($_GET['id'])) {
                header("location: cliente.php");
            }
            include 'conexao.php';

            echo "<h2>Consulta com muitas dados</h2>";
            $id = $_GET['id'];
            $stmt = $db->prepare("SELECT * FROM clientes WHERE id = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $dados = $stmt->fetch(PDO::FETCH_ASSOC);
            
            $idCliente = $dados['id'];
            $nomeCliente = $dados['nome'];
            $emailCliente = $dados['email'];
            $observacaoCliente = $dados['observacao'];

            
        ?>
        <div class="formulario">
            <form action="clienteUpdate.php?id=<?=$idCliente;?>" method="POST" name="formulario" onsubmit="return validarDadosCliente()">
                <label for="nome">Nome: </label>
                <input type="text" name="nome" id="nome" value="<?= $nomeCliente; ?>">
                <p class="erro-input" id="erro-nome"></p>

                <label for="email">E-mail: </label>
                <input type="text" name="email" id="email" value="<?= $emailCliente; ?>">
                <p class="erro-input" id="erro-email"></p>
                
                <label for="observacao">Observação do Cliente:</label>
                <textarea name="observacao" cols="30" rows="4" id="observacao"><?= $observacaoCliente; ?></textarea>
                <p class="erro-input" id="erro-observacao"></p>
                <input type="submit">
            </form>
        </div>
    

    </div>
</body>
<script src="./assets/js/script.js"></script>
<script src="https://kit.fontawesome.com/0c933a4d91.js" crossorigin="anonymous"></script>
</html>