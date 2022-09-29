<?php //https://www.youtube.com/watch?v=sYaEoNy5OGs
ob_start();
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
$sesionactual=$_SESSION['Usuario'];
$dniactual="SELECT DNI from Usuario where Nombre='$sesionactual'";

$sql=mysqli_query($conectar,$dniactual);
$dni=mysqli_fetch_array($sql)[0];

$listaperros="SELECT * FROM Perro where DNIDueño='$dni' ";
$lista=mysqli_query($conectar,$listaperros);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="formularios.css">
    <title>Lista de Perros Registrados</title>
</head>

<body>
    <div class="perros">
        <h2>Perros registrados</h2>
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Raza</th>
                    <th>Peso</th>
                    <th>Fecha De Nacimiento</th>
                    <th>DNI Dueño</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($fila = mysqli_fetch_array($lista)): ?>
                    <tr>
                        <th><?= $fila['Nombre'] ?></th>
                        <th><?= $fila['Raza'] ?></th>
                        <th><?= $fila['Peso'] ?></th>
                        <th><?= $fila['FechaNacimiento'] ?></th>
                        <th><?= $fila['DNIDueño'] ?></th>
                        <th><a href="update.php?id=<?= $fila['id'] ?>" class="editar">Editar</a></th>
                        <th><a href="delete_user.php?id=<?= $fila['id'] ?>" class="eliminar" >Eliminar</a></th>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

</body>

</html>