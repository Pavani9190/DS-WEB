function converterParaMaiusculo() {
    var texto = document.getElementById("texto").value;
    if (texto.trim() === "") {
        document.getElementById("resultado").innerText = "Digite um texto para converter.";
    } else {
        document.getElementById("resultado").innerText = texto.toUpperCase();
    }
}