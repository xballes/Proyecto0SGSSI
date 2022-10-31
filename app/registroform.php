<?php
ob_start();
session_start();
include 'logear.php';
$conectar=@mysqli_connect("db","lK9pF81rtVq1","o80dGpAMjKb2","database");
//verificamos la conexion
if(!$conectar){
    echo"No Se Pudo Conectar Con El Servidor";
    logear_error("No se ha podido conectar con el servidor");
    
}else{
    $base=mysqli_select_db($conectar,"database");
        if(!$base){
            logear_error("No se ha encontrado la base de datos,comprueba que esta bien importada");
            echo"No Se Encontro La Base De Datos";
        
        }
} 
//recuperar las variables
$nombre=$_POST['nombre'];
$dni=$_POST['dni'];
$telefono=$_POST['telefono'];
$fecha=$_POST['fecha'];
$email=$_POST['email'];
$contrasena=password_hash($_POST['contrasena'],PASSWORD_DEFAULT."\n");


//hacemos la sentencia de sql


//verificamos la ejecucion
if(isset($nombre,$dni,$telefono,$fecha,$email,$contrasena)){
  console.log($contrasena);
  if($sql=$conectar->prepare("INSERT INTO Usuario (Nombre,DNI,Telefono,Fecha,Email,Contrasena) VALUES(?,?,?,?,?,?)")){
    $sql->bind_param('ssisss',$nombre,$dni,$telefono,$fecha,$email,$contrasena);
    $sql->execute();
    $insertar=$sql->get_result();
    $sql->close();
  }
    $conectar->close();
    if($insertar){
      logear_error("¡Ha ocurrido un error,vuelve a introducir los datos! Error al registrarse".$nombre.$dni);
      ?> 
          <h3 class="bad">¡Ha ocurrido un error,vuelve a introducir los datos!</h3>
          
           <?php
  }
      //echo"Datos Guardados Correctamente";
      /*SESION*/
      $_SESSION['Usuario']=$nombre;
      $_SESSION['DNI']=$dni;
      header("Location:areapersonal.php");    
    
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formularios.css">
    <script src="./script.js"></script>
  <title>Formulario de Registro</title>
</head>
<body>
 

  <form action="registroform.php" class="formulario" method="POST" onsubmit="return comprobarCampos();">
    <h4>Formulario de Registro</h4>
    <p>Nombre:</p>
    <input class="caja" type="text" name="nombre" id ='nombre' placeholder="p. ej Ander" required>
   
    <p>DNI:</p>
    <input class="caja"type="text" name="dni" id ='dni' placeholder="p. ej 79087651A" required>

    <p>Telefono:</p>
    <input class="caja" type="text" name ="telefono" id ='telefono' placeholder="p. ej 123456789" required>

    <p>Fecha de nacimiento:</p>
    <input class="caja" type="text" name ="fecha" id ='fecha' placeholder="p. ej 2000-10-10" required>

    <p>Email:</p>
    <input class="caja" type="text" name ="email" id='email' placeholder="p. ej xxxxxxx@gmail.com" required><br>
<p>Contrasena:</p>
    <input class="caja" type="password" name ="contrasena" id='contrasena'required><br>

    <input class="botones"type="submit" value="Registrar usuario" name="registrar">
    <input class="botones"type="reset" value="Borrar datos" name="borrar">
    <input class="botones" type="button" value="Volver página principal" name="volver" onclick="location.href='index.html'">
    <p><a href="iniciosesion.php">Ya tengo Cuenta</a></p>
</form>
</body>
</html>
