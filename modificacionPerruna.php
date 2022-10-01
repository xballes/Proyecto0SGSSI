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
$fecha = $_POST['fechanacimiento'];
$hola="Hola que tal";

$NombrePerrosql="UPDATE Perro SET NombrePerro='$nombre' WHERE NombrePerro='$NombrePerro' ";
$razasql="UPDATE Perro SET Raza='$raza' WHERE NombrePerro='$NombrePerro' ";
$pesosql="UPDATE Perro SET Peso='$peso' WHERE NombrePerro='$NombrePerro' ";
$fechasql="UPDATE Perro SET FechaNacimiento='$fecha'WHERE NombrePerro='$NombrePerro' ";

if(!empty($NombrePerro)){
$ejecutar1=mysqli_query($conectar,$NombrePerrosql);
if($ejecutar1){
/*Cerrar sesion*/
echo $NombrePerro;
echo("NombrePerro modificado correctamente");
}
}
if(!empty($raza)){
$ejecutar2=mysqli_query($conectar,$dnisql);
if($ejecutar2){
    echo("Raza modificada correctamente");
    }
}
if(!empty($peso)){
$ejecutar3=mysqli_query($conectar,$telefonosql);
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