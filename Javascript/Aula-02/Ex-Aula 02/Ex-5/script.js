function mudarCor() {
    let div = document.getElementById("minhaDiv");
    let cores = ["red", "green", "blue", "purple", "orange"];
    let corAleatoria = cores[Math.floor(Math.random() * cores.length)];
    div.style.backgroundColor = corAleatoria;
}