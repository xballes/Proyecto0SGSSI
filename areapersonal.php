<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
  <title>Area Personal</title>
</head>
<body>
  <h2> Bienvenido <?php echo $_SESSION['Usuario']?> !</h2>


</body>
</html>