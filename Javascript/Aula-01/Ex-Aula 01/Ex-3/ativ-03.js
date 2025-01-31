var num1 = Number.parseInt(window.prompt("Digite o primeiro número: "))
var num2 = Number.parseInt(prompt("Digite o segundo número: "))
var funcao = prompt("Qual função você quer: \n 1- Adição \n 2- Subtração \n 3- Multiplicação \n 4- Divisão")

if(funcao == 1)
    alert(num1 + num2)
else if(funcao == 2)
    alert(num1 - num2)
else if(funcao == 3)
    alert(num1 * num2)
else if(funcao == 4)
    alert(num1 / num2)

