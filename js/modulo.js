//Função para bloquear entrada de letra ou número
function validarEntrada(caracter, typeBlock){

    var tipo = typeBlock;
    
    if(window.event)
        var asc = caracter.charCode;
    else
        var asc = caracter.which;
    
    
    if (tipo == "numeric"){
        
        if(asc >=48 && asc <=57){
           return false;
        }
        
    }
    else if(tipo == "string"){
            if(asc < 48 || asc > 57){
                return false;
            }    
    }
    
}


//Função para fazer mascara do telefone (99) 9999-9999
function mascaraFone(obj,caracter){
    
    if (validarEntrada(caracter, 'string') == false)
        return false;
    
    var input = obj.value;
    var id = obj.id;
    var resultado = input;
    
    if(input.length == 0)
        resultado = "(";
    else if(input.length == 3)
        resultado += ") ";
    else if(input.length == 9)
        resultado += "-";
    else if(input.length == 14)
        return false;
    
    
    document.getElementById(id).value = resultado;
    
}

//Função para fazer mascara do celular (99) 9-9999-9999
function mascaraCel(obj,caracter){
    
    if (validarEntrada(caracter, 'string') == false)
        return false;
    
    var input = obj.value;
    var id = obj.id;
    var resultado = input;
    
    if(input.length == 0)
        resultado = "(";
    else if(input.length == 3)
        resultado += ") ";
    else if(input.length == 6)
        resultado += "-";
    else if(input.length == 11)
        resultado += "-";
    else if(input.length == 16)
        return false;
  document.getElementById(id).value = resultado;

}


//Função para fazer mascara da data dd/mm/aaaa
function mascaraData(obj,caracter){
    
    if (validarEntrada(caracter, 'string') == false)
        return false
    
    
    var input = obj.value;
    var id = obj.id;
    var resultado = input;
    
    if(input.length == 2)
        resultado += "/";
    else if(input.length == 5)
        resultado += "/";
    else if(input.length == 10)
        return false;
    
    document.getElementById(id).value = resultado;
    
}