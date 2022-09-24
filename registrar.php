<?php
	//conectamos Con el servidor
	$conectar=@mysqli_connect("localhost","root",'');
	//verificamos la conexion
	if(!$conectar){
		echo"No Se Pudo Conectar Con El Servidor";
	}else{
		$base=mysqli_select_db($conectar,"usuarios");
		if(!$base){
			echo"No Se Encontro La Base De Datos";			
		}
	}
	//recuperar las variables
	$nombre=$_POST['nombre'];
	$dni=$_POST['dni'];
	$telefono=$_POST['telefono'];
	$fecha=$_POST['fecha'];
	$email=$_POST['email'];
	//hacemos la sentencia de sql
	$sql="INSERT INTO Usuario (Nombre,DNI,Telefono,Fecha,Email) VALUES('$nombre','$dni','$telefono','$fecha','$email')";
	//ejecutamos la sentencia de sql
	$ejecutar=mysqli_query($conectar,$sql);
	//verificamos la ejecucion
	if(!$ejecutar){
		echo"Hubo Algun Error";
	}else{
		echo"Datos Guardados Correctamente";
	}
?>

