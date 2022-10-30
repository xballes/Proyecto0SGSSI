<?php
function logear_error(String $mensaje){
    $ruta='*/docker-lamp/Proyecto0SGSSI/';
    //include_path='/home/xabi/docker-lamp/Proyecto0SGSSI';
    set_include_path($ruta);
    $logFile = fopen("./errores.log", 'a');
    fwrite($logFile, "\n".date("d/m/Y H:i:s")."   ".$mensaje); 
    fclose($logFile);
}
?>