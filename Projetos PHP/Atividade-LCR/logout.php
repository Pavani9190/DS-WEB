<?php
session_start();
session_destroy(); 


if (isset($_COOKIE['usuario'])) {
    setcookie('usuario', '', time() - 3600, '/');
}

header("Location: login.php");
exit();
?>
