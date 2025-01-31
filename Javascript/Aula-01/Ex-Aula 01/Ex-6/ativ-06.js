var C = prompt("Digite o capital inicial:")
var i = prompt("Digite a taxa de juros mensal (em %):")
var t = prompt("Digite o tempo do investimento (em meses):")

C = Number(C)
i = Number(i) / 100
t = Number(t)

var M = C
var contador = 0

while (contador < t) {
    M = M * (1 + i)
    contador = contador + 1
}


alert("O montante final é: " + M.toFixed(2))