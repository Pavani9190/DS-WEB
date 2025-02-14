function verificarNumero() {
    let numero = document.getElementById("numero").value;
    
    if (numero > 0) {
        document.getElementById("resultado").innerText = "O número é positivo.";
    } else if (numero < 0) {
        document.getElementById("resultado").innerText = "O número é negativo.";
    } else {
        document.getElementById("resultado").innerText = "O número é zero.";
    }
}
