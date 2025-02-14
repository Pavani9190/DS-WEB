function verificarLogin() {
    let usuario = document.getElementById("usuario").value;
    let senha = document.getElementById("senha").value;
    
    if (usuario === "admin" && senha === "12345") {
        document.getElementById("resultado").innerText = "Bem-vindo, Admin!";
    } else {
        document.getElementById("resultado").innerText = "Usuário ou senha incorretos.";
    }
}
