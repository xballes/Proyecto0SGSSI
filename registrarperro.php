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


$nombrePerro=$_POST['nombrePerro'];
$raza=$_POST['razaPerro'];
$peso=$_POST['pesoPerro'];
$fechanacimiento=$_POST['fechanacimiento'];

$sesionactual=$_SESSION['Usuario'];

$dniactual="SELECT DNI from Usuario where Nombre='$sesionactual'";
$ejecutar=mysqli_query($conectar,$dniactual);
$dnidueno=mysqli_fetch_array($ejecutar)[0];



$registrar="INSERT INTO Perro VALUES('$nombrePerro','$raza','$peso','$fechanacimiento','$dnidueno')";
$registro=mysqli_query($conectar,$registrar);

if(!$registro){
    ?>      
	    	<h3 class="bad">¡Ha ocurrido un error en el registro,vuelve a introducir los datos!</h3>
           <?php
            
}else{
    ?> 
     <h3 class="bad">¡Perro registrado correctamente!</h3>
   <?php
     header("Location:areapersonal.php");
}

?>
