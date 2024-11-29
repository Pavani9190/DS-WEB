<?php
session_start();

// Verifica se há uma sessão ou cookie válido
if (isset($_SESSION['usuario']) and isset($_COOKIE['usuario'])) {
    header("Location: login.php");
    exit();
}

// Obtém o usuário da sessão ou do cookie
$usuario = $_SESSION['usuario'] ?? $_COOKIE['usuario'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h1>Bem-vindo!</h1>
    <p>Usuário: <?php echo $usuario; ?></p>
    <br><br>
    <form method="post" action="logout.php">
        <button type="submit">Logout</button>
    </form>
</body>
</html>
