<?php
function logear_error(String $mensaje){
    echo getcwd();
    $logFile = fopen("./log.txt", 'a');
    fwrite($logFile, "\n".date("d/m/Y H:i:s").$mensaje); 
    fclose($logFile);
}
?>