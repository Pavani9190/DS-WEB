function card(params) {
    let nome = document.getElementById("usuario").value;
    let descricao = document.getElementById("descricao").value;

    if (nome === "" || descricao === "") {
        alert("Por favor, preencha todos os campos");
        return;
    }

    let cartao = document.createElement("div");
    cartao.setAttribute("class", "cartao");

    let titulo = document.createElement("h3");
    titulo.textContent = nome;
    let texto = document.createElement("p");
    texto.textContent = descricao;

    let botao = document.createElement("button");
    botao.textContent = "excluir";
    botao.onclick = function () {
        cartao.remove();
    }

    cartao.appendChild(titulo);
    cartao.appendChild(texto);
    cartao.appendChild(botao);

    document.getElementById("cartoes").appendChild(cartao);

    document.getElementById("usuario").value = "";
    document.getElementById("descricao").value = "";
}

let estilo = document.createElement("style");
estilo.textContent = `
   * {
        font-family: "Montserrat", sans-serif;
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background: url("./fundo.jpg") no-repeat center center/cover;
        width: 100%;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }

    .login {
        display: flex;
        flex-direction: column;
        align-items: center;
        background: rgba(29, 29, 29, 0.92);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        width: 350px;
        gap: 10px;
    }

    .login h1 {
        color: #fff;
        font-size: 24px;
    }

    label {
        color: #fff;
        font-size: 16px;
    }

    input[type="text"], input[type="submit"] {
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ccc;
        border-radius: 5px;
        width: 100%;
    }

    input[type="submit"] {
        background-color: rgb(220, 20, 20);
        color: white;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    input[type="submit"]:hover {
        background-color: rgb(176, 11, 11);
    }

    .cartoes {
        margin-top: 20px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        align-items: center;
    }

    .cartao {
        display: flex;
        flex-direction: column;
        align-items: center;
        width: 300px;
        background-color: rgba(29, 29, 29, 0.92);
        border-radius: 10px;
        padding: 20px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        text-align: center;
    }

    h3 {
        font-size: 18px;
        color: #fff;
        margin-bottom: 10px;
    }

    p {
        font-size: 14px;
        color: #cbcbcb;
    }

    .cartao button {
        background-color: rgb(220, 20, 20);
        color: white;
        border: none;
        padding: 8px 12px;
        border-radius: 5px;
        cursor: pointer;
        margin-top: 10px;
        transition: background-color 0.3s;
    }

    .cartao button:hover {
        background-color: rgb(176, 11, 11);
    }

`;

document.head.appendChild(estilo);