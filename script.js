
function comprobarCampos(){
    if(document.getElementById('nombre').value==='' || !isNaN(document.getElementById('nombre').value)){ //Comprueba si el campo es vacio o contiene numeros ()
        alert("El campo nombre esta vacio o contiene un numero");
        return false;
    }
    else if(!(/^\d{8}$/.test(document.getElementById('telefono').value))){
        alert("El numero debe ser de 9 digitos");
        return false;
    }
    else if(!(/^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])$/.test(document.getElementById('fecha').value))){ //https://foroayuda.es/php-regex-para-verificar-la-fecha-esta-en-formato-aaaa-mm-dd/
        alert("La fecha introducida no sigue el patron: aaaa-mm-dd");
        return false;
   }
   else if(!(/^[a-zA-Z]+([\.]?[a-zA-Z0-9_-]+)*@[a-z0-9]+([\.-]+[a-z0-9]+)*\.[a-z]{2,4}$/.test(document.getElementById('email').value))){ //https://es.stackoverflow.com/questions/142/validar-un-email-en-javascript-que-acepte-todos-los-caracteres-latinos
    alert("El email introducido no es correcto");
    return false;
}
    
else if(/^\d{8}[a-zA-Z]$/.test(document.getElementById('dni').value)) {
    var n = document.getElementById('dni').value.substr(0,8);
    var c = document.getElementById('dni').value.substr(8,1);
     if(!(c.toUpperCase() == 'TRWAGMYFPDXBNJZSQVHLCKET'.charAt(n%23))){
        alert('DNI erroneo');
    }
    }else{
        alert('DNI erroneo');
        return false;

    }
}
//-----------------------------------------------------------------------------------------------------------------
function comprobarCamposPerro(){
    if(!isNaN(document.getElementById('nombrePerro').value) && (document.getElementById('nombrePerro')).value.length>0){ //Comprueba si el campo es vacio o contiene numeros ()
        alert("El campo nombre esta vacio o contiene un numero");
        return false;
    }
    else if(!(/^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])$/.test(document.getElementById('fechaPerro').value)) && (document.getElementById('fechaPerro').value.length>0)){ //https://foroayuda.es/php-regex-para-verificar-la-fecha-esta-en-formato-aaaa-mm-dd/
        alert("La fecha introducida no sigue el patron: aaaa-mm-dd");
        return false;
   }
}
//-----------------------------------MODIFICAR--------------------------------------------
function modificarNombre(){
    if(!isNaN(document.getElementById('nombre').value)){
        alert("El campo nombre contiene un numero");
        return false;
       
    }
}
function modificarDNI(){
    if(/^\d{8}-[a-zA-Z]$/.test(document.getElementById('dni').value)) {
        var n = document.getElementById('dni').value.substr(0,8);
        var c = document.getElementById('dni').value.substr(8,1);
         if(!(c.toUpperCase() == 'TRWAGMYFPDXBNJZSQVHLCKET'.charAt(n%23))){
            alert('DNI erroneo');
        }
        }else{
            alert('DNI erroneo');
            return false;
    
        }
    }

function modificarTelefono(){
    if(document.getElementById('telefono').value.length!=9){
        alert("El numero debe ser de 9 digitos")
        return false;

    }
}
function modificarFecha(){
    if(!/^\d{4}[\/\-](0?[1-9]|1[012])[\/\-](0?[1-9]|[12][0-9]|3[01])$/.test(document.getElementById('fecha').value)){
        alert("La fecha introducida no sigue el patron: aaaa-mm-dd")
        return false;
    }
}
function modificarEmail(){
    if(!/^[a-zA-Z]+([\.]?[a-zA-Z0-9_-]+)*@[a-z0-9]+([\.-]+[a-z0-9]+)*\.[a-z]{2,4}$/.test(document.getElementById('email').value)){
        alert("El email introducido no es correcto")
        return false;
    }
}




