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
$conectar=@mysqli_connect("db","lK9pF81rtVq1","o80dGpAMjKb2","database");
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

$sql1="UPDATE Perro SET NombrePerro=?WHERE (NombrePerro=? AND PaisOrigen=? AND FechaNacimiento=?)"; //NOMBRE
$sql2="UPDATE Perro SET PaisOrigen=? WHERE (NombrePerro=? AND PaisOrigen=? AND FechaNacimiento=?)"; // PAIS ORIGEN
$sql3="UPDATE Perro SET FechaNacimiento=? WHERE (NombrePerro=? AND PaisOrigen=? AND FechaNacimiento=?)"; // FECHA NACIMIENTO
$sql4="UPDATE Perro SET Peso=? WHERE (NombrePerro=? AND PaisOrigen=? AND FechaNacimiento=?)"; //PESO
$sql5="UPDATE Perro SET Raza=? WHERE WHERE (NombrePerro=? AND PaisOrigen=? AND FechaNacimiento=?)"; //RAZA

    if(!empty($nombre)){
        if($ejecutar1=$conectar->prepare("UPDATE Perro SET NombrePerro=? WHERE (NombrePerro=? AND PaisOrigen=? AND FechaNacimiento=?)")){
            $ejecutar1->bind_param('ssss',$nombre,$NombrePerro,$paisO,$fechaN);
            $ejecutar1->execute();
            $ejecucion1=$ejecutar1->get_result();
            $ejecutar1->close();
        }
            if($ejecucion1){
                ?> 
                    <h3 class="bad">No se ha podido modificar el nombre!</h3>
                <?php
               
             }else{
                $NombrePerro=$nombre;
                /*if($sql2=$conectar->prepare("UPDATE Perro SET PaisOrigen=? WHERE (NombrePerro=? AND PaisOrigen=? AND FechaNacimiento=?)")){
                    $sql2->bind_param('ssss',$paisform,$nombre,$paisO,$fechaN);
                   // $sql2->execute();
                }
                if($sql3=$conectar->prepare("UPDATE Perro SET FechaNacimiento=? WHERE (NombrePerro=? AND PaisOrigen=? AND FechaNacimiento=?)")){
                    $sql3->bind_param('ssss',$fecha,$nombre,$paisO,$fechaN);
                    //$sql3->execute();
                }
                if($sql4=$conectar->prepare("UPDATE Perro SET Peso=? WHERE (NombrePerro=? AND PaisOrigen=? AND FechaNacimiento=?)")){
                    $sql4->bind_param('ssss',$peso,$nombre,$paisO,$fechaN);
                    //$sql4->execute();
                }
                if($sql5=$conectar->prepare("UPDATE Perro SET Raza=? WHERE (NombrePerro=? AND PaisOrigen=? AND FechaNacimiento=?)")){
                    $sql5->bind_param('ssss',$raza,$nombre,$paisO,$fechaN);
                    //$sql5->execute();
                }*/
                ?> 
                    <h3 class="bien">Nombre modificado correctamente!</h3>
                <?php
             }

            }
             if(!empty($paisform)){
                if($ejecutar2=$conectar->prepare("UPDATE Perro SET PaisOrigen=? WHERE (NombrePerro=? AND PaisOrigen=? AND FechaNacimiento=?)")){
                    $ejecutar2->bind_param('ssss',$paisform,$NombrePerro,$paisO,$fechaN);
                    $ejecutar2->execute();
                    $ejecucion2=$ejecutar2->get_result();
                    $ejecutar2->close();
                }
                    if($ejecucion2){
                        ?> 
                        <h3 class="bad">No se ha podido modificar el pais!</h3>
                    <?php

                    }else{
                        $paisO=$paisform;
                        /*if($sql1=$conectar->prepare("UPDATE Perro SET NombrePerro=?WHERE (NombrePerro=? AND PaisOrigen=? AND FechaNacimiento=?)")){
                            $sql1->bind_param('ssss',$nombre,$NombrePerro,$paisform,$fechaN);
                          //  $sql1->execute();
                        }
                        if($sql3=$conectar->prepare("UPDATE Perro SET FechaNacimiento=? WHERE (NombrePerro=? AND PaisOrigen=? AND FechaNacimiento=?)")){
                            $sql3->bind_param('ssss',$fecha,$NombrePerro,$paisform,$fechaN);
                            //$sql3->execute();
                        }
                        if($sql4=$conectar->prepare("UPDATE Perro SET Peso=? WHERE (NombrePerro=? AND PaisOrigen=? AND FechaNacimiento=?)")){
                            $sql4->bind_param('ssss',$peso,$NombrePerro,$paisform,$fechaN);
                          //  $sql4->execute();
                        }
                        if($sql5=$conectar->prepare("UPDATE Perro SET Raza=? WHERE (NombrePerro=? AND PaisOrigen=? AND FechaNacimiento=?)")){
                            $sql5->bind_param('ssss',$raza,$NombrePerro,$paisform,$fechaN);
                         //   $sql5->execute();  
                        }*/
                                                
                        ?> 
                            <h3 class="bien">Pais de Origen modificados correctamente!</h3>
                        <?php
                        
                     }
                }
  
                        
                if(!empty($fecha)){
                    if($ejecutar3=$conectar->prepare("UPDATE Perro SET FechaNacimiento=? WHERE (NombrePerro=? AND PaisOrigen=? AND FechaNacimiento=?)")){
                        $ejecutar3->bind_param('ssss',$fecha,$NombrePerro,$paisO,$fechaN);
                        $ejecutar3->execute();
                        $ejecucion3=$ejecutar3->get_result();
                        $ejecutar3->close();
                    }
                        if($ejecucion3){
                            ?> 
                            <h3 class="bad">No se ha podido modificar la fecha!</h3>
                        <?php
                        }else{
                            $fechaN=$fecha;
                            /*if($sql1=$conectar->prepare("UPDATE Perro SET NombrePerro=?WHERE (NombrePerro=? AND PaisOrigen=? AND FechaNacimiento=?)")){
                                $sql1->bind_param('ssss',$nombre,$NombrePerro,$paisO,$fecha);
                                //$sql1->execute();
                            }
                            if($sql2=$conectar->prepare("UPDATE Perro SET PaisOrigen=? WHERE (NombrePerro=? AND PaisOrigen=? AND FechaNacimiento=?)")){
                                $sql2->bind_param('ssss',$paisform,$NombrePerro,$paisO,$fecha);
                                //$sql2->execute();
                            }
                            if($sql3=$conectar->prepare("UPDATE Perro SET FechaNacimiento=? WHERE (NombrePerro=? AND PaisOrigen=? AND FechaNacimiento=?)")){
                                $sql3->bind_param('ssss',$fecha,$NombrePerro,$paisO,$fecha);
                                //$sql3->execute();
                            }
                            if($sql4=$conectar->prepare("UPDATE Perro SET Peso=? WHERE (NombrePerro=? AND PaisOrigen=? AND FechaNacimiento=?)")){
                                $sql4->bind_param('ssss',$peso,$NombrePerro,$paisO,$fecha);
                                //$sql4->execute();
                            }
                            if($sql5=$conectar->prepare("UPDATE Perro SET Raza=? WHERE (NombrePerro=? AND PaisOrigen=? AND FechaNacimiento=?)")){
                                $sql5->bind_param('ssss',$raza,$NombrePerro,$paisO,$fecha);
                               // $sql5->execute();
                            }*/
                            ?> 
                                <h3 class="bien">Fecha de Nacimiento modificados correctamente!</h3>
                            <?php
                        }
                           
                                
             }       
                
        if(!empty($peso)){
           $sql4=$conectar->prepare("UPDATE Perro SET Peso=? WHERE (NombrePerro=? AND PaisOrigen=? AND FechaNacimiento=?)");
           $sql4->bind_param('ssss',$peso,$NombrePerro,$paisO,$fechaN);
           $sql4->execute();
           $ejecucion4=$sql4->get_result();
           $sql4->close();
            if($ejecucion4){
                ?> 
                <h3 class="bad">No se ha podido modificar el peso!</h3>
            <?php
                
             }else{
                ?> 
                    <h3 class="bien">Peso modificado correctamente!</h3>
                <?php
             }

        }

        if(!empty($raza)){
           $sql5=$conectar->prepare("UPDATE Perro SET Raza=? WHERE (NombrePerro=? AND PaisOrigen=? AND FechaNacimiento=?)");
           $sql5->bind_param('ssss',$raza,$NombrePerro,$paisO,$fechaN);
           $sql5->execute();
           $ejecucion5=$sql5->get_result();
           $sql5->close();
            if($ejecucion5){
                ?> 
                <h3 class="bad">No se ha podido modificar la raza!</h3>
            <?php
                
             }else{
                ?> 
                    <h3 class="bien">Raza modificada correctamente!</h3>
                <?php
             }

        }


?>