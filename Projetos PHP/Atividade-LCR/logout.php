<?php
session_start();
session_destroy(); // Destrói a sessão

// Apaga o cookie se existir
if (isset($_COOKIE['usuario'])) {
    setcookie('usuario', '', time() - 3600, '/');
}

header("Location: login.php");
exit();
?>
