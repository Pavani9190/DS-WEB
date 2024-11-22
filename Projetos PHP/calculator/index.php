<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Form</title>

</head>

<body>
    <div class="sect-login">
        <form action=<?php echo $_SERVER["PHP_SELF"]; ?> method="post">

        <div class="sect-interna-login">
            <h1 style="text-align: center">Calculadora</h1> <br>
            <label style="text-align: start">Insira o primeiro valor:</label> <br>
            <input type="number" name="first-value" id="numero" required autofocus placeholder="insira seu primeiro numero"> <br><br>
            <label style="text-align: start">Insira o segundo valor:</label> <br>
            <input type="number" name="second-value" id="number" required autofocus placeholder="insira seu segundo numero"> <br><br>
            <label for="operation">Operação:</label>
            <select class="select" name="operation" id="operation">
                <option value="+">Adição | +</option>
                <option value="-">Subtração | -</option>
                <option value="*">Multiplicação | *</option>
                <option value="/">Divisão | /</option>
            </select>
        </div>
            <p>Resultado:
                <?php

                function soma($firstValue, $secondValue) {
                    return $firstValue + $secondValue;
                }
                
                function subtracao($firstValue, $secondValue) {
                    return $firstValue - $secondValue;
                }
                
                function multiplicacao($firstValue, $secondValue) {
                    return $firstValue * $secondValue;
                }
                
                function divisao($firstValue, $secondValue) {
                    if ($secondValue == 0) {
                        return "Erro: o número não pode ser dividido por zero";
                    } else {
                        return $firstValue / $secondValue;
                    }
                };
                if (isset($_POST['first-value'])) {
                    $firstValue = $_POST["first-value"];
                    $secondValue = $_POST["second-value"];
                    $ope = $_POST["operation"];
                    if (strlen($firstValue) > 4 || strlen($secondValue) > 4) {
                    echo "Não podemos fazer essa conta, ultrapassou o limite de caracteres";
                    } else {
    
                        switch ($ope) {
                            case '+':
                                echo soma($firstValue, $secondValue);
                                break;
                            case '-':
                                echo subtracao($firstValue, $secondValue);
                                break;
                            case '*':
                                echo multiplicacao($firstValue, $secondValue);
                                break;
                            case '/':
                                echo divisao($firstValue, $secondValue);
                                break;
                            default:
                                echo "Operação inválida";
                    };
                };
            };
                ?>
            </p>
            <div class="div-bottom">
                <input style="margin-right: 10px;" type="submit" value="Calcular">
                <input type="reset" value="Limpar">
            </div>



        </form>
    </div>





</body>

</html>