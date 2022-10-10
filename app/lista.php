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
    <link rel="stylesheet" href="formularios.css">
    <title>Lista de Perros Registrados</title>
</head>
<script>
    function confirmacion(){
        var respuesta=confirm("¿Desea eliminar el registro seleccionado?");
        if(respuesta==true){
            return true;
        }else{
            return false;
        }
    }
</script>
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
                    <th>PaisOrigen</th>
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
                        <th><a href="modificarPerro.php?NombrePerro=<?=$fila['NombrePerro']?>&FechaNacimiento=<?=$fila['FechaNacimiento']?>&PaisOrigen=<?=$fila['PaisOrigen']?>" class="editar">Editar</a></th>
                        <th><a href="eliminarPerro.php?NombrePerro=<?=$fila['NombrePerro'] ?>&FechaNacimiento=<?=$fila['FechaNacimiento']?>&PaisOrigen=<?=$fila['PaisOrigen']?>" class="eliminar" onclick='return confirmacion()' >Eliminar</a></th>
                    </tr>
                <?php endwhile; ?>
            </tbody>
           
        </table>
        
    </div>
    <input class="botones" type="button" value="Volver pagina principal" name="volver" onclick="location.href='index.html'">
</body>


</html>
