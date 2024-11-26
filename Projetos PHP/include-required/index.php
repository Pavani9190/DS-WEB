<?php

    $idadeUsuario = 10;

    //Incluindo o cabeçalho
    include('head.html');

    //Icluindo o corpo
    if($idadeUsuario >= 16){
        include('body.html');

    }else{
        include('body2.html');
    }

    //Incluindo o corpo em PHP com require
    require_once('body.php');

    //Icluindo o rodapé
    include('footer.html');



?>