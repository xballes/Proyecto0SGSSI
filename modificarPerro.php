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

$sql1="UPDATE Perro SET NombrePerro='$nombre'WHERE (NombrePerro='$NombrePerro' AND PaisOrigen='$paisO' AND FechaNacimiento='$fechaN')";
$sql2="UPDATE Perro SET PaisOrigen='$paisform' WHERE (NombrePerro='$NombrePerro' AND PaisOrigen='$paisO' AND FechaNacimiento='$fechaN')";
$sql3="UPDATE Perro SET FechaNacimiento='$fecha'WHERE (NombrePerro='$NombrePerro' AND PaisOrigen='$paisO' AND FechaNacimiento='$fechaN')";
$sql4="UPDATE Perro SET Peso='$peso'WHERE (NombrePerro='$NombrePerro' AND PaisOrigen='$paisO' AND FechaNacimiento='$fechaN')";
$sql5="UPDATE Perro SET Raza='$raza'WHERE (NombrePerro='$NombrePerro' AND PaisOrigen='$paisO' AND FechaNacimiento='$fechaN')";

    if(!empty($nombre)){
        $ejecutar1=mysqli_query($conectar,$sql1);
            if($ejecutar1){
                $NombrePerro=$nombre;
                $sql2="UPDATE Perro SET PaisOrigen='$paisform' WHERE (NombrePerro='$nombre' AND PaisOrigen='$paisO' AND FechaNacimiento='$fechaN')";
                $sql3="UPDATE Perro SET FechaNacimiento='$fecha'WHERE (NombrePerro='$nombre' AND PaisOrigen='$paisO' AND FechaNacimiento='$fechaN')";
                $sql4="UPDATE Perro SET Peso='$peso'WHERE (NombrePerro='$nombre' AND PaisOrigen='$paisO' AND FechaNacimiento='$fechaN')";
                $sql5="UPDATE Perro SET Raza='$raza'WHERE (NombrePerro='$nombre' AND PaisOrigen='$paisO' AND FechaNacimiento='$fechaN')";  
                ?> 
                    <h3 class="bien">Nombre modificado correctamente!</h3>
                <?php
             }

            }
             if(!empty($paisform)){
                $ejecutar2=mysqli_query($conectar,$sql2);
                    if($ejecutar2){
                        $paisO=$paisform;
                        $sql1="UPDATE Perro SET NombrePerro='$nombre'WHERE (NombrePerro='$NombrePerro' AND PaisOrigen='$paisform' AND FechaNacimiento='$fechaN')";
                        $sql3="UPDATE Perro SET FechaNacimiento='$fecha'WHERE (NombrePerro='$NombrePerro' AND PaisOrigen='$paisform' AND FechaNacimiento='$fechaN')";
                        $sql4="UPDATE Perro SET Peso='$peso'WHERE (NombrePerro='$NombrePerro' AND PaisOrigen='$paisform' AND FechaNacimiento='$fechaN')";
                        $sql5="UPDATE Perro SET Raza='$raza'WHERE (NombrePerro='$NombrePerro' AND PaisOrigen='$paisform' AND FechaNacimiento='$fechaN')";                        
                        ?> 
                            <h3 class="bien">Pais de Origen modificados correctamente!</h3>
                        <?php
                        
                     }
                }
                if(!empty($fecha)){
                    $ejecutar3=mysqli_query($conectar,$sql3);
                        if($ejecutar3){
                            $fechaN=$fecha;
                            $sql1="UPDATE Perro SET NombrePerro='$nombre'WHERE (NombrePerro='$NombrePerro' AND PaisOrigen='$paisO' AND FechaNacimiento='$fecha')";
                            $sql2="UPDATE Perro SET PaisOrigen='$paisform' WHERE (NombrePerro='$NombrePerro' AND PaisOrigen='$paisO' AND FechaNacimiento='$fecha')";
                            $sql3="UPDATE Perro SET FechaNacimiento='$fecha'WHERE (NombrePerro='$NombrePerro' AND PaisOrigen='$paisO' AND FechaNacimiento='$fecha')";
                            $sql4="UPDATE Perro SET Peso='$peso'WHERE (NombrePerro='$NombrePerro' AND PaisOrigen='$paisO' AND FechaNacimiento='$fecha')";
                            $sql5="UPDATE Perro SET Raza='$raza'WHERE (NombrePerro='$NombrePerro' AND PaisOrigen='$paisO' AND FechaNacimiento='$fecha')";
                            ?> 
                                <h3 class="bien">Fecha de Nacimiento modificados correctamente!</h3>
                            <?php
                                
                         }
                    }        
                
        if(!empty($peso)){
            $ejecutar4=mysqli_query($conectar,$sql4);
            if($ejecutar4){
                ?> 
                    <h3 class="bien">Peso modificado correctamente!</h3>
                <?php
             }

        }

        if(!empty($raza)){
            $ejecutar5=mysqli_query($conectar,$sql5);
            if($ejecutar5){
                ?> 
                    <h3 class="bien">Raza modificada correctamente!</h3>
                <?php
             }

        }

?>