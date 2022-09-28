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

// si el campo esta vacio, no actualizar los datos.
if(empty($nombre){

}
$sql="UPDATE Usuario SET Nombre='$nombre' where Nombre="$_SESSION['Usuario']"";
//ejecutamos la sentencia de sql
$ejecutar=mysqli_query($conectar,$sql);
//verificamos la ejecucion
if(!$ejecutar){
    ?> 
	    	<h3 class="ok">¡Ha ocurrido un error,vuelve a introducir los datos!</h3>
           <?php
}else{
    echo"Datos Actualizados Correctamente";
    /*SESION*/
    $_SESSION['Usuario']=$nombre;
    header("Location:areapersonal.php");
}

?>
