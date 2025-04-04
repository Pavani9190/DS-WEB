var msgAviso = "";
var cliente = []
var produtos = []
var valorTotalCarrinho = 0

function selecionaCliente(id, nome){
    cliente["id"] = id
    cliente["nome"] = nome
    msgAviso = "Aviso: Cliente atualizado"
    atualizaCarrinho()
}

function atualizaCliente(){
    dadosCliente = document.getElementById("dadosCliente")
    dadosCliente.innerHTML = "Cliente: " + cliente["nome"]
}

function selecionaProduto(id, nome, codigo, estoque, preco){
    produtos[id] = {
        "id" : id,
        "nome" : nome,
        "codigo" : codigo,
        "estoque" : estoque,
        "preco" : preco,
        "quantidade" : 1
    }
    console.log(produtos)

    atualizaCarrinho()
}

function atualizaProduto(){
    
    valorTotalCarrinho = 0
    produtos.forEach(produto => {
        //Calculo de total do carrinho
        valorTotalCarrinho+= produto.preco * produto.quantidade
        
        //Cria o cabeçalho dos produtos
        adicionaLinha = document.createElement("tr");

        adicionaCodigo = document.createElement("td");
        adicionaCodigo.textContent = produto.codigo;
        adicionaNome = document.createElement("td");
        adicionaNome.textContent = produto.nome;
        adicionaPreco = document.createElement("td");
        adicionaPreco.textContent = "R$"+produto.preco.toFixed(2);
        adicionaQuantidade = document.createElement("td");
        adicionaQuantidade.innerHTML =  "<i onclick='quantidadeProduto("+produto.id+",-1)' class='fa-solid fa-minus'></i> "+ produto.quantidade + " <i onclick='quantidadeProduto("+produto.id+",1)' class='fa-solid fa-plus'></i>";
        adicionaTotal = document.createElement("td");
        adicionaTotal.textContent = "R$"+(produto.preco * produto.quantidade).toFixed(2);
        adicionaExcluir = document.createElement("td");
        adicionaExcluir.innerHTML = "<i onclick='excluirProduto("+produto.id+")' class='fa-solid fa-trash'></i>";


        adicionaLinha.appendChild(adicionaCodigo)
        adicionaLinha.appendChild(adicionaNome)
        adicionaLinha.appendChild(adicionaPreco)
        adicionaLinha.appendChild(adicionaQuantidade)
        adicionaLinha.appendChild(adicionaTotal)
        adicionaLinha.appendChild(adicionaExcluir)

        tabela.appendChild(adicionaLinha)
    }); 
}

function quantidadeProduto(id,quantidade){
    if(produtos[id].quantidade + quantidade >= 1 ){  //Valida menor do que 1
        if(produtos[id].quantidade + quantidade <= produtos[id].estoque) {//Valida limite de estoque 
            produtos[id].quantidade += quantidade
            atualizaCarrinho()
        }   
    }
}

function excluirProduto(id){
    delete produtos[id]
    atualizaCarrinho()
}




function atualizaCarrinho(){
    //Exibe o aviso
    aviso = document.getElementById("aviso")
    aviso.innerHTML = msgAviso
    //Exibe o Cliente
    atualizaCliente()

    //Cria o cabecalho do carrinho
    tabela = document.getElementById("tabelaCarrinho")
    tabela.innerHTML = "";

    adicionaLinha = document.createElement("tr");
    adicionaCabecalho = document.createElement("th");
    adicionaCabecalho.setAttribute("colspan","6");
    adicionaCabecalho.textContent = "Carrinho"

    adicionaLinha.appendChild(adicionaCabecalho)
    tabela.appendChild(adicionaLinha)

    //Cria o cabeçalho dos produtos
    adicionaLinha = document.createElement("tr");

    adicionaCodigo = document.createElement("th");
    adicionaCodigo.textContent = "Código";
    adicionaNome = document.createElement("th");
    adicionaNome.textContent = "Nome";
    adicionaPreco = document.createElement("th");
    adicionaPreco.textContent = "Preco";
    adicionaQuantidade = document.createElement("th");
    adicionaQuantidade.textContent = "Quantidade";
    adicionaTotal = document.createElement("th");
    adicionaTotal.textContent = "Total do Produto";
    adicionaExcluir = document.createElement("th");
    adicionaExcluir.textContent = "Excluir";


    adicionaLinha.appendChild(adicionaCodigo)
    adicionaLinha.appendChild(adicionaNome)
    adicionaLinha.appendChild(adicionaPreco)
    adicionaLinha.appendChild(adicionaQuantidade)
    adicionaLinha.appendChild(adicionaTotal)
    adicionaLinha.appendChild(adicionaExcluir)

    tabela.appendChild(adicionaLinha)

    //Atualizar produtos no carrinho
    atualizaProduto()

    //Exibe calculo do Valor Total
    adicionaTexto = document.createElement("span")
    adicionaTexto.setAttribute("class","totalCarrinho")
    adicionaTexto.textContent = "Valor total: R$"+valorTotalCarrinho.toFixed(2)

    //Exibe botão para enviar os dados
    adicionaBotao = document.createElement("button")
    adicionaBotao.setAttribute("onclick","finalizaVenda()")
    adicionaBotao.textContent = "Registrar Venda"
    
    rodapeCarrinho = document.getElementById("rodapeCarrinho")
    rodapeCarrinho.innerHTML = ""
    rodapeCarrinho.appendChild(adicionaTexto)
    rodapeCarrinho.appendChild(adicionaBotao)
}


async function finalizaVenda(){
    try{
        const dados = {
            cliente: {
                idCliente : cliente["id"],
                nomeCliente : cliente["nome"]
            },
            produtos: Object.values(produtos)
        }
        console.log(dados)
        let response = await fetch("./venda/vendaPost.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(dados)
        });

        let data = await response.text();
        console.log("Post criado:", data);
    }catch(error){
        console.error("Erro ao criar post:", error);
    }
}