function validarDadosCliente() {
    if (formulario.nome.value.length < 3 || formulario.nome.value.length == "") {

        alert("Preencha o campo nome corretamente! \n Verifique se o nome poosui mais do que 2 caracteres.");
        return false;
        
    }

    if (formulario.email.value == "" || 
        formulario.email.value.indexOf('@') == -1 || 
        formulario.email.value.indexOf('.') == -1) {

            alert("Preencha o campo email corretamente!");
            return false;

        
    }

    if (formulario.observacao.value.length > 1000) {
        alert("Excedeu a capacidade de caracteres! \n No momento possui "+ formulario.observacao.value.length);
        return false;
        
    }
}