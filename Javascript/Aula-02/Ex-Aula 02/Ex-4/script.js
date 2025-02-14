function calcularAcrescimo(valor, porcentagem) {
    let aumento = (valor * porcentagem) / 100;
    return valor + aumento;
}

function calcular() {
    let valor = parseFloat(document.getElementById("valor").value);
    let porcentagem = parseFloat(document.getElementById("porcentagem").value);

    if (isNaN(valor) || isNaN(porcentagem)) {
        alert("Por favor, insira números válidos.");
        return;
    }

    let resultado = calcularAcrescimo(valor, porcentagem);
    document.getElementById("resultado").innerText = resultado.toFixed(2);
}