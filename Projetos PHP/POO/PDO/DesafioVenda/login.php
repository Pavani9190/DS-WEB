<?php
    session_start();
    if(isset($_SESSION['login']) and isset($_SESSION['senha'])){
        header('Location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <form action="login.php" method="POST">
            <label>Login: </label>
            <input type="text" name="login">
            <br>
            <label>Senha: </label>
            <input type="text" name="senha">
            <br>
            <input type="submit">
        </form>
    </div>
</body>
</html>


<?php
    session_start();

    //Verifica se veio do Formulário
    if(isset($_POST['login'])){
        //Verifica se o login esta correto
        include_once('connection.php');
        $login = $_POST['login'];
        $senha = $_POST['senha'];

        $sql = "SELECT * FROM funcionario WHERE email = '$login' and senha = '$senha'";
        $resultado = mysqli_query($conexao, $sql);    
        // Verifica se há registros
        if (mysqli_num_rows($resultado) > 0) {
            //Converte em Array Associativo
            $linha = mysqli_fetch_assoc($resultado);
            //Grava os dados na sessão
            $_SESSION['login'] = $linha['email'];
            $_SESSION['senha'] = $linha['senha'];
        }else{
            $_SESSION['erro'] = "Login ou senha invalida";
        }

    }