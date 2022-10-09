<?php
ob_start();
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formularios.css">
  <title>Area Personal</title>
</head>
<body>
<form action="registrar.php" class="formulario" method="POST">
  <h2> Bienvenido <?php echo $_SESSION['Usuario']?> !</h2>
  <h2> Que deseas hacer? </h2>
  <input class="botones" type="button" value="Modificar datos" name="modificar" onclick="location.href='modificarUsuario.php'">

</form>
</body>
</html>
