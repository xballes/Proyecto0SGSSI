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


if(!empty($nombre)){
    $ejecutar1=mysqli_query($conectar,$nombresql);
    if($ejecutar1){
    /*Cerrar sesion*/
    $_SESSION['Usuario']=$nombre;
    echo("Nombre modificado correctamente");
    }
}
if(!empty($dni)){
    $ejecutar2=mysqli_query($conectar,$dnisql);
    if($ejecutar2){
    $_SESSION['DNI']=$dni;
    echo("DNI modificado correctamente");
    
    
    }
}
if(!empty($telefono)){
    $ejecutar3=mysqli_query($conectar,$telefonosql);
    if($ejecutar3){
    /*Cerrar sesion*/
    echo("Telefono modificado correctamente");
    }
}
if(!empty($fecha)){
    $ejecutar4=mysqli_query($conectar,$fechasql);
    if($ejecutar4){
    /*Cerrar sesion*/
    echo("Fecha modificada correctamente");
    }
}
if(!empty($email)){
    $ejecutar5=mysqli_query($conectar,$emailsql);
    if($ejecutar5){
    /*Cerrar sesion*/
    echo("Email modificado correctamente");
    }
}
if(!empty($contrasena)){
    $ejecutar6=mysqli_query($conectar,$contrasenasql);
    if($ejecutar6){
    /*Cerrar sesion*/
    echo("Contraseña modificada correctamente");
    }
}


?>
