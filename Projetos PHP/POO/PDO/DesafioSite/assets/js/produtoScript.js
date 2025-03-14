function validarDadosProduto() {
    let codigo = document.getElementById("codigo");
    let nome = document.getElementById("nome");
    let estoque = document.getElementById("estoque");
    let preco = document.getElementById("preco");

    let erroCodigo = document.getElementById("erro-codigo");
    let erroNome = document.getElementById("erro-nome");
    let erroEstoque = document.getElementById("erro-estoque");
    let erroPreco = document.getElementById("erro-preco");

   
    erroCodigo.innerHTML = "";
    erroNome.innerHTML = "";
    erroEstoque.innerHTML = "";
    erroPreco.innerHTML = "";

    let valido = true;

   
    if (codigo.value.trim() === "" || isNaN(codigo.value) || parseInt(codigo.value) <= 0) {
        erroCodigo.innerHTML = "Informe um código válido.";
        codigo.focus();
        valido = false;
    }

   
    if (nome.value.trim().length < 3) {
        erroNome.innerHTML = "O nome deve ter pelo menos 3 caracteres.";
        nome.focus();
        valido = false;
    }

    
    if (estoque.value.trim() === "" || isNaN(estoque.value) || parseInt(estoque.value) < 0) {
        erroEstoque.innerHTML = "Informe um valor válido para o estoque.";
        estoque.focus();
        valido = false;
    }

   
    if (preco.value.trim() === "" || isNaN(preco.value.replace(",", "."))) {
        erroPreco.innerHTML = "Informe um preço válido.";
        preco.focus();
        valido = false;
    }

    return valido;
}
