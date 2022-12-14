<?php
header('X-Frame-Options:SAMEORIGIN'); //click-jacking prevention
header('X-Content-Type-Options: nosniff');
//header("Content-Security-Policy: default-src 'self'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página principal</title>
    <link rel="stylesheet" href="main.css">
   
</head>
<body>
    <div>
        <nav>
            <ul>
            <a href="index.php">INICIO</a> 
            <a href="galeria.html">GALERÍA</a>
            <a href="registroform.php">REGISTRARSE/INICIAR</a>
            <img src="transparente.png" class =logo>
            <div class="animation start-home"></div>
        </ul>
        </nav>
    </div>

    <div class="contenedor">

        <h1 class="titulo">
            Refugio Perruno 
        </h1>
        
        <img src="./imagenes/refugio.jpg" alt="">
        <h1 class="subtitulo"> Descripción:</h1>
        <p>Somos una asociación sin ánimo de lucro fundada en 2014 con la finalidad primordial de la defensa y protección de los animales mediante la recogida de perros abandonados, promover su defensa mediante campañas de concienciación, divulgación, y la gestión de nuestro refugio.</p>
        
        <h1 class= "horario">
            Nuestro horario es &#x231A :
        </h1>
        <p>Lunes-Viernes 9:00-19:00</p>
        <p>Sábado 9:00-14:00</p>
        <br>

        <h1 class="localizacion">
            ¿Dónde estamos?📍
        </h1>
        <p>Berreaga Kalea,referencia: Entrada a Derio por la salida 10 de la autovía Bilbao-Mungia, 48160, Derio, Bizkaia</p>

        <h1 class= "contacto">
            Contacto con el refugio &#128021
        </h1>
        <p>Teléfono: 865 658 321</p>
        <p>Email: refugio@gmail.com</p>

        <h1 class= "donacion">
            Si desea ayudar €
        </h1>
        <p>Bizum: teléfono de contacto</p>

        <h1 class= "extra">
            Además...
        </h1>
        <p>Aceptamos visitas de centros educativos y también ofrecemos charlas para dar más visualización a nuestra causa. Si necesita más información pulse en el botón de contacto.</p>
    </div>


   <div class=" botones">

    <p>¿Qué deseas hacer?</p>
    <input class="boton"type="button" value="Ver animales" name="ver.animales" onclick="location='listageneral.php'">
    <input class="boton" type="button" value="Añadir perro" name="añiadirperro" onclick="location.href='iniciosesion.php'">
    <input class="boton" type="button" value="Modificar datos de usuario" name="moddatos" onclick="location.href='iniciosesion.php'">
   </div>
    
</body>
</html>