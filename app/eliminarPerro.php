<?php
 $conectar=@mysqli_connect("db","admin","test","database");
 ob_start();
 //verificamos la conexion
 if(!$conectar){
     echo"No Se Pudo Conectar Con El Servidor";
 }else{
     $base=mysqli_select_db($conectar,"database");
         if(!$base){
             echo"No Se Encontro La Base De Datos";
         }
 }

 $nombre=$_GET["NombrePerro"];
 $fecha=$_GET["FechaNacimiento"];
 $pais=$_GET["PaisOrigen"];
 if($sql=$conectar->prepare("DELETE FROM Perro WHERE (NombrePerro=? AND PaisOrigen=? AND FechaNacimiento=?)")){
    $sql->bind_param('sss',$nombre,$pais,$fecha);
    $sql->execute();
    $eliminar=$sql->get_result();
    $sql->close();
 }
    $conectar->close();
    echo 'Se ha eliminado a '.$nombre.' de la lista';
    header("Location:lista.php");
    //exit();

?>
