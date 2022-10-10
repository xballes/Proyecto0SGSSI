<?php
$NombrePerro=$_GET['NombrePerro'];
$fecha=$_GET['FechaNacimiento'];
$pais=$_GET['PaisOrigen'];
ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formularios.css">
    <script src="./script.js"></script>
  <title>Formulario de Registro</title>
</head>
<body>
  
  <form class="formulario" action="modificarPerro.php?NombrePerro=<?=$NombrePerro?>&FechaNacimiento=<?=$fecha?>&PaisOrigen=<?=$pais?>"method="POST" onsubmit="return comprobarCamposPerro();">
    <h4>Modificar datos de:</h4>
    <h4> <?php echo $NombrePerro;
    ?></h4>
    <input type="hidden" name="NombrePerro" value="<?=$NombrePerro?>">
    <p>Nombre:</p>
    <input class="caja" type="text" name="nombrePerro" id ='nombrePerro' placeholder="p. ej Rocky">

    <p>Raza:</p>
    <input class="caja"type="text" name="razaPerro" id ='razaPerro' placeholder="p. ej Bulldog">

    <p>Peso:</p>
    <input class="caja" type="text" name ="pesoPerro" id ='pesoPerro' placeholder="p. ej 40" >

    <p>Fecha de nacimiento:</p>
    <input class="caja" type="text" name ="fechaPerro" id ='fechaPerro' placeholder="p. ej 2000-10-10">

    <p>Pais de origen:</p>
    <input class="caja" type="text" name ="paisorigen" id ='paisorigen' placeholder="p. ej Francia">

    <input class="botones"type="submit" value="Modificar datos" name="registrar.perro">
    <input class="botones"type="button" value="Volver a la lista" name="volver.lista" onclick="location.href='lista.php'">
    <input class="botones"type="reset" value="Borrar datos" name="borrar">

</form>
</body>
</html>

<?php
ob_start();
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
$fechaN=$_GET["FechaNacimiento"];
$paisO=$_GET["PaisOrigen"];

$nombre=$_POST['nombrePerro'];
$raza = $_POST['razaPerro'];
$peso = $_POST['pesoPerro'];
$fecha = $_POST['fechaPerro'];
$paisform=$_POST['paisorigen'];


$sql="UPDATE Perro SET NombrePerro='$nombre',Raza='$raza',Peso='$peso',FechaNacimiento='$fecha',PaisOrigen='$paisform' WHERE (NombrePerro='$NombrePerro' AND PaisOrigen='$paisO' AND FechaNacimiento='$fechaN')";
/*$razasql="UPDATE Perro SET Raza='$raza' WHERE (NombrePerro='$NombrePerro'AND PaisOrigen='$paisO' AND FechaNacimiento='$fechaN')";
$pesosql="UPDATE Perro SET Peso='$peso' WHERE (NombrePerro='$NombrePerro'AND PaisOrigen='$paisO' AND FechaNacimiento='$fechaN')";
$fechasql="UPDATE Perro SET FechaNacimiento='$fecha' WHERE (NombrePerro='$NombrePerro'AND PaisOrigen='$paisO' AND FechaNacimiento='$fechaN')";
$paissql="UPDATE Perro SET PaisOrigen='$paisform' WHERE (NombrePerro='$NombrePerro'AND PaisOrigen='$paisO' AND FechaNacimiento='$fechaN')";*/

    if(!empty($nombre) || !empty($raza) || !empty($peso) || !empty($fecha) || !empty($paisform)){ 
        $ejecutar1=mysqli_query($conectar,$sql);
            if($ejecutar1){
                ?> 
                <h3 class="bien">¡Datos modificados correctamente!</h3>
                  <?php
                  
            }
        }

?>