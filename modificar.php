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
$usuarioactual=$_SESSION['Usuario'];



// si el campo no esta vacio, no actualizar los datos.
  
    $nombresql="UPDATE Usuario SET Nombre='$nombre' WHERE (Nombre= '$usuarioactual') ";
    $dnisql="UPDATE Usuario SET Dni='$dni' WHERE (Nombre='$usuarioactual') ";
    $telefonosql="UPDATE Usuario SET Telefono='$telefono' WHERE Nombre='$usuarioactual'";
    $fechasql="UPDATE Usuario SET Fecha='$fecha' WHERE Nombre='$usuarioactual'";
    $emailsql="UPDATE Usuario SET Email='$email' WHERE Nombre='$usuarioactual'";
    $contrasenasql="UPDATE Usuario SET Contrasena='$contrasena' WHERE Nombre='$usuarioactual'";

//ejecutamos la sentencia de sql
$ejecutar1=mysqli_query($conectar,$nombresql);
$ejecutar2=mysqli_query($conectar,$dnisql);
$ejecutar3=mysqli_query($conectar,$telefonosql);
$ejecutar4=mysqli_query($conectar,$fechasql);
$ejecutar5=mysqli_query($conectar,$emailsql);
$ejecutar6=mysqli_query($conectar,$contrasenasql);
//verificamos la ejecucion
if(!$ejecutar1){
    ?> 
	    	<h3 class="ok">¡Ha ocurrido un error,vuelve a introducir los datos!</h3>
           <?php
}else{
    echo"Nombre Modificado Correctamente";
    /*SESION*/
    $_SESSION['Usuario']=$nombre;
    header("Location:areapersonal.php");
}
if(!$ejecutar2){
    ?> 
	    	<h3 class="ok">¡Ha ocurrido un error,vuelve a introducir los datos!</h3>
           <?php
}else{
    echo"DNI Modificado Correctamente";
    /*SESION*/
    $_SESSION['Usuario']=$nombre;
    header("Location:areapersonal.php");
}
if(!$ejecutar3){
    ?> 
	    	<h3 class="ok">¡Ha ocurrido un error,vuelve a introducir los datos!</h3>
           <?php
}else{
    echo"Telefono Modificado Correctamente";
    /*SESION*/
    $_SESSION['Usuario']=$nombre;
    header("Location:areapersonal.php");
}
if(!$ejecutar1){
    ?> 
	    	<h3 class="ok">¡Ha ocurrido un error,vuelve a introducir los datos!</h3>
           <?php
}else{
    echo"Nombre Modificado Correctamente";
    /*SESION*/
    $_SESSION['Usuario']=$nombre;
    header("Location:areapersonal.php");
}
if(!$ejecutar1){
    ?> 
	    	<h3 class="ok">¡Ha ocurrido un error,vuelve a introducir los datos!</h3>
           <?php
}else{
    echo"Nombre Modificado Correctamente";
    /*SESION*/
    $_SESSION['Usuario']=$nombre;
    header("Location:areapersonal.php");
}
if(!$ejecutar1){
    ?> 
	    	<h3 class="ok">¡Ha ocurrido un error,vuelve a introducir los datos!</h3>
           <?php
}else{
    echo"Nombre Modificado Correctamente";
    /*SESION*/
    $_SESSION['Usuario']=$nombre;
    header("Location:areapersonal.php");
}

?>
