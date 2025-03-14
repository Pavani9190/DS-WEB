<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Cadastro de Clientes</h2>

    <form action="conexao.php" method="post">
        <input type="text" name="nome" placeholder="Nome" required>
        <input type="email" name="email" placeholder="E-mail" required>
        <button type="submit">Cadastrar</button>
    </form>

    <h2>Clientes Cadastrados</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
        </tr>

        <?php

        $db = new PDO("mysql:host=localhost;dbname=pdo", "root", "");

        $dados = $db->query("SELECT * FROM clientes");
        $clientes = $dados->fetchALL(PDO::FETCH_ASSOC);

        foreach ($clientes as $cliente) {
            echo "<tr>";
            echo "<td>".$cliente['id']."</td>";
            echo "<td>".$cliente['nome']."</td>";
            echo "<td>".$cliente['email']."</td>";
            echo "</tr>";
        }

        ?>
    </table>
</body>
</html>