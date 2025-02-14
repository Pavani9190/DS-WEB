function classificarTriangulo() {
    let a = parseFloat(document.getElementById("a").value);
    let b = parseFloat(document.getElementById("b").value);
    let c = parseFloat(document.getElementById("c").value);
    
    if (a + b > c && a + c > b && b + c > a) {
        if (a === b && b === c) {
            document.getElementById("resultado").innerText = "Triângulo Equilátero.";
        } else if (a === b || a === c || b === c) {
            document.getElementById("resultado").innerText = "Triângulo Isósceles.";
        } else {
            document.getElementById("resultado").innerText = "Triângulo Escaleno.";
        }
    } else {
        document.getElementById("resultado").innerText = "Não é um triângulo válido.";
    }
}
