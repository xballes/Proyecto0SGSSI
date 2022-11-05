<?php
ob_start();
session_start();
include 'logear.php';
$conectar=@mysqli_connect("db","lK9pF81rtVq1","o80dGpAMjKb2","database");
//verificamos la conexion
if(!$conectar){
    echo"No Se Pudo Conectar Con El Servidor";
    logear_error("No se ha podido conectar con el servidor");
    
}else{
    $base=mysqli_select_db($conectar,"database");
        if(!$base){
            logear_error("No se ha encontrado la base de datos,comprueba que esta bien importada");
            echo"No Se Encontro La Base De Datos";
        
        }
}
$nombrePerro=$_POST['nombrePerro'];
$raza=$_POST['razaPerro'];
$peso=$_POST['pesoPerro'];
$fechanacimiento=$_POST['fechaPerro'];
$paisorigen=$_POST['paisorigen'];
$sesionactual=$_SESSION['Usuario'];
$dniactual=$_SESSION['DNI'];

if(isset($nombrePerro,$raza,$peso,$fechanacimiento,$paisorigen)){
  echo $dniactual;
  if($registrar=$conectar->prepare("INSERT INTO Perro VALUES(?,?,?,?,?,?)")){
    $registrar->bind_param('ssisss',htmlspecialchars(mysqli_real_escape_string($conectar,$nombrePerro)),htmlspecialchars(mysqli_real_escape_string($conectar,$raza)),htmlspecialchars(mysqli_real_escape_string($conectar,$peso)),htmlspecialchars(mysqli_real_escape_string($conectar,$fechanacimiento)),htmlspecialchars(mysqli_real_escape_string($conectar,$paisorigen)),htmlspecialchars(mysqli_real_escape_string($conectar,$dniactual)));
    $registrar->execute();
    $registro=$registrar->get_result();
    $registrar->close();
  }
  $conectar->close(); 
  if($registro){
    logear_error("¡Ha ocurrido un error en el registro,vuelve a introducir los datos!");
      ?>      
          <h3 class="bad">¡Ha ocurrido un error en el registro,vuelve a introducir los datos!</h3>
            <?php
              
  }else{
      ?> 
      <h3 class="ok">¡Perro registrado correctamente!</h3>
    <?php
      header("Location:listapersonal.php");
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
    <script src="./registro.js"></script>
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

    <p>Pais de Origen:</p>
    <input class="caja" type="text" name ="paisorigen" id ='paisorigen' placeholder="p. ej Francia" required>

    <input class="botones"type="submit" value="Registrar perro" name="registrar.perro">
    <input class="botones"type="reset" value="Borrar datos" name="borrar">
    <input class="botones" type="button" value="Volver pagina principal" name="volver" onclick="location.href='index.html'">
    
</form>
</body>
</html>
