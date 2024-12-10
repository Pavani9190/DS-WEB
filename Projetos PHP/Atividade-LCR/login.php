<?php
session_start();
include_once('connection.php');


if (isset($_SESSION['usuario']) || isset($_COOKIE['usuario'])) {
    header("Location: dash.php");
    exit();
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    // Busca o usuário no banco
    $sql = "SELECT * FROM usuarios WHERE email = '$usuario' AND senha = '$senha'";
    $resultado = mysqli_query($conn, $sql);

    if ($resultado) {
        $usuario_bd = mysqli_fetch_assoc($resultado);

        if ($usuario_bd) {
            // Sessão do usuário
            $_SESSION['usuario'] = $usuario_bd['nome'];

            if (!empty($_POST['lembrar'])) {
                setcookie('usuario', $usuario_bd['nome'], time() + 86400, "/"); // 1 dia
            }

            header("Location: dash.php");
            exit();
        } else {
            $erro = "Usuário ou senha inválidos.";
        }
    } else {
        $erro = "Erro na consulta ao banco.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Login</h1>
    <form method="post" action="">
        <div class="form-container">
            <div class="form-box">
                <div class="group">
                    <input type="email" name="usuario" class="input"  required>
                    <span class="bar"></span>
                    <label>E-mail</label>
                </div>
                <div class="group">
                    <input type="password" name="senha" class="input"  required>
                    <span class="bar"></span>
                    <label>Senha</label>
                </div>
                <button type="submit" id="bottone5">Entrar</button>
                <?php if (isset($erro)) echo "<p>$erro</p>"; ?>
            </div>
        </div>
    </form>
</body>
</html>
