<?php
    session_start();
    
    
    if(isset($_SESSION['login']) && isset($_SESSION['senha'])){
        echo "Sessão já iniciada. Redirecionando para intro.php...";
        header('Location: intro.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="shortcut icon" type="imagex/png" href="./assets/img/ico.svg">
    <link rel="stylesheet" href="./assets/style/clienteStyle.css">
</head>
<body>
    <div class="container">
        <form action="" method="POST">
            <label>Login (Email): </label>
            <input type="text" name="login" required>
            <br>
            
            <label>Cargo: </label>
            <select name="cargo" required>
                <option value="Administrador">Administrador</option>
                <option value="Funcionário">Funcionário</option>
            </select>
            <br>

            <label>Senha: </label>
            <input type="password" name="senha" required>
            <br>

            <input type="submit" value="Entrar">
        </form>
    </div>
</body>
</html>

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include_once('conexao.php');

        $login = trim($_POST['login']); 
        $senha = trim($_POST['senha']); 
        $cargo = trim($_POST['cargo']); 

        
        echo "<p>Login (Email): " . $login . "</p>";
        echo "<p>Senha: " . $senha . "</p>";
        echo "<p>Cargo: " . $cargo . "</p>";

        
        if ($db) {
            echo "<p>Conexão com o banco de dados bem-sucedida.</p>";
        } else {
            echo "<p style='color: red;'>Erro ao conectar ao banco de dados.</p>";
        }

        
        $sql = "SELECT * FROM admin WHERE email = :login AND senha = :senha AND cargo = :cargo";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':login', $login); 
        $stmt->bindParam(':senha', $senha); 
        $stmt->bindParam(':cargo', $cargo); 
        $stmt->execute();

        
        if ($stmt->rowCount() > 0) {
            echo "<p style='color: green;'>Usuário encontrado! Redirecionando...</p>";
            $linha = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['id'] = $linha['id'];
            $_SESSION['nome'] = $linha['nome'];
            $_SESSION['login'] = $linha['email']; 
            $_SESSION['senha'] = $linha['senha']; 
            $_SESSION['cargo'] = $linha['cargo']; 

            
            header('Location: intro.php'); 
            exit();
        } else {
            echo "<p style='color: red; text-align: center;'>Login, senha ou cargo inválidos.</p>";
        }
    }
?>
