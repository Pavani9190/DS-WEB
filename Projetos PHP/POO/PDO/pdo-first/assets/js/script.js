//Função para validação dos dados do Cliente
function validarDadosCliente(){

    if(formulario.nome.value.length < 3 || formulario.nome.value == ""){
        formulario.nome.focus();
        document.getElementById('erro-nome').innerHTML = "Verifique se o nome possui mais do que 2 caracteres.";
        document.getElementById('erro-email').innerHTML = "";
        document.getElementById('erro-observacao').innerHTML = "";
        return false;
    }

    
    if(formulario.email.value == "" || 
        formulario.email.value.indexOf('@')==-1 || 
        formulario.email.value.indexOf('.')==-1){
        formulario.email.focus();
        document.getElementById('erro-nome').innerHTML = "";
        document.getElementById('erro-email').innerHTML = "Preencha o campo email corretamente!";
        document.getElementById('erro-observacao').innerHTML = "";
        return false;

    }

    if(formulario.observacao.value.length > 1000){
        formulario.observacao.focus();
        document.getElementById('erro-nome').innerHTML = "";
        document.getElementById('erro-email').innerHTML = "";
        document.getElementById('erro-observacao').innerHTML = "Excedeu a capacidade de caracteres!<br>No momento possui "+formulario.observacao.value.length;
        return false;
    }


    

}