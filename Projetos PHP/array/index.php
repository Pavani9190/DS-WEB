<?php
    include_once('arrays.php');

    /*Exemplo de uso do is_array*/
    $variavelTexto = 'gustavo';
    if(is_array($estado)){
        echo "é uma array<br><br>";
    }else{
        echo "Não é uma array<br><br>";
    }

    /*Exemplo de uso do array_unshift() e array_push()*/
    array_unshift($estado, "Rio Grande do Sul");
    array_push($estado, "Paraná");

    foreach($estado as $estadoLinha){
        echo 'Estado: '.$estadoLinha.'<br>';
    }

    echo '<br><br><br>';

    /*Exemplo de array_shift() e array_pop()*/
    $removido = array_shift($estado);
    echo $removido.'<br>';

    $removido = array_pop($estado);
    echo $removido.'<br><br>';

    /* Exemplo de uso do in_array */
    if(in_array("São Paulo", $estado)){
        echo "Estado encontrado";
    }

    echo '<br><br>';
    
    /*Exemplo de uso do array_key_exists() */

    if(array_key_exists('SP', $estadoChaves)){
        echo "Chave encontrada";
    }

?>