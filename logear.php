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
	$contrasena=$_POST['contraseña'];
	//hacemos la sentencia de sql
	$contrasenaUsuario="SELECT Contrasena FROM Usuario WHERE (Nombre='$nombre')"; //Consigue la contraseña del usuario
	$usuario="SELECT * FROM Usuario WHERE (Nombre='$nombre')"; //Consigue el nombre (para ver si existe el usuario)
	//ejecutamos la sentencia de sql
	$ejecutar=mysqli_query($conectar,$contrasenaUsuario);
	$nombreUsuario=mysqli_query($conectar,$usuario);
		if(mysqli_num_rows($nombreUsuario)>0){ // es decir, si existe el usuario...
			$cont=mysqli_fetch_array($ejecutar); // consigue su contraseña.
			if(strcmp($cont[0],$contrasena) === 0){ // y la compara con la que ha introducido.
				?>
				<h3 class="ok">¡Te has logeado correctamente!</h3>
				<?php
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
