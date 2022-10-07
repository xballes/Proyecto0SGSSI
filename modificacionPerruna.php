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

$NombrePerro=$_GET["NombrePerro"];
$nombre=$_POST['nombrePerro'];
$raza = $_POST['razaPerro'];
$peso = $_POST['pesoPerro'];
$fecha = $_POST['fechaPerro'];

$NombrePerrosql="UPDATE Perro SET NombrePerro='$nombre' WHERE NombrePerro='$NombrePerro' ";
$razasql="UPDATE Perro SET Raza='$raza' WHERE NombrePerro='$NombrePerro' ";
$pesosql="UPDATE Perro SET Peso='$peso' WHERE NombrePerro='$NombrePerro' ";
$fechasql="UPDATE Perro SET FechaNacimiento='$fecha' WHERE NombrePerro='$NombrePerro' ";

//if(!empty($NombrePerro)){
    echo $NombrePerro;
    echo $nombre;
    echo $raza;
    echo $peso;
    echo $fecha;
    
$ejecutar1=mysqli_query($conectar,$NombrePerrosql);
if(!isset($nombre)){
    if($ejecutar1){   
        ?> 
        <h3 class="bien">Nombre modificado correctamente!</h3>
          <?php
    }
}
//}
if(!isset($raza)){
$ejecutar2=mysqli_query($conectar,$razaql);
if($ejecutar2){
    ?> 
    <h3 class="bien">¡Raza modificada correctamente!</h3>
      <?php
    }
}
if(!isset($peso)){
$ejecutar3=mysqli_query($conectar,$pesosql);
    if($ejecutar3){
        ?> 
        <h3 class="bien">Peso modificado correctamente!</h3>
          <?php
    }
}
if(!isset($fecha)){
    $ejecutar4=mysqli_query($conectar,$fechasql);
        if($ejecutar4){
            ?> 
            <h3 class="bien">Fecha modificada correctamente!</h3>
              <?php
        }
    }
?>