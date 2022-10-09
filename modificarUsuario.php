<?php
ob_start(); // para borrar el output buffer https://stackoverflow.com/questions/12654831/php-headers-already-sent-caused-by-session-start
session_start();
//conectamos Con el servidor
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
//recuperar las variables
$nombre=$_POST['nombreMod'];
$dni=$_POST['dniMod'];
$telefono=$_POST['telefonoMod'];
$fecha=$_POST['fechaMod'];
$email=$_POST['emailMod'];
$contrasena=$_POST['contrasenaMod'];
$actual=$_SESSION['DNI'];
$actualNombre=$_SESSION['Usuario'];


// si el campo esta vacio, no actualizar los datos.
  
    $nombresql="UPDATE Usuario SET Nombre='$nombre' WHERE DNI='$actual' ";
    $dnisql="UPDATE Usuario SET DNI='$dni' WHERE DNI='$actual' ";
    $telefonosql="UPDATE Usuario SET Telefono='$telefono' WHERE DNI='$actual' ";
    $fechasql="UPDATE Usuario SET Fecha='$fecha' WHERE DNI='$actual' ";
    $emailsql="UPDATE Usuario SET Email='$email' WHERE DNI='$actual' ";
    $contrasenasql="UPDATE Usuario SET Contrasena='$contrasena' WHERE DNI='$actual' ";

    $nombresql2="UPDATE Usuario SET Nombre='$nombre' WHERE DNI='$dni' ";
    $telefonosql2="UPDATE Usuario SET Telefono='$telefono' WHERE DNI='$dni' ";
    $fechasql2="UPDATE Usuario SET Fecha='$fecha' WHERE DNI='$dni' ";
    $emailsql2="UPDATE Usuario SET Email='$email' WHERE DNI='$dni' ";
    $contrasenasql2="UPDATE Usuario SET Contrasena='$contrasena' WHERE DNI='$dni' ";

    if(!empty($dni)){ //Si cambia el nombre, las demas instrucciones tienen que updatear con el nombre cambiado. SI NO ha cambiado el nombre,no.
      $ejecutar1=mysqli_query($conectar,$dnisql);
      if($ejecutar1){   
          ?> 
          <h3 class="bien">DNI modificado correctamente!</h3>
            <?php
          if(!empty($nombre)){
              $ejecutar2=mysqli_query($conectar,$nombresql2);
              if($ejecutar2){
              ?> 
              <h3 class="bien">Nombre modificado correctamente!</h3>
                  <?php
              }
          }
          if(!empty($telefono)){
              $ejecutar3=mysqli_query($conectar,$telefonosql2);
              if($ejecutar3){
                  ?> 
                  <h3 class="bien">Telefono modificado correctamente!</h3>
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
              if(!empty($email)){
                $ejecutar5=mysqli_query($conectar,$emailsql2);
                    if($ejecutar5){
                        ?> 
                        <h3 class="bien">Email modificado correctamente!</h3>
                          <?php
                    }
                }
                if(!empty($contrasena)){
                  $ejecutar6=mysqli_query($conectar,$contrasenasql2);
                      if($ejecutar6){
                          ?> 
                          <h3 class="bien">Contrasena modificada correctamente!</h3>
                            <?php
                      }
                  }
        }
      }else{
          if(!empty($nombre)){
            $ejecutar2=mysqli_query($conectar,$nombresql);
            if($ejecutar2){
            ?> 
            <h3 class="bien">Nombre modificado correctamente!</h3>
                <?php
            }
        }
        if(!empty($telefono)){
            $ejecutar3=mysqli_query($conectar,$telefonosql);
            if($ejecutar3){
                ?> 
                <h3 class="bien">Telefono modificado correctamente!</h3>
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
            if(!empty($email)){
              $ejecutar5=mysqli_query($conectar,$emailsql);
                  if($ejecutar5){
                      ?> 
                      <h3 class="bien">Email modificado correctamente!</h3>
                        <?php
                  }
              }
              if(!empty($contrasena)){
                $ejecutar6=mysqli_query($conectar,$contrasenasql);
                    if($ejecutar6){
                        ?> 
                        <h3 class="bien">Contrasena modificada correctamente!</h3>
                          <?php
                    }
                }

        }               
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formularios.css">
    <script src="./script.js"></script>
  <title>Modificacion de datos</title>
</head>
<body>
  
<form class="formulario" action="modificarUsuario.php"method="POST" onsubmit="return modUsuario();">
    <h4>Modificar datos</h4>
    <h4>Rellena los campos que quieres que se modifiquen</h4>
    <p>Nombre:</p>
    <input class="caja" type="text" name="nombreMod" id ='nombreMod' placeholder="p. ej Ander">
  
      
    <p>DNI:</p>
    <input class="caja"type="text" name="dniMod" id ='dniMod' placeholder="p. ej XXXXXXXX-A">
  

    <p>Telefono:</p>
    <input class="caja" type="text" name ="telefonoMod" id ='telefonoMod' placeholder="p. ej 123456789">


    <p>Fecha de nacimiento:</p>
    <input class="caja" type="text" name ="fechaMod" id ='fechaMod' placeholder="p. ej 2000-10-10">
  

    <p>Email:</p>
    <input class="caja" type="text" name ="emailMod" id='emailMod' placeholder="p. ej xxxxxxx@gmail.com" ><br>
 
<p>Contrasena:</p>
    <input class="caja" type="password" name ="contrasenaMod" id='contrasenaMod'><br>
  
    <input class="botones"type="submit" value="Modificar datos" name="modificarDatos">
    <input class="botones"type="reset" value="Borrar datos" name="borrar">
</form>
</body>
</html>
