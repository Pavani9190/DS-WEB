<?php

//Classe Pai
class Documento {

    private $numero;
    
    public function getNumero() {
        return $this->numero;
    }

    public function setNumero($n) {
        $this->numero = $n;
    }
}

//Classe filho
class CPF extends Documento {

    public function validar():bool {
        $numeroCPF = $this->getNumero();
        return false;
    }
}

$doc = new CPF();

$doc->setNumero("111222333-44");

var_dump($doc->validar());

echo "<br/>";

echo $doc->getNumero();

?>