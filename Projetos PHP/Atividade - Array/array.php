<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array - Bidimensional</title>
</head>
<body>
<?php
    // Array multidimensional para produtos

    $produtos = array(
        array('nome' => 'Achocolatado', 'preco' => 10.50, 'estoque' => 20),
        array('nome' => 'Sorvete', 'preco' => 25.00, 'estoque' => 15),
        array('nome' => 'Amendoim', 'preco' => 8.75, 'estoque' => 30)
    );

    // Exibindo o nome e preço de todos os produtos

    echo "Produtos disponíveis:<br><br>";
    foreach ($produtos as $produto) {
        echo "Nome: " . $produto['nome'] . " - Preço: R$ " . number_format($produto['preco'], 2, ',', '.') . "<br><br>";
    }

    // Calculando o valor total em estoque

    $total = 0;
    foreach ($produtos as $produto) {
        $total += $produto['preco'] * $produto['estoque'];
    }

    echo "<br>";

    echo "Valor total em estoque: R$ " . number_format($total, 2, ',', '.');


    echo "<br><br>";


    // Array bidimensional para alunos e notas

    $alunos = array(
        array('nome' => 'Ana', 'matematica' => 8, 'portugues' => 7),
        array('nome' => 'Bruno', 'matematica' => 6, 'portugues' => 9),
        array('nome' => 'Carlos', 'matematica' => 7, 'portugues' => 8)
    );

    echo "<br>";

    // Exibindo o nome e as notas de cada aluno

    echo "Notas dos alunos:<br><br>";
    foreach ($alunos as $aluno) {
        echo "Nome: " . $aluno['nome'] . " - Matemática: " . $aluno['matematica'] . " - Português: " . $aluno['portugues'] . "<br><br>";
    }

    echo "<br>";

    // Calculando e exibindo a média de cada aluno

    echo "<br>Médias dos alunos:<br><br>";
    foreach ($alunos as $aluno) {
        $media = ($aluno['matematica'] + $aluno['portugues']) / 2;
        echo "Nome: " . $aluno['nome'] . " - Média: " . number_format($media, 2, ',', '.') . "<br><br>";
    }




?>
</body>
</html>


