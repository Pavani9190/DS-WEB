function validarDadosCliente(){

	
	// var nome = getElementById("nome").value;
	
	if (formulario.nome.value == "" || formulario.nome.value.length < 3){
        formulario.nome.focus();
        document.getElementById("erro-nome").innerHTML = "Verifique se o mesmo não esta vazio ou com menos do que 3 caracteres.";
        document.getElementById("erro-estoque").innerHTML = "";
        document.getElementById("erro-observacao").innerHTML = "";
        return false;
	}

    if( formulario.estoque.value == "" || formulario.estoque.value.indexOf('@')==-1 || formulario.estoque.value.indexOf('.')==-1 )
        {
        formulario.estoque.focus();
        document.getElementById("erro-nome").innerHTML = "";
        document.getElementById("erro-estoque").innerHTML = "Preencha o campo E-mail corretamente!";
        document.getElementById("erro-observacao").innerHTML = "";
        return false;
    }

    if (formulario.observacao.value == "")
    {
        formulario.observacao.focus();
        document.getElementById("erro-nome").innerHTML = "";
        document.getElementById("erro-estoque").innerHTML = "";
        document.getElementById("erro-observacao").innerHTML = "Preencha o campo Observação corretamente!";

        return false;
    }

   
}


function validarDadosProduto(){	

    if (formulario.codigo.value == "" || formulario.codigo.value.length < 3){
        formulario.codigo.focus();
        document.getElementById("erro-codigo").innerHTML = "";
        document.getElementById("erro-nome").innerHTML = "";
        document.getElementById("erro-estoque").innerHTML = "";
        document.getElementById("erro-preco").innerHTML = "";
        return false;
	}

	if (formulario.nome.value == "" || formulario.nome.value.length < 3){
        formulario.nome.focus();
        document.getElementById("erro-codigo").innerHTML = "";
        document.getElementById("erro-nome").innerHTML = "Verifique se o mesmo não esta vazio ou com menos do que 3 caracteres.";
        document.getElementById("erro-estoque").innerHTML = "";
        document.getElementById("erro-preco").innerHTML = "";
        return false;
	}

    if( formulario.estoque.value == "" || formulario.estoque.value.indexOf('@')==-1 || formulario.estoque.value.indexOf('.')==-1 )
        {
        formulario.estoque.focus();
        document.getElementById("erro-nome").innerHTML = "";
        document.getElementById("erro-estoque").innerHTML = "Preencha o campo E-mail corretamente!";
        document.getElementById("erro-observacao").innerHTML = "";
        return false;
    }

    if (formulario.observacao.value == "")
    {
        formulario.observacao.focus();
        document.getElementById("erro-nome").innerHTML = "";
        document.getElementById("erro-estoque").innerHTML = "";
        document.getElementById("erro-observacao").innerHTML = "Preencha o campo Observação corretamente!";

        return false;
    }

   
}
