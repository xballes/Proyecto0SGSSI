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
    $new_ip=getRealIP();
    $logFile = fopen("erroresnuevo.log", 'a+b');
    fwrite($logFile, "\n".date("d/m/Y H:i:s")."   ".$mensaje."  "."La ip del login es: "."".$new_ip); 
    fclose($logFile);
    if($log=$conectar->prepare("INSERT INTO Log VALUES(?,?)")){
        $log->bind_param('ss',htmlspecialchars(mysqli_real_escape_string($conectar,$mensaje)),htmlspecialchars(mysqli_real_escape_string($conectar,$new_ip)));
        $log->execute();
        $log->close();
    }
}


?>