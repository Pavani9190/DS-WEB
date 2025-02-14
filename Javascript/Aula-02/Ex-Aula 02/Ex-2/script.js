function verificar() {
    var numero = document.getElementById("numero").value;
    if (numero === "") {
        document.getElementById("resultado").innerText = "Por favor, digite um número.";
    } else {
        numero = parseInt(numero);
        var mensagem = (numero % 2 === 0) ? `O número ${numero} é PAR!` : `O número ${numero} é ÍMPAR!`;
        document.getElementById("resultado").innerText = mensagem;
    }
}