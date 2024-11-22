<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Form</title>
</head>
<body>
    <section class="sect-login">
        <div class="login">
            <form action="./index.php" method="post" style="text-align: start">
                <img class="logo" src="./logo.png" alt="Gerador de senha logo"/>
                <h1 style="text-align: center">Sistema Login</h1> <br>
                
           
                <div class="input-group">
                    <div>
                        <label>Aluno:</label>
                        <input class="block" type="text" name="aluno" id="aluno" required placeholder="insira seu nome">
                    </div>
                    <div>
                        <label>RM:</label>
                        <input class="block" type="number" name="rm" id="RM" required placeholder="insira seu RM">
                    </div>
                </div>

            
                <div class="input-group">
                    <div>
                        <label>N° chamada:</label>
                        <input class="block" type="number" name="chamada" id="chamada" required placeholder="insira seu número">
                    </div>
                    <div>
                        <label>Patrimônio máquina:</label>
                        <input class="block" type="number" name="patrimonio" id="patrimônio" required placeholder="insira o patrimônio">
                    </div>
                </div>

            
                <div class="input-group">
                    <div>
                        <label>N° máquina:</label>
                        <input class="block" type="number" name="maquina" id="máquina" required placeholder="insira o número da máquina">
                    </div>
                    <div>
                        <label>Servicetag(St):</label>
                        <input class="block" type="text" name="servicetag" id="servicetag" required placeholder="insira o St">
                    </div>
                </div>

                
                <label>Foto:</label>
                <input class="block" type="file" name="foto" id="foto" required> <br><br>
                
               
                <div class="buttons">
                    <input type="submit" value="Cadastrar">
                    <input type="reset" value="Limpar">
                </div>

            </form>
        </div>
    </section>
</body>
</html>
