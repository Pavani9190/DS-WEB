function verificarParOuImpar() {
    let numero = document.getElementById("numero").value;
    
    if (numero % 2 === 0) {
        document.getElementById("resultado").innerText = "O número é par.";
    } else {
        document.getElementById("resultado").innerText = "O número é ímpar.";
    }
}
