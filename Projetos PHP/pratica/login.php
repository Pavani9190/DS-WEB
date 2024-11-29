<?php
session_start();

// Verifica se o usuário já está cadastrado via sessão ou cookie
if (isset($_SESSION['usuario']) or isset($_COOKIE['usuario'])) {
    header("Location: dashboard.php");
    exit();
}

// Processa o formulário de login
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    // Validação simples 
    if ($usuario === 'pavani' and $senha === '1234') {
        // Define a sessão
        $_SESSION['usuario'] = $usuario;

        // Define o cookie, se marcado
        if (empty($_POST['lembrar'])) {
            setcookie('usuario', $usuario, time() + 86400, "/"); // Cookie válido por 1 dia
        }

        header("Location: dashboard.php");
        exit();
    } else {
        $erro = "Usuário ou senha inválidos.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Acesso</h1>
    <form method="post" action="">
        <label>Usuário:</label>
        <input type="text" name="usuario" required>
        <br><br>
        <label>Senha:</label>
        <input type="password" name="senha" required>
        <br><br>
        <label>
            <input type="checkbox" name="lembre"> Lembrar-me
        </label>
        <br><br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>
