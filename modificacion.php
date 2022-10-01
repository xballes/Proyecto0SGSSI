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
$nombreAcambiar=$_POST["NombreDelPerro"];
$nombre=$_POST['nombrePerro'];
$raza=$_POST['razaPerro'];
$peso=$_POST['pesoPerro'];
$fecha=$_POST['fechanacimiento'];
$actual=$_SESSION['DNI'];
$actualNombre=$_SESSION['Usuario'];

  
$nombresql="UPDATE Perro SET Nombre='$nombre' WHERE Nombre='$nombreAcambiar' ";
$razasql="UPDATE Perro SET Raza='$raza' WHERE Nombre='$nombreAcambiar'";
$pesosql="UPDATE Perro SET Peso='$peso' WHERE Nombre='$nombreAcambiar'";
$fechasql="UPDATE Perro SET FechaNacimiento='$fecha'Nombre='$nombreAcambiar'";

if(!empty($nombre)){
  
    $ejecutar1=mysqli_query($conectar,$nombresql);
    if($ejecutar1){
        echo "$nombre";
        echo "$nombreAcambiar";

    echo("Nombre modificado correctamente");
    }
}
if(!empty($raza)){
    $ejecutar2=mysqli_query($conectar,$razasql);
    if($ejecutar2){
    echo("Raza modificada correctamente");
    
    
    }
}
if(!empty($peso)){
    $ejecutar3=mysqli_query($conectar,$pesosql);
    if($ejecutar3){
    /*Cerrar sesion*/
    echo("Peso modificado correctamente");
    }
}
if(!empty($fecha)){
    $ejecutar4=mysqli_query($conectar,$fechasql);
    if($ejecutar4){
    /*Cerrar sesion*/
    echo("Fecha modificada correctamente");
    }
}
?>