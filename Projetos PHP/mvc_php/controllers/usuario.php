<?php
$subRota = $caminho[1] ?? null; //Verifica se há algo na segunda rota

switch($subRota){
    case '':
        if (count($_POST) > 0 && isset ($_FILES['fotoUsuario'])) {
            extract($_POST);

            require_once './models/usuario.php';
            $usuario = new Usuario;
            $usuario->atualizaCadastro([':nomeUsuario' => $nomeUsuario, ':emailUsuario' => $emailUsuario, ':senhaUsuario' => $senhaUsuario], $_FILES);

        }
        require_once './models/usuario.php';
        $usuario = new Usuario;
        $dados = $usuario->queryOne([':idUsuario' => 1]);
        require './views/usuarios/usuario.php';
        break;

    default:
        echo "404 - Página não encontrada";
        break;
}