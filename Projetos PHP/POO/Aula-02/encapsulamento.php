<?php

class Pessoa {

    public $nome = "Rasmus";
    protected $idade = 48;
    private $senha = "12345";

    public function verDados(){
        echo $this->nome . "<br/>";
        echo $this->idade . "<br/>";
        echo $this->senha . "<br/>";
    }
}

$objeto = new Pessoa();

$objeto->verDados();
echo "<br>";

//exibindo um dado publico
echo $objeto->nome . "<br/>";

//exibindo um dado protegido
//echo $objeto->idade . "<br/>";

//exibindo um dado privado
//echo $objeto->senha . "<br/>";
?>