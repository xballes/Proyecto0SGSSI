<?php
header('X-Frame-Options:SAMEORIGIN'); //click-jacking prevention
header("Content-Security-Policy: default-src 'self'");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería</title>
    <link rel="stylesheet" href="galeria.css">
</head>
<body>
    
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400&display=swap" rel="stylesheet">

	<div>
        <nav>
            <a href="index.php">INICIO</a>
            <a href="galeria.php">GALERÍA</a>
            <a href="contacto.php">CONTACTO</a>
			<a href="registroform.php">REGISTRARSE/INICIAR</a>
			<img src="transparente.png"class="logo">
            <div class="animation start-home"></div>
            
        </nav>
    </div>

<div class="container">
	<div class="gallery">
		<img src="./imagenes/pastor.jpg" alt="Pastor Vasco">
			<div class="desc">Gorita es un pastor vasco</div>
	</div>	
	<div class="gallery">
		<img src="./imagenes/labrador.jpg" alt="Labrador">
			<div class="desc">Rocky es un perro labrador</div>
	</div>	
	
	<div class="gallery">
		<img src="./imagenes/pug.jpg" alt="Pug">
			<div class="desc">Buddy es un Pug</div>
	</div>	
	
	<div class="gallery">
		<img src="./imagenes/maltes.jpg" alt="Bichón Maltés">
			<div class="desc">Otto es un bichón maltés</div>
	</div>	
	
	<div class="gallery">
		<img src="./imagenes/dogo.jpg" alt="Dogo Argentino">
			<div class="desc">Brutus es un dogo argentino</div>
	</div>
	
	<div class="gallery">
		<img src="./imagenes/akita.jpg" alt="Akita Inu">
			<div class="desc">Dobby es un Akita Inu</div>
	</div>
</div>   

<footer>
    Todos los derechos están reservados a Refugio Perruno
</footer>
</body>
</html>