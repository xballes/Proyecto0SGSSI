<?php
header('X-Frame-Options:SAMEORIGIN'); //click-jacking prevention
//header("Content-Security-Policy: default-src 'self'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formularios.css">
  <title>Contacto</title>
</head>
<body>
  <form action="logear.php" class="formulario" method="POST">
    <h4>Contáctanos!</h4>
    <p>Nombre:</p>
    <input class="caja" type="text" name="nombrecontacto" placeholder="Escribe tu nombre"required><br>
    
    <p>Email:</p>
    <input class="caja" type="text" name ="emailcontacto" placeholder="Escribe tu email" required><br>

    <p>Teléfono:</p>
    <input class="caja" type="text" name ="telefonocontacto" placeholder="Escribe tu teléfono" required><br>

    <p>Asunto:</p>
    <input class="caja" type="text" name ="asuntocontacto" placeholder="Escribe un asunto"required><br>

    <p>Mensaje:</p>
    <input class="caja" type="text" name ="mensajecontacto" placeholder="Deja aqui tu comentario..."required><br>

    <input class="botones" type="submit" value="Enviar" name="iniciar">
    <input class="botones"type="reset" value="Borrar datos" name="borrar">
    <input class="botones" type="button" value="Volver página principal" name="volver" onclick="location.href='index.php'">
  </section>

</body>
</html>