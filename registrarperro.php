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
$raza=$_POST['raza'];
$peso=$_POST['peso'];
$fechanacimiento$_POST['fechanacimiento'];
$dnidueño$_POST['dnidueño'];


//hacemos la sentencia de sql
$sql="INSERT INTO Perro (Nombre,Raza,Peso,FechaNacimiento,DNIDueño) VALUES('$nombre','$raza','$peso','$fechanacimiento','$dnidueño')";
//ejecutamos la sentencia de sql
$ejecutar=mysqli_query($conectar,$sql);
//verificamos la ejecucion
if(!$ejecutar){
    ?> 
	    	<h3 class="ok">¡Ha ocurrido un error,vuelve a introducir los datos!</h3>
           <?php
}else{
    echo"Datos Guardados Correctamente";
    /*SESION*/
   
}

?>
