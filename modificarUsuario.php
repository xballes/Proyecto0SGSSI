<?php
ob_start(); // para borrar el output buffer https://stackoverflow.com/questions/12654831/php-headers-already-sent-caused-by-session-start
session_start();
//conectamos Con el servidor
$conectar=@mysqli_connect("db","admin","test","database");
//verificamos la conexion
if(!$conectar){
    echo"No Se Pudo Conectar Con El Servidor";
}else{
    $base=mysqli_select_db($conectar,"database");
        if(!$base){
            echo"No Se Encontro La Base De Datos";
        }
}   
//recuperar las variables
$nombre=$_POST['nombre'];
$dni=$_POST['dni'];
$telefono=$_POST['telefono'];
$fecha=$_POST['fecha'];
$email=$_POST['email'];
$contrasena=$_POST['contrasena'];
$actual=$_SESSION['DNI'];
$actualNombre=$_SESSION['Usuario'];


// si el campo esta vacio, no actualizar los datos.
  
    $nombresql="UPDATE Usuario SET Nombre='$nombre' WHERE DNI='$actual' ";
    $dnisql="UPDATE Usuario SET DNI='$dni' WHERE DNI='$actual' ";
    $telefonosql="UPDATE Usuario SET Telefono='$telefono' WHERE DNI='$actual' ";
    $fechasql="UPDATE Usuario SET Fecha='$fecha' WHERE DNI='$actual' ";
    $emailsql="UPDATE Usuario SET Email='$email' WHERE DNI='$actual' ";
    $contrasenasql="UPDATE Usuario SET Contrasena='$contrasena' WHERE DNI='$actual' ";


if(isset($nombre)){
    $ejecutar1=mysqli_query($conectar,$nombresql);
    if($ejecutar1){
    /*Cerrar sesion*/
    $_SESSION['Usuario']=$nombre;
    ?> 
    <h3 class="ok">¡Nombre modificado correctamente!</h3>
      <?php
    }
}
if(isset($dni)){
    $ejecutar2=mysqli_query($conectar,$dnisql);
    if($ejecutar2){
    $_SESSION['DNI']=$dni;
    ?> 
    <h3 class="ok">¡DNI modificado correctamente!</h3>
      <?php
     
    }
}
if(isset($telefono)){
    $ejecutar3=mysqli_query($conectar,$telefonosql);
    if($ejecutar3){
    /*Cerrar sesion*/
    ?> 
    <h3 class="ok">¡Telefono modificado correctamente!</h3>
      <?php
    }
}
if(isset($fecha)){
    $ejecutar4=mysqli_query($conectar,$fechasql);
    if($ejecutar4){
    /*Cerrar sesion*/
    ?> 
    <h3 class="ok">¡Fecha modificada correctamente!</h3>
      <?php
    }
}
if(isset($email)){
    $ejecutar5=mysqli_query($conectar,$emailsql);
    if($ejecutar5){
    /*Cerrar sesion*/
    ?> 
          <h3 class="ok">¡Email modificado correctamente!</h3>
            <?php
    }
}
if(isset($contrasena)){
    $ejecutar6=mysqli_query($conectar,$contrasenasql);
    if($ejecutar6){
    /*Cerrar sesion*/
    ?> 
          <h3 class="ok">¡Contraseña modificada correctamente!</h3>
            <?php
    }
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
  <title>Modificacion de datos</title>
</head>
<body>
  
  
  
  <form action="modificar.php" class="formulario" method="POST">
    <h4>Modificar datos</h4>
    <h4>Rellena los campos que quieres que se modifiquen</h4>
    <p>Nombre:</p>
    <input class="caja" type="text" name="nombre" id ='nombre' placeholder="p. ej Ander">
    <input class="botones"type="submit" value="Modificar nombre" name="modificarNombre" onclick="return modificarNombre();">
   
    <p>DNI:</p>
    <input class="caja"type="text" name="dni" id ='dni' placeholder="p. ej XXXXXXXX-A">
    <input class="botones"type="submit" value="Modificar dni" name="modificarDNI" onclick="return modificarDNI();">

    <p>Telefono:</p>
    <input class="caja" type="text" name ="telefono" id ='telefono' placeholder="p. ej 123456789">
    <input class="botones"type="submit" value="Modificar nombre" name="modificarTelefono" onclick="return modificarTelefono();">

    <p>Fecha de nacimiento:</p>
    <input class="caja" type="text" name ="fecha" id ='fecha' placeholder="p. ej 2000-10-10">
    <input class="botones"type="submit" value="Modificar fecha" name="modificarFecha" onclick="return modificarFecha();">

    <p>Email:</p>
    <input class="caja" type="text" name ="email" id='email' placeholder="p. ej xxxxxxx@gmail.com" ><br>
    <input class="botones"type="submit" value="Modificar nombre" name="modificarEmail" onclick=" return modificarEmail();">
<p>Contrasena:</p>
    <input class="caja" type="password" name ="contrasena" id='contrasena'><br>
    <input class="botones"type="submit" value="Modificar contraseña" name="modificarContrasena">

    <input class="botones"type="reset" value="Borrar datos" name="borrar">
</form>
</body>
</html>
