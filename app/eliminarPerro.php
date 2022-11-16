<?php
header('X-Frame-Options:SAMEORIGIN'); //click-jacking prevention
//header("Content-Security-Policy: default-src 'self'");
ob_start();
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

 $nombre=$_GET["NombrePerro"];
 $fecha=$_GET["FechaNacimiento"];
 $pais=$_GET["PaisOrigen"];
 if(!isset($_SESSION['Usuario']) || !isset($_SESSION['DNI'])){
    header("location:iniciosesion.php");
}else{
 if($sql=$conectar->prepare("DELETE FROM Perro WHERE (NombrePerro=? AND PaisOrigen=? AND FechaNacimiento=?)")){
    $sql->bind_param('sss',$nombre,$pais,$fecha);
    $sql->execute();
    $eliminar=$sql->get_result();
    $sql->close();
 }
    $conectar->close();
    echo 'Se ha eliminado a '.$nombre.' de la lista';
    header("Location:listapersonal.php");
}
?>
