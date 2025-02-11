<?php

// Classe Geladeira
class Geladeira {
    public $marca;
    public $cor;
    public $consumoEnergia;
    public $capacidade;
    public $temperatura;

    public function ajustarTemperatura($temp) {
        $this->temperatura = $temp;
        return "Temperatura ajustada para: ".$this->temperatura."°C";
    }

    public function ligar() {
        return "A geladeira está ligada.";
    }

    public function congelar() {
        return "A geladeira está congelando.";
    }
}

// Classe Bicicleta
class Bicicleta {
    public $cor;
    public $preco;
    public $marca;
    public $modelo;
    public $tamanhoAro;

    public function pedalar() {
        return "Você está pedalando.";
    }

    public function trocarMarcha($marcha) {
        return "Marcha trocada para: " . $marcha;
    }

    public function freiar() {
        return "Você freou a bicicleta.";
    }
}

// Classe Controle
class Controle {
    public $marca;
    public $modelo;
    public $tipoSinal;
    public $tamanho;
    public $cor;

    public function ligar() {
        return "A TV foi ligada.";
    }

    public function desligar() {
        return "A TV foi desligada.";
    }

    public function trocarCanal($canal) {
        return "Canal alterado para: " . $canal;
    }
}

// Classe Garrafa
class Garrafa {
    public $material;
    public $capacidade;
    public $cor;
    public $tamanho;
    public $modelo;

    public function esvaziar() {
        return "A garrafa está vazia.";
    }

    public function encherDeAgua() {
        return "A garrafa foi enchida com água.";
    }

    public function beber() {
        return "Você bebeu da garrafa.";
    }
}

// Classe Fone de Ouvido
class FoneDeOuvido {
    public $marca;
    public $modelo;
    public $cor;
    public $nivelBateria;
    public $conectividade;

    public function desligar() {
        return "O fone foi desligado.";
    }

    public function mudarMusica() {
        return "Música trocada.";
    }

    public function ajustarVolume($volume) {
        return "Volume ajustado para: " . $volume;
    }
}

class ContaBancaria {
    public $numeroConta;
    public $nomeTitular;
    public $saldo;

    public function __construct($numeroConta, $nomeTitular, $saldo) {
        $this->numeroConta = $numeroConta;
        $this->nomeTitular = $nomeTitular;
        $this->saldo = $saldo;
    }

    public function depositar($valor) {
        $this->saldo += $valor;
        return "Depósito de R$" . number_format($valor, 2, ',', '.') . " realizado com sucesso. Novo saldo: R$" . number_format($this->saldo, 2, ',', '.');
    }

    public function sacar($valor) {
        if ($valor > $this->saldo) {
            return "Saldo insuficiente para saque de R$" . number_format($valor, 2, ',', '.');
        }
        $this->saldo -= $valor;
        return "Saque de R$" . number_format($valor, 2, ',', '.') . " realizado com sucesso. Novo saldo: R$" . number_format($this->saldo, 2, ',', '.');
    }

    public function exibirDados() {
        return "Número da Conta: $this->numeroConta \nTitular: $this->nomeTitular \nSaldo: R$" . number_format($this->saldo, 2, ',', '.');
    }
}


// Criando objetos e testando os métodos 
$geladeira = new Geladeira();
$geladeira->marca = "Brastemp";
echo $geladeira->ligar() . "<br>";

$bicicleta = new Bicicleta();
$bicicleta->cor = "Vermelha"; 
echo $bicicleta->pedalar() . "<br>";

$controle = new Controle();
$controle->marca = "Samsung";
echo $controle->trocarCanal(5) . "<br>";

$garrafa = new Garrafa();
$garrafa->cor = "Azul";
echo $garrafa->encherDeAgua() . "<br>";

$fone = new FoneDeOuvido();
$fone->marca = "Sony";
echo $fone->mudarMusica() . "<br>";


// Criando contas
$conta1 = new ContaBancaria(87731106, "Gustavo Pavani Manoel de Paula", 9358.29);
$conta2 = new ContaBancaria(87496298, "Bruno Campos", 40939.17);
$conta3 = new ContaBancaria(54372238, "Gustavo Sartorelli", 6377.45);

// Realizando transações
echo $conta1->exibirDados() . "\n";
echo $conta1->sacar(300.00) . "\n";
echo $conta1->depositar(200.00) . "\n\n" ;
echo "<br><br>";

echo $conta2->exibirDados() . "\n";
echo $conta2->sacar(100.00) . "\n";
echo $conta2->depositar(900.00) . "\n\n";
echo "<br><br>";

echo $conta3->exibirDados() . "\n";
echo $conta3->sacar(500.00) . "\n";
echo $conta3->depositar(150.00) . "\n";
echo "<br><br>";



?>
