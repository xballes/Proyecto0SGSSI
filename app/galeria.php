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
		<img src="https://images.hola.com/imagenes/mascotas/20220427208758/razas-de-perro-pastor-vasco-dn/1-80-333/raza-perro-pastor-vasco-t.jpg" alt="Pastor Vasco">
			<div class="desc">Gorita es un pastor vasco</div>
	</div>	
	<div class="gallery">
		<img src="https://blog.mascotaysalud.com/wp-content/uploads/2019/09/LABRADOR-RETRIEVER-TUMBADO.jpg" alt="Labrador">
			<div class="desc">Rocky es un perro labrador</div>
	</div>	
	
	<div class="gallery">
		<img src="https://soyunperro.com/wp-content/uploads/2019/08/perro-pug-en-el-jardin.jpg" alt="Pug">
			<div class="desc">Buddy es un Pug</div>
	</div>	
	
	<div class="gallery">
		<img src="https://www.micachorro.net/wp-content/uploads/2017/12/malt%C3%A9s-1.jpg" alt="Bichón Maltés">
			<div class="desc">Otto es un bichón maltés</div>
	</div>	
	
	<div class="gallery">
		<img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/f9/0Dogo-argentino-22122251920.jpg/245px-0Dogo-argentino-22122251920.jpg" alt="Dogo Argentino">
			<div class="desc">Brutus es un dogo argentino</div>
	</div>
	
	<div class="gallery">
		<img src="https://i.pinimg.com/originals/f1/79/26/f1792628cc7ed570bee4b5c5f857543a.jpg" alt="Akita Inu">
			<div class="desc">Dobby es un Akita Inu</div>
	</div>
</div>   

<footer>
    Todos los derechos están reservados a Refugio Perruno
</footer>
</body>
</html>