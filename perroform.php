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
$nombrePerro=$_POST['nombrePerro'];
$raza=$_POST['razaPerro'];
$peso=$_POST['pesoPerro'];
$fechanacimiento=$_POST['fechaPerro'];
$paisorigen=$_POST['paisorigen'];
$sesionactual=$_SESSION['Usuario'];
//$dniactual=$_SESSION['DNI'];


$registrar="INSERT INTO Perro VALUES('$nombrePerro','$raza','$peso','$fechanacimiento','$paisorigen')";
$registro=mysqli_query($conectar,$registrar);

if(isset($nombrePerro,$raza,$peso,$fechanacimiento)){
  if(!$registro){
      ?>      
          <h3 class="bad">¡Ha ocurrido un error en el registro,vuelve a introducir los datos!</h3>
            <?php
              
  }else{
      ?> 
      <h3 class="ok">¡Perro registrado correctamente!</h3>
    <?php
      header("Location:lista.php");
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
  <title>Formulario de Registro</title>
</head>
<body>
 
  <form class="formulario" action="perroform.php" method="POST" onsubmit="return registrarPerro();">
    <h4>Registrar perro</h4>
    <p>Nombre:</p>
    <input class="caja" type="text" name="nombrePerro" id ='nombreRegistro' placeholder="p. ej Rocky" required>
   
    <p>Raza:</p>
    <input class="caja"type="text" name="razaPerro" id ='razaRegistro' placeholder="p. ej Bulldog" required>

    <p>Peso:</p>
    <input class="caja" type="text" name ="pesoPerro" id ='pesoRegistro' placeholder="p. ej 40" required>

    <p>Fecha de nacimiento:</p>
    <input class="caja" type="text" name ="fechaPerro" id ='fechaRegistro' placeholder="p. ej 2000-10-10" required>

    <input class="botones"type="submit" value="Registrar perro" name="registrar.perro">
    <input class="botones"type="reset" value="Borrar datos" name="borrar">
    <input class="botones" type="button" value="Volver pagina principal" name="volver" onclick="location.href='index.html'">
    
</form>
</body>
</html>
