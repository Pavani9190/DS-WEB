<?php
//Inicializa as variáveis de erro
$erroNome = $erroEmail = $erroObservacao = $erroIdade = "";

//Função para limpar os dados de entrada
function limpaEntrada($dado) {
    $dado = trim($dado);   //Remove espaços extras
    $dado = stripslashes($dado); //Remove barras invertidas
    $dado = htmlspecialchars($dado); //converte caracteres especiais
    return $dado;
}

function validaCliente($nome, $email, $observacao) {
    
    if (empty($nome)) {
        $erroNome = "O nome é obrigatório";
    } else {
        $nome = limpaEntrada($nome);
        if (strlen($nome) < 3) {
            $erroNome = "O campo precisa possuir no minimo 3 caracteres";
        }
    }

    if (empty($email)) {
        $erroEmail = "O e-mail é obrigatório";
    } else {
        $email = limpaEntrada($email);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erroEmail = "Formato de e-mail inválido";
        }
    }

    if (!empty($observacao)) {
        $observacao = limpaEntrada($observacao);
        if (strlen($observacao) > 1000) {
            $erroObservacao = "O campo não pode possuir mais do que 1000 caracteres";
        }
    }

    // Validação da Idade (Exemplo de numero inteiro)
    /*
    if (empty($_POST["idade"])) {
        $erroIdade = "A idade é obrigatória";
    } else {
        $idade = limpaEntrada($_POST["idade"]);
        if (!filter_var($idade, FILTER_VALIDATE_INT) || $idade <= 0) {
            $erroIdade = "Idade inválida";
        }
    }
    */

    // Se tudo estiver correto, processa os dados
    if (empty($erroNome) && empty($erroEmail) && empty($erroObservacao)) {
        echo "Dados validados com sucesso!";
        return true;
    }else{
        session_start();
        $_SESSION['erroNome'] = $erroNome;
        $_SESSION['erroEmail'] = $erroEmail;
        $_SESSION['erroObservacao'] = $erroObservacao;

        //Valores dos campos
        $_SESSION['valorNome'] = $nome;
        $_SESSION['valorEmail'] = $email;
        $_SESSION['valorObservacao'] = $observacao;
        return false;
    }
}
?>