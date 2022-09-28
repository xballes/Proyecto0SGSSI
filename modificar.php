<?php
//ob_start(); // para borrar el output buffer https://stackoverflow.com/questions/12654831/php-headers-already-sent-caused-by-session-start
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
if(!empty($nombre){
    $nombresql="UPDATE Usuario SET Nombre='$nombre' where Nombre="$_SESSION['Usuario']"";
}else if(!empty($dni)){
    $dnisql="UPDATE Usuario SET Dni='$dni' where Nombre="$_SESSION['Usuario']"";
}else if(!empty($telefono)){
    $telefonosql="UPDATE Usuario SET Telefono='$telefono' where Nombre="$_SESSION['Usuario']"";
}else if(!empty($fecha)){
    $fechasql="UPDATE Usuario SET Fecha='$fecha' where Nombre="$_SESSION['Usuario']"";
}
else if(!empty($email)){
    $emailsql="UPDATE Usuario SET Email='$email' where Nombre="$_SESSION['Usuario']"";
}else if (!empty($contrasena)){
    $contrasenasql="UPDATE Usuario SET Contrasena='$contrasena' where Nombre="$_SESSION['Usuario']"";
}

//ejecutamos la sentencia de sql
$ejecutar1=mysqli_query($conectar,$nombresql);
$ejecutar2=mysqli_query($conectar,$dnisql);
$ejecutar3=mysqli_query($conectar,$telefonosql);
$ejecutar4=mysqli_query($conectar,$fechasql);
$ejecutar5=mysqli_query($conectar,$emailsql);
$ejecutar6=mysqli_query($conectar,$contrasenasql);
//verificamos la ejecucion
if(!$ejecutar){
    ?> 
	    	<h3 class="ok">¡Ha ocurrido un error,vuelve a introducir los datos!</h3>
           <?php
}else{
    echo"Datos Modificados Correctamente";
    /*SESION*/
    $_SESSION['Usuario']=$nombre;
    header("Location:areapersonal.php");
}

?>
