<?php

class Pessoa { 
    private string $nome;
    private int $idade;

    public function __construct(string $nome, int $idade) {
        $this->nome = $nome;
        $this->idade = $idade;
    }

    public function getNome(): string {
        return $this->nome;
    }

    public function getIdade(): int {
        return $this->idade;
    }
}

class Funcionario extends Pessoa {
    protected float $salario;

    public function __construct(string $nome, int $idade, float $salario) {
        parent::__construct($nome, $idade);
        $this->salario = $salario;
    }

    public function calcularBonus(): float {
        return 0;
    }
}

class Gerente extends Funcionario {
    public function calcularBonus(): float {
        return $this->salario * 0.2;
    }
}

class Desenvolvedor extends Funcionario {
    public function calcularBonus(): float {
        return $this->salario * 0.1;
    }
}

$gerente = new Gerente("Carlos", 40, 5000);
$dev = new Desenvolvedor("Ana", 30, 3000);
echo "Bônus do gerente: R$ " . $gerente->calcularBonus() . "\n";
echo "<br><br>";
echo "Bônus do desenvolvedor: R$ " . $dev->calcularBonus() . "\n";
echo "<br><br>";

abstract class Animal {
    abstract public function fazerSom(): string;
}

class Cachorro extends Animal {
    public function fazerSom(): string {
        return "Latido";
    }
}

class Gato extends Animal {
    public function fazerSom(): string {
        return "Miado";
    }
}

class Passaro extends Animal {
    public function fazerSom(): string {
        return "Piu-piu";
    }

    public function mover(): string {
        return "Voa e anda";
    }

}

$cachorro = new Cachorro();
$gato = new Gato();
$passaro = new Passaro ();
echo "Som do cachorro: " . $cachorro->fazerSom() . "\n";
echo "<br><br>";
echo "Som do gato: " . $gato->fazerSom() . "\n";
echo "<br><br>";
echo "Som do pássaro: " . $passaro->fazerSom() . "e ele" . $passaro->mover() . "\n";
echo "<br><br>";

class Veiculo {
    protected string $marca;
    protected string $modelo;
    private int $velocidade = 0;

    public function __construct(string $marca, string $modelo) {
        $this->marca =$marca;
        $this->modelo = $modelo;
    }

    public function setVelocidade(int $velocidade): void {
        $this->velocidade = $velocidade;
    }

    public function getVelocidade(): int {
        return $this->velocidade;
    } 
}

class Carro extends Veiculo {
    public function acelerar(): void {
        $this->setVelocidade($this->getVelocidade() + 10);
    }
}

class Moto extends Veiculo {
    public function acelerar(): void {
        $this->setVelocidade($this->getVelocidade() + 15);
    }
}

$carro = new Carro("Toyota", "Corolla");
$moto = new Moto("Honda", "CBR");
$carro->acelerar();
$moto->acelerar();
echo "Velocidade do carro: " . $carro->getVelocidade() . " km/h\n";
echo "<br><br>";
echo "Velocidade da moto: " . $moto->getVelocidade() . " km/h\n";
echo "<br><br>";


abstract class Produto {
    protected string $nome;
    protected float $preco;
    protected int $estoque;

    public function __construct(string $nome, float $preco, int $estoque) {
        $this->nome = $nome;
        $this->preco = $preco;
        $this->estoque = $estoque;
    }

    abstract public function calcularDesconto(): float;
}

class Eletronico extends Produto {
    public function calcularDesconto(): float {
        return $this->estoque < 5 ? $this->preco * 0.8 : $this->preco * 0.9;
    }
}

class Roupa extends Produto {
    public function calcularDesconto(): float {
        return $this->estoque < 5 ? $this->preco * 0.7 : $this->preco * 0.8;
    }
}

$celular = new Eletronico("Celular", 1000, 3);
$camisa = new Roupa("Camisa", 100, 10);
echo "Preço do celular com desconto: R$ " . $celular->calcularDesconto() . "\n";
echo "<br><br>";
echo "Preço da camisa com desconto: R$ " . $camisa->calcularDesconto() . "\n";
echo "<br><br>";

class Documento {
    private string $numero;

    public function setNumero(string $numero): void {
        $this->numero = $numero;
    }

    public function getNumero(): string {
        return $this->numero;
    }
}

class CPF extends Documento {
    public function validar(): bool {
        $cpf = preg_replace('/[^0-9]/', '', $this->getNumero());
        if (strlen($cpf) != 11) return false;
        for ($i = 0; $i < 10; $i++) {
            if ($cpf == str_repeat($i, 11)) return false;
        }
        
        for ($t = 9; $t < 11; $t++) {
            $d = 0;
            for ($c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$t] != $d) return false;
        }
        
        return true;
    }
}

$cpf = new CPF();
$cpf->setNumero("12345678909");
echo "CPF válido? " . ($cpf->validar() ? "Sim" : "Não") . "\n";


?>