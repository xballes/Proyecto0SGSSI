<?php 

include("conexionbd.php");

if (isset($_POST['registrar'])) {
    if (strlen($_POST['nombre']) >= 1 && strlen($_POST['email']) >= 1 && strlen($_POST['telefono']) >= 1 && strlen($_POST['fecha']) >= 1 && strlen($_POST['dni']) >= 1) {
	    $nombre = trim($_POST['name']);
        $dni = trim($_POST['dni']);
	    $telefono = trim($_POST['telefono']);
        $fecha= trim($_POST['fecha']);
        $email = trim($_POST['email']);

	    $consulta = "INSERT INTO datos(nombre,dni,telefono,fecha,email) VALUES ('$nombre','$dni','$telefono','$fecha','$email')";
	    $resultado = mysqli_query($conex,$consulta);
	    if ($resultado) {
	    	?> 
	    	<h3 class="correcto">¡Te has registrado correctamente!</h3>
           <?php
	    } else {
	    	?> 
	    	<h3 class="fallido">¡Ha ocurrido un error!</h3>
           <?php
	    }
    }   else {
	    	?> 
	    	<h3 class="fallido">¡Por favor complete los campos!</h3>
           <?php
    }
}