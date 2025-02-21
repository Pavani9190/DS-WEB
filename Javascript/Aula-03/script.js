function card() {
    let nome = document.getElementById("usuario").value;
    let descricao = document.getElementById("descricao").value;

    if (nome === "" || descricao === "") {
        alert("Preencha todos os campos!");
        return;
    }

    let sist = document.createElement("div");
    sist.setAttribute("class", "login");
    sist.style.display = "flex";
    sist.style.flexDirection = "column";
    sist.style.alignItems = "center";
    sist.style.width = "500px";
    sist.style.height = "410px";
    sist.style.backgroundColor = "#1d1d1deb";
    sist.style.borderRadius = "10px";
    sist.style.padding = "30px";
    sist.style.boxShadow = "0 4px 8px rgba(0, 0, 0, 0.2)";

    let text = document.createElement("h1");
    text.style.fontSize = "22px";
    text.style.margin = "0";
    text.style.color = "#fff";
    text.style.textAlign = "center";

    let labe = document.createElement("label");
    labe.style.color = "#fff";
    labe.style.fontSize = "16px";
    labe.style.marginBottom = "10px";
    labe.style.textAlign = "start";

    let cartao = document.createElement("div");
    cartao.setAttribute("class", "cartao");
    cartao.style.border = "1px solid #ccc";
    cartao.style.borderRadius = "8px";
    cartao.style.padding = "10px";
    cartao.style.margin = "10px 0";
    cartao.style.backgroundColor = "#1d1d1deb";
    cartao.style.boxShadow = "2px 2px 5px rgba(0, 0, 0, 0.1)";
    cartao.style.width = "200px";
    cartao.style.height = "150px";
    cartao.style.display = "flex";
    cartao.style.flexDirection = "column";
    cartao.style.alignItems = "center";

    let titulo = document.createElement("h3");
    titulo.textContent = nome;
    titulo.style.color = "white" ;

    let texto = document.createElement("p");
    texto.textContent = descricao;
    texto.style.color = "white" ;

    let botaoExcluir = document.createElement("button");
    botaoExcluir.textContent = "Excluir";
    botaoExcluir.setAttribute("class", "botao-excluir");
    botaoExcluir.style.backgroundColor = "red";
    botaoExcluir.style.color = "white";
    botaoExcluir.style.border = "none";
    botaoExcluir.style.padding = "5px 10px";
    botaoExcluir.style.cursor = "pointer";
    botaoExcluir.style.borderRadius = "5px";
    botaoExcluir.onclick = function() {
        cartao.remove();
    };

    cartao.appendChild(titulo);
    cartao.appendChild(texto);
    cartao.appendChild(botaoExcluir);

    sist.appendChild(text);
    sist.appendChild(labe);

    document.getElementById("login").appendChild(sist);

    document.getElementById("cartoes").appendChild(cartao);

    document.getElementById("nome").value = "";
    document.getElementById("descricao").value = "";




























}