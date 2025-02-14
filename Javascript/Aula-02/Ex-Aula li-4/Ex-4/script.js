function calcular() {
    let num1 = parseFloat(document.getElementById("num1").value);
    let num2 = parseFloat(document.getElementById("num2").value);
    let operacao = document.getElementById("operacao").value;
    let resultado;
    
    if (operacao === "+") {
        resultado = num1 + num2;
    } else if (operacao === "-") {
        resultado = num1 - num2;
    } else if (operacao === "*") {
        resultado = num1 * num2;
    } else if (operacao === "/") {
        if (num2 !== 0) {
            resultado = num1 / num2;
        } else {
            resultado = "Erro: divisão por zero";
        }
    } else {
        resultado = "Operação inválida";
    }

    document.getElementById("resultado").innerText = "Resultado: " + resultado;
}
