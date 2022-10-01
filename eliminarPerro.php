<?php
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

 $nombre=$_GET["NombrePerro"];
 $sql="DELETE FROM Perro WHERE NombrePerro='$nombre'";
 $query=mysqli_query($conectar,$sql);
 if($query){
    echo 'Se ha eliminado a '.$nombre.' de la lista';
}

?>
