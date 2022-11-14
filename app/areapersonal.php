<?php
header('X-Frame-Options:SAMEORIGIN'); //click-jacking prevention
//header("Content-Security-Policy: default-src 'self'");
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

$dni=$_SESSION['DNI'];
    if($datosusuario=$conectar->prepare("SELECT * FROM Usuario WHERE(DNI=?)")){
        $datosusuario->bind_param('s',$dni);
        $datosusuario->execute();
        $lista=$datosusuario->get_result();
        $datosusuario->close();
        $conectar->close();
    }
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
  <h2> ¡Bienvenido a tu area personal!</h2>
  <h2> ¿Qué deseas hacer? </h2>
  <input class="botones" type="button" value="Modificar datos" name="modificar" onclick="location.href='modificarUsuario.php'">
  <input class="botones"type="button" value="Mostrar lista de animales" name="ver.animales" onclick="location='listapersonal.php'">
  <input class="botones"type="button" value="Añadir perro" name="añadir.perro" onclick="location='perroform.php'">
  <input class="botones" type="button" value="Volver página principal" name="volver" onclick="location.href='index.html'">
</form>
<div class="lista">
        <h2>Tus datos</h2>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>DNI</th>
                    <th>Teléfono</th>
                    <th>FechaNacimiento</th>
                    <th>Email</th>
                    <th>Contraseña</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = mysqli_fetch_array($lista)): ?>
                    <tr>
                        <th><?= $fila['Nombre'] ?></th>
                        <th><?= $fila['DNI'] ?></th>
                        <th><?= $fila['Telefono'] ?></th>
                        <th><?= $fila['Fecha'] ?></th>
                        <th><?= $fila['Email'] ?></th>
                        <th><?= $fila['Contrasena'] ?></th>
                        </tr>
                <?php endwhile; ?>
            </tbody>
        </table>    
                </div>   
</body>
</html>
