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
$sql="SELECT Contrasena FROM Usuario WHERE (Nombre='$nombre')"; //Consigue la contraseña del usuario
//ejecutamos la sentencia de sql
$ejecutar=mysqli_query($conectar,$sql);
//verificamos la ejecucion
$cont=mysqli_fetch_array($ejecutar);
if(strcmp($cont[0],$contrasena) === 0){
echo "Te has logeado correctamente";
}else{
echo "Contraseña incorrecta";

}
?>
