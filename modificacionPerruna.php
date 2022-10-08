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

$razasql2="UPDATE Perro SET Raza='$raza' WHERE NombrePerro='$nombre' ";
$pesosql2="UPDATE Perro SET Peso='$peso' WHERE NombrePerro='$nombre' ";
$fechasql2="UPDATE Perro SET FechaNacimiento='$fecha' WHERE NombrePerro='$nombre' ";

if(!empty($nombre)){ //Si cambia el nombre, las demas instrucciones tienen que updatear con el nombre cambiado. SI NO ha cambiado el nombre,no.
    $ejecutar1=mysqli_query($conectar,$NombrePerrosql);
    if($ejecutar1){   
        ?> 
        <h3 class="bien">Nombre modificado correctamente!</h3>
          <?php
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
    }

}else{
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