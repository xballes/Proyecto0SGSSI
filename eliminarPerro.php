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
 $dni=$_GET["DNIDueño"];
 $sql="DELETE FROM Perro WHERE (NombrePerro='$nombre' AND DNIDueño='$dni')";
 $query=mysqli_query($conectar,$sql);
 if($query){
    echo 'Se ha eliminado a '.$nombre.' de la lista';
    header("Location:lista.php");
    exit(); 
}
?>
