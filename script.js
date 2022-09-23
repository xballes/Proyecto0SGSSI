function iniciarSesion(){
    console.log("Hola");

}


function comprobarCampos(){
    if(document.getElementById('nombre').value==='' || !isNaN(document.getElementById('nombre').value)){ //Comprueba si el campo es vacio o contiene numeros ()
        alert("El campo nombre esta vacio o contiene un numero")
    }

    comprobarDNI;
    
    if(document.getElementById('telefono').value.length!=9){
        alert("El numero debe ser de 9 digitos")
    }

   if(!(/^[0-9]4-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/.test(document.getElementById('fecha').value))){ //https://foroayuda.es/php-regex-para-verificar-la-fecha-esta-en-formato-aaaa-mm-dd/
        alert("La fecha introducida no sigue el patron: aaaa-mm-dd")
   }

    if(!(/^[a-zA-Z]+([\.]?[a-zA-Z0-9_-]+)*@[a-z0-9]+([\.-]+[a-z0-9]+)*\.[a-z]{2,4}$/.test(document.getElementById('email').value))){ //https://es.stackoverflow.com/questions/142/validar-un-email-en-javascript-que-acepte-todos-los-caracteres-latinos
        alert("El email introducido no es correcto")

    }
}
function comprobarDNI(){
    var numero
    var letr
    var letra
    if(/^\d{8}-[a-zA-Z]$/.test(document.getElementById('dni').value) == true){ //(https://donnierock.com/2011/11/05/validar-un-dni-con-javascript/)
        numero = document.getElementById('dni').value.substr(0,document.getElementById('dni').value.length-1);
        letr = document.getElementById('dni').value.substr(document.getElementById('dni').value-1,1);
        numero = numero % 23;
        letra='TRWAGMYFPDXBNJZSQVHLCKET';
        letra=letra.substring(numero,numero+1);
       if (letra!=letr.toUpperCase()) {
          alert('Dni erroneo, la letra del DNI no se corresponde');
        }else{
          alert('Dni correcto');
        }
     }else{
        alert('Dni erroneo, formato no válido');
      }
}
