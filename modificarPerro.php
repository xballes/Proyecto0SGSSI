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
  
  <form class="formulario" action="modificarPerro.php?NombrePerro=<?=$fila['NombrePerro']?>&PaisOrigen=<?=$fila['PaisOrigen']?>&FechaNacimiento=<?=$fila['FechaNacimiento']?>"method="POST" onsubmit="return comprobarCamposPerro();">
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

    <p>Pais de origen:</p>
    <input class="caja" type="text" name ="paisorigen" id ='paisorigen' placeholder="p. ej Francia">

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
$fecha=$_GET["FechaNacimiento"];
$pais=$_GET["PaisOrigen"];

$nombre=$_POST['nombrePerro'];
$raza = $_POST['razaPerro'];
$peso = $_POST['pesoPerro'];
$fecha = $_POST['fechaPerro'];
$paisform=$_POST['paisorigen'];


$NombrePerrosql="UPDATE Perro SET NombrePerro='$nombre' WHERE (NombrePerro='$NombrePerro' AND PaisOrigen='$pais' AND FechaNacimiento='$fecha')";

$razasql="UPDATE Perro SET Raza='$raza' WHERE (NombrePerro='$NombrePerro'AND PaisOrigen='$pais' AND FechaNacimiento='$fecha')";
$pesosql="UPDATE Perro SET Peso='$peso' WHERE (NombrePerro='$NombrePerro'AND PaisOrigen='$pais' AND FechaNacimiento='$fecha')";
$fechasql="UPDATE Perro SET FechaNacimiento='$fecha' WHERE (NombrePerro='$NombrePerro'AND PaisOrigen='$pais' AND FechaNacimiento='$fecha')";
$paissql="UPDATE Perro SET PaisOrigen='$paisform' WHERE (NombrePerro='$NombrePerro'AND PaisOrigen='$pais' AND FechaNacimiento='$fecha')";

$razasql2="UPDATE Perro SET Raza='$raza' WHERE (NombrePerro='$nombre' AND PaisOrigen='$pais' AND FechaNacimiento='$fecha')";
$pesosql2="UPDATE Perro SET Peso='$peso' WHERE (NombrePerro='$nombre'AND  PaisOrigen='$pais' AND FechaNacimiento='$fecha')";
$fechasql2="UPDATE Perro SET FechaNacimiento='$fecha' WHERE (NombrePerro='$nombre'AND PaisOrigen='$pais' AND FechaNacimiento='$fecha')";
$paissql2="UPDATE Perro SET PaisOrigen='$paisform' WHERE (NombrePerro='$nombre'AND PaisOrigen='$pais' AND FechaNacimiento='$fecha')";

    if(isset($nombre)){ //Si cambia el nombre, las demas instrucciones tienen que updatear con el nombre cambiado. SI NO ha cambiado el nombre,no.
        $ejecutar1=mysqli_query($conectar,$NombrePerrosql);
            if($ejecutar1){
                    ?> 
                    <h3 class="bien">¡Nombre del perro modificado correctamente!</h3>
                      <?php 
                    header("Location:lista.php");
                    exit();

            }
        }
               
        if(isset($raza)){ //Si cambia el nombre, las demas instrucciones tienen que updatear con el nombre cambiado. SI NO ha cambiado el nombre,no.
            $ejecutar2=mysqli_query($conectar,$razasql);
                if($ejecutar2){
                        ?> 
                        <h3 class="bien">Raza del perro modificado correctamente!</h3>
                          <?php 
                        header("Location:lista.php");
                        exit();
    
                }
            }

            if(isset($peso)){ //Si cambia el nombre, las demas instrucciones tienen que updatear con el nombre cambiado. SI NO ha cambiado el nombre,no.
                $ejecutar3=mysqli_query($conectar,$pesosql);
                    if($ejecutar3){
                            ?> 
                            <h3 class="bien">Peso del perro modificado correctamente!</h3>
                              <?php 
                            header("Location:lista.php");
                            exit();
        
                    }
                }

                if(isset($fecha)){ //Si cambia el nombre, las demas instrucciones tienen que updatear con el nombre cambiado. SI NO ha cambiado el nombre,no.
                    $ejecutar4=mysqli_query($conectar,$razasql);
                        if($ejecutar1){
                                ?> 
                                <h3 class="bien">¡Nombre del perro modificado correctamente!</h3>
                                  <?php 
                                header("Location:lista.php");
                                exit();
            
                        }
                    }

                    if(isset($pais)){ //Si cambia el nombre, las demas instrucciones tienen que updatear con el nombre cambiado. SI NO ha cambiado el nombre,no.
                        $ejecutar5=mysqli_query($conectar,$paissql);
                            if($ejecutar1){
                                    ?> 
                                    <h3 class="bien">Pais del perro modificado correctamente!</h3>
                                      <?php 
                                    header("Location:lista.php");
                                    exit();
                
                            }
                        }
                    
                    




?>