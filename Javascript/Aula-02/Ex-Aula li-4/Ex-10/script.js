document.body.innerHTML += `
<button id="clickButton">Clique aqui</button>
<p id="clickCount">Cliques: 0</p>`;

let count = 0;
const clickButton = document.getElementById("clickButton");
const clickCount = document.getElementById("clickCount");

clickButton.onclick = function () {
    count++;
    clickCount.textContent = "Cliques: " + count;
};