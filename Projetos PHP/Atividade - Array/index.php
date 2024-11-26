<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade - Array</title>
</head>
<body>
<?php
    // 1. array simples de frutas contendo pelo menos cinco itens.

    $frutas = ["Maçã", "Banana", "Laranja", "Uva", "Manga"];

    echo "1. Frutas no array:<br><br>";
    foreach ($frutas as $fruta) {
        echo "- $fruta<br><br>";
    }

    echo "<br>"; // Espaçamento

    // 2. novo elemento ao array.

    $frutas[] = "Abacaxi";

    echo "2. Novo elemento:<br><br>";
    print_r($frutas);

    echo "<br><br><br>"; // Espaçamento

    // 3. array em ordem alfabética.

    sort($frutas);

    echo "3. Ordem alfabética:<br><br>";
    print_r($frutas);

    echo "<br><br><br>"; // Espaçamento

    // 4. array associativo para armazenar informações de um produto.

    $produto = [
        "nome" => "Teclado",
        "preco" => 120.50,
        "estoque" => 15
    ];

    echo "4. Informações do produto:<br><br>";
    foreach ($produto as $key => $valor) {
        echo ucfirst($key) . ": $valor<br><br>";
    }

    echo "<br>"; // Espaçamento

    // 5. Atualização do preço do produto para um novo valor.

    $produto["preco"] = 135.00;

    echo "5. Informações atualizadas sobre o produto:<br><br>";
    foreach ($produto as $key => $valor) {
        echo ucfirst($key) . ": $valor<br><br>";
    }

    echo "<br>"; // Espaçamento

    // 6. Cálculo da venda de 5 unidades do produto.

    $venda = 5;
    $total = $produto["preco"] * $venda;

    echo "6. Valor total da venda de $venda unidades: R$ " . number_format($total, 2, ',', '.') . "<br><br>";

    echo "<br>"; // Espaçamento

    // 7. Junção de dois arrays.

    $nomesp = ["Teclado", "Mouse", "Monitor"];
    $precosp = [150.00, 80.00, 1200.00];
    $produtosj = array_combine($nomesp, $precosp);

    echo "7. Junção de produtos e preços:<br><br>";
    print_r($produtosj);

    echo "<br><br><br>"; // Espaçamento 

    // 8. Verificação se um elemento existe.

    $cores = ["vermelho", "azul", "verde", "amarelo", "preto"];
    $cor_escolhida = "verde";

    if (in_array($cor_escolhida, $cores)) {
        echo "8. A cor \"$cor_escolhida\" está presente no array.<br>";
    } else {
        echo "8. A cor \"$cor_escolhida\" não está presente no array.<br>";
    }

    echo "<br><br>"; // Espaçamento 

    // 9. Soma e média de valores.

    $numeros = [10, 20, 30, 40, 50];
    $soma = array_sum($numeros);
    $media = $soma / count($numeros);

    echo "9. Soma dos números: $soma<br><br>";
    echo "Média dos números: $media<br><br>";

    echo "<br><br>"; // Espaçamento 
?>

</body>
</html>

