<?php
$NombrePerro=$_GET['NombrePerro'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formularios.css">
  <title>Formulario de Registro</title>
</head>
<body>
  <script src="./script.js"></script>
  <form class="formulario" action="modificacionPerruna.php?NombrePerro=<?=$NombrePerro?>"method="POST">
    <h4>Modificar datos de:</h4>
    <h4> <?php echo $NombrePerro;?></h4>
    <input type="hidden" name="NombrePerro" value="<?= $NombrePerro?>">
    <p>Nombre:</p>
    <input class="caja" type="text" name="nombrePerro" id ='nombrePerro' placeholder="p. ej Rocky">
   
    <p>Raza:</p>
    <input class="caja"type="text" name="razaPerro" id ='razaPerro' placeholder="p. ej Bulldog">

    <p>Peso:</p>
    <input class="caja" type="text" name ="pesoPerro" id ='pesoPerro' placeholder="p. ej 40" >

    <p>Fecha de nacimiento:</p>
    <input class="caja" type="text" name ="fechanacimiento" id ='fechanacimiento' placeholder="p. ej 2000-10-10">

    <input class="botones"type="submit" value="Modificar datos" name="registrar.perro" onclick="comprobarCamposPerro();">
    <input class="botones"type="reset" value="Borrar datos" name="borrar">
    
</form>
</body>
</html>
