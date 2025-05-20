<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/mvc_php/assets/css/style.css">
    <title>Scudttina MVC</title>
</head>
<body>
    <div>
        <ul>
        <li><a class="active" href="/mvc_php/home">Home</a></li>
        <li><a href="/mvc_php/produto">Produtos</a></li>
        <li><a href="/mvc_php/cliente">Clientes</a></li>
        <li class="link-usuario"><a href="/mvc_php/usuario">Usuario</a></li>
        </ul>
    </div>

    <div class="container">
        <?php
            $url = $_GET['url'] ?? '/';

            require 'rotas.php';
        ?>
    </div>
    
</body>
</html>