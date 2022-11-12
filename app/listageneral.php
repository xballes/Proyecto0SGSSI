<?php //https://www.youtube.com/watch?v=sYaEoNy5OGs
ob_start();
session_start();
//conectamos Con el servidor
$conectar=@mysqli_connect("db","lK9pF81rtVq1","o80dGpAMjKb2","database");
//verificamos la conexion
if(!$conectar){
    echo"No Se Pudo Conectar Con El Servidor";
}else{
    $base=mysqli_select_db($conectar,"database");
        if(!$base){
            echo"No Se Encontro La Base De Datos";
        }
}
/*$sesionactual=$_SESSION['Usuario'];
$dniactual="SELECT DNI from Usuario where Nombre='$sesionactual'";

$sql=mysqli_query($conectar,$dniactual);
$dni=mysqli_fetch_array($sql)[0];
*/
$dni=$_SESSION['DNI'];
$listaperros="SELECT * FROM Perro";
$lista=mysqli_query($conectar,$listaperros);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="listas.css">
    <title>Lista de Perros Registrados</title>
</head>
<body>
    <div class="listaperros">
        <h2>Perros registrados</h2>
        <table>
            <thead>
                <tr>
                    <th>NombrePerro</th>
                    <th>Raza</th>
                    <th>Peso</th>
                    <th>FechaNacimiento</th>
                    <th>PaísOrigen</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = mysqli_fetch_array($lista)): ?>
                    <tr>
                        <th><?=$fila['NombrePerro'] ?></th>
                        <th><?=$fila['Raza'] ?></th>
                        <th><?=$fila['Peso'] ?></th>
                        <th><?=$fila['FechaNacimiento'] ?></th>
                        <th><?=$fila['PaisOrigen'] ?></th>
                    </tr>
                <?php endwhile; ?>
            </tbody>
           
        </table>
        
    </div>
    <p><a href="iniciosesion.php">Si eres el dueño de uno de estos animales y deseas modificar sus datos o eliminarlo de la base de datos, pulsa aquí</a></p>
    <input class="botones" type="button" value="Volver pagina principal" name="volver" onclick="location.href='index.html'">
</body>


</html>
