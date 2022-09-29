<?php
	ob_start();// para borrar el output buffer https://stackoverflow.com/questions/12654831/php-headers-already-sent-caused-by-session-start
	session_start();
	//conectamos Con el servidor
	$conectar=@mysqli_connect("db","admin","test","database");
	//verificamos la conexion
	if(!$conectar){
		echo"No Se Pudo Conectar Con El Servidor";
	}else{
		$base=mysqli_select_db($conectar,"database");
		if(!$base){
			echo"No Se Encontro La Base De Datos";			
		}
	}
	//----------------------------------------------------------------------------------------------------------------------------------------
	//recuperar las variables
	$nombre=$_POST['nombre'];
	$dni=$_POST['dni'];
	$contrasena=$_POST['contrasena'];
	//----------------------------------------------------------------------------------------------------------------------------------------
	$contrasenaUsuario="SELECT Contrasena FROM Usuario WHERE (DNI='$dni')"; //Consigue la contraseña del usuario
	$usuario="SELECT * FROM Usuario WHERE (DNI='$dni')"; //Consigue el nombre (para ver si existe el usuario)
	$nombreUsuario="SELECT Nombre FROM Usuario WHERE (DNI='$dni')"; //Consigue la contraseña del usuario
	//----------------------------------------------------------------------------------------------------------------------------------------
	$ejecutar=mysqli_query($conectar,$contrasenaUsuario); // ejecutar instruccion para conseguir la contraseña
	$existeUsuario=mysqli_query($conectar,$usuario);      // ejecutar instruccion para saber si existe el usuario
	$nombreSesion=mysqli_query($conectar,$nombreUsuario); // ejecutar instruccion para conseguir nombre del usuario asociado al dni introducido
		if(mysqli_num_rows($existeUsuario)>0){ // es decir, si existe el usuario...
			$cont=mysqli_fetch_array($ejecutar); // consigue su contraseña.
			if(strcmp($cont[0],$contrasena) === 0){ // y la compara con la que ha introducido.
				?>
				<?php
				/*SESION*/
				$sesion=mysqli_fetch_array($nombreSesion);
				$_SESSION['Usuario']=$sesion[0];
				$_SESSION['DNI']=$dni;//mysqli_fetch_array($nombreSesion);
				header("Location:areapersonal.php");
			}else{
				?>
				<h3 class="bad">¡Ups ha ocurrido un error!</h3>
			<?php 
			}
		}else{
			   ?>
				<h3 class="bad">¡El usuario no existe!</h3>	
				<?php 
		}		
?>
