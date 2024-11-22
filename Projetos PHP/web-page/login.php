<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="log.css">
</head>
<body>
    <section class="credencial">
        <div class="login">

            <?php
                $nome = $_POST["nome"];
                $senha = $_POST["senha"];


                if($nome == "aluno" and $senha == "sesi"){
                    echo " <h1>Autenticado com Sucesso.</h1> <br> <a href='/web-page/'>Voltar</a>";
                } else{
                    echo "<h1>Usuário ou senha não identificado, tente novamente..</h1> <br> <a href='/web-page/'>Voltar</a>";
                }
            ?>
        </div>
    </section>
</body>
</html>




