<?php
shell_exec('sh */docker-lamp/Proyecto0SGSSI/app/permisos.sh');
function getRealIP() {

    if (!empty($_SERVER['HTTP_CLIENT_IP']))
        return $_SERVER['HTTP_CLIENT_IP'];
       
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
   
    return $_SERVER['REMOTE_ADDR'];
}

function logear_error(String $mensaje){
    shell_exec('sh */docker-lamp/Proyecto0SGSSI/app/permisos.sh');
    $ruta='*/docker-lamp/Proyecto0SGSSI/app/';
    $new_ip=getRealIP();
    //include_path='/home/xabi/docker-lamp/Proyecto0SGSSI';
    set_include_path($ruta);
    $logFile = fopen("errores.log", 'a+b');
    fwrite($logFile, "\n".date("d/m/Y H:i:s")."   ".$mensaje."  "."La ip del login es: "."".$new_ip); 
    fclose($logFile);
}

?>