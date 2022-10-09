<?php
$NombrePerro=$_GET['NombrePerro'];
$DNIDueño=$_GET['DNIDueño'];
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
  
  <form class="formulario" action="modificarPerro.php?NombrePerro=<?=$NombrePerro?>&DNIDueño=<?=$DNIDueño?>"method="POST" onsubmit="return comprobarCamposPerro();">
    <h4>Modificar datos de:</h4>
    <h4> <?php echo $NombrePerro;?></h4>
    <input type="hidden" name="NombrePerro" value="<?=$NombrePerro?>">
    <p>Nombre:</p>
    <input class="caja" type="text" name="nombrePerro" id ='nombrePerro' placeholder="p. ej Rocky">

    <p>Raza:</p>
    <input class="caja"type="text" name="razaPerro" id ='razaPerro' placeholder="p. ej Bulldog">

    <p>Peso:</p>
    <input class="caja" type="text" name ="pesoPerro" id ='pesoPerro' placeholder="p. ej 40" >

    <p>Fecha de nacimiento:</p>
    <input class="caja" type="text" name ="fechaPerro" id ='fechaPerro' placeholder="p. ej 2000-10-10">

    <input class="botones"type="submit" value="Modificar datos" name="registrar.perro">
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
$DNIDueño=$_GET["DNIDueño"];

$nombre=$_POST['nombrePerro'];
$raza = $_POST['razaPerro'];
$peso = $_POST['pesoPerro'];
$fecha = $_POST['fechaPerro'];


$NombrePerrosql="UPDATE Perro SET NombrePerro='$nombre' WHERE (NombrePerro='$NombrePerro' AND DNIDueño='$DNIDueño')";
$razasql="UPDATE Perro SET Raza='$raza' WHERE (NombrePerro='$NombrePerro'AND DNIDueño='$DNIDueño')";
$pesosql="UPDATE Perro SET Peso='$peso' WHERE (NombrePerro='$NombrePerro'AND DNIDueño='$DNIDueño')";
$fechasql="UPDATE Perro SET FechaNacimiento='$fecha' WHERE (NombrePerro='$NombrePerro'AND DNIDueño='$DNIDueño')";

$razasql2="UPDATE Perro SET Raza='$raza' WHERE (NombrePerro='$nombre' AND DNIDueño='$DNIDueño')";
$pesosql2="UPDATE Perro SET Peso='$peso' WHERE (NombrePerro='$nombre'AND DNIDueño='$DNIDueño')";
$fechasql2="UPDATE Perro SET FechaNacimiento='$fecha' WHERE (NombrePerro='$nombre'AND DNIDueño='$DNIDueño')";

if(!empty($nombre)){ //Si cambia el nombre, las demas instrucciones tienen que updatear con el nombre cambiado. SI NO ha cambiado el nombre,no.
    $ejecutar1=mysqli_query($conectar,$NombrePerrosql);
    if($ejecutar1){   
        ?> 
        <h3 class="bien">Nombre modificado correctamente!</h3>
          <?php
          $NombrePerro=$nombre;
        if(!empty($raza)){
            $ejecutar2=mysqli_query($conectar,$razasql2);
            if($ejecutar2){
            ?> 
            <h3 class="bien">¡Raza modificada correctamente!</h3>
                <?php
            }
        }
        if(!empty($peso)){
            $ejecutar3=mysqli_query($conectar,$pesosql2);
            if($ejecutar3){
                ?> 
                <h3 class="bien">Peso modificado correctamente!</h3>
                  <?php
            }
        }
        if(!empty($fecha)){
            $ejecutar4=mysqli_query($conectar,$fechasql2);
                if($ejecutar4){
                    ?> 
                    <h3 class="bien">Fecha modificada correctamente!</h3>
                      <?php
                }
            }
     header("Location:lista.php");
     exit();       
    }
}else{  //Si no se ha modificado el nombre, las instrucciones no cambian

    if(!empty($raza)){
        $ejecutar2=mysqli_query($conectar,$razasql);
        if($ejecutar2){
        ?> 
        <h3 class="bien">¡Raza modificada correctamente!</h3>
            <?php
        }
    }

    if(!empty($peso)){
        $ejecutar3=mysqli_query($conectar,$pesosql);
        if($ejecutar3){
            ?> 
            <h3 class="bien">Peso modificado correctamente!</h3>
            <?php
        }
    }
    if(!empty($fecha)){
        $ejecutar4=mysqli_query($conectar,$fechasql);
            if($ejecutar4){
                ?> 
                <h3 class="bien">Fecha modificada correctamente!</h3>
                <?php
            }

        }
}
?>