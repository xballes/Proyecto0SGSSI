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


// si el campo no esta vacio, no actualizar los datos.
  
    $nombresql="UPDATE Usuario SET Nombre='$nombre' WHERE (Nombre= '$_SESSION['Usuario']' ";
    $dnisql="UPDATE Usuario SET Dni='$dni' WHERE (Nombre='$_SESSION['Usuario']' ";
    $telefonosql="UPDATE Usuario SET Telefono='$telefono' WHERE Nombre='$_SESSION['Usuario']'";
    $fechasql="UPDATE Usuario SET Fecha='$fecha' WHERE Nombre='$_SESSION['Usuario']'";
    $emailsql="UPDATE Usuario SET Email='$email' WHERE Nombre='$_SESSION['Usuario']'";
    $contrasenasql="UPDATE Usuario SET Contrasena='$contrasena' WHERE Nombre='$_SESSION['Usuario']'";

//ejecutamos la sentencia de sql
$ejecutar1=mysqli_query($conectar,$nombresql);
$ejecutar2=mysqli_query($conectar,$dnisql);
$ejecutar3=mysqli_query($conectar,$telefonosql);
$ejecutar4=mysqli_query($conectar,$fechasql);
$ejecutar5=mysqli_query($conectar,$emailsql);
$ejecutar6=mysqli_query($conectar,$contrasenasql);
//verificamos la ejecucion
if(isset($nombre) && $ejecutar1){
    /*Cerrar sesion*/
    session_destroy()
	session_start();
    $_SESSION['Usuario']=$nombre;
    echo("Nombre modificado correctamente");

}
if(isset($dni) && $ejecutar2){
    echo("DNI modificado correctamente");
}
if(isset($telefono) && $ejecutar3){
    echo("Telefono modificado correctamente");
}
if(isset($email) && $ejecutar4){
    echo("Email modificado correctamente");
}

?>
