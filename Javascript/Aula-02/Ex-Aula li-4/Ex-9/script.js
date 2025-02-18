document.body.innerHTML += `
<input type="text" id="inputText" placeholder="Digite algo...">
<p id="outputText"></p>`;




const inputText = document.getElementById("inputText");
const outputText = document.getElementById("outputText");

inputText.oninput = function () {
    outputText.textContent = "Você digitou: " + inputText.value;
};