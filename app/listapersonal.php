<?php //https://www.youtube.com/watch?v=sYaEoNy5OGs
header('X-Frame-Options:SAMEORIGIN'); //click-jacking prevention
//header("Content-Security-Policy: default-src 'self'");
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
if($listaperros=$conectar->prepare("SELECT * FROM Perro WHERE DNIDueño=?")){
    $listaperros->bind_param('s',$dni);
    $listaperros->execute();
    $lista=$listaperros->get_result();
    //$listaperros->close();
}
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
        <h2>Perros registrados con el DNI: <?php echo $dni ?> </h2>
        <table>
            <thead>
                <tr>
                    <th>NombrePerro</th>
                    <th>Raza</th>
                    <th>Peso</th>
                    <th>FechaNacimiento</th>
                    <th>PaísOrigen</th>
                    <th>DNIDueño</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    while ($fila = mysqli_fetch_array($lista)): ?>
                    <tr>
                        <th><?=$fila['NombrePerro'] ?></th>
                        <th><?=$fila['Raza'] ?></th>
                        <th><?=$fila['Peso'] ?></th>
                        <th><?=$fila['FechaNacimiento'] ?></th>
                        <th><?=$fila['PaisOrigen'] ?></th>
                        <th><?=$fila['DNIDueño']?></th>
                        <th><a href="modificarPerro.php?NombrePerro=<?=$fila['NombrePerro']?>&FechaNacimiento=<?=$fila['FechaNacimiento']?>&PaisOrigen=<?=$fila['PaisOrigen']?>&DNIDueño=<?=$fila['DNIDueño']?>" class="editar">Editar</a></th>
                        <th><a href="eliminarPerro.php?NombrePerro=<?=$fila['NombrePerro'] ?>&FechaNacimiento=<?=$fila['FechaNacimiento']?>&PaisOrigen=<?=$fila['PaisOrigen']?>&DNIDueño=<?=$fila['DNIDueño']?>" class="eliminar" onclick='return confirmacion()' >Eliminar</a></th>
                    </tr>
                        
                <?php endwhile; ?>
                    
            </tbody>
           
        </table>
        
    </div>
    <input class="botones" type="button" value="Volver area personal" name="volver.area" onclick="location.href='areapersonal.php'">
    <input class="botones" type="button" value="Volver pagina principal" name="volver.index" onclick="location.href='index.html'">
</body>


</html>
