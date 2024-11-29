<?php
session_start();

//Limpa a sessão
session_unset();
session_destroy();

//Remove o cookie
setcookie('usuario', '', time() - 3600, "/");

//Redireciona para a página de login
header("Location: login.php");
exit();
?>
