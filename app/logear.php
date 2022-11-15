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
    $ruta='*/docker-lamp/Proyecto0SGSSI/';
    $new_ip=getRealIP();
    //include_path='/home/xabi/docker-lamp/Proyecto0SGSSI';
    set_include_path($ruta);
    $logFile = fopen("errores.log", 'a');
    fwrite($logFile, "\n".date("d/m/Y H:i:s")."   ".$mensaje."  "."La ip del login es: "."".$new_ip); 
    fclose($logFile);
}
function encriptar(String $txt){
    $algorithm = MCRYPT_BLOWFISH;
    $key = '$2y$10$63fbeb69642e9b9bb073df0412929bd64570b13e21b0';
    $mode = MCRYPT_MODE_CBC;
    $iv = mcrypt_create_iv(mcrypt_get_iv_size($algorithm, $mode),
                       MCRYPT_DEV_URANDOM);

    $encrypted_data = mcrypt_encrypt($algorithm, $key, $txt, $mode, $iv);
    $txt_encriptado = base64_encode($encrypted_data);
    return $txt_encriptado;
}
function desencriptar(String $txt){
    $algorithm = MCRYPT_BLOWFISH;
    $key = '$2y$10$63fbeb69642e9b9bb073df0412929bd64570b13e21b0';
    $mode = MCRYPT_MODE_CBC;
    $iv = mcrypt_create_iv(mcrypt_get_iv_size($algorithm, $mode),
                       MCRYPT_DEV_URANDOM);
    $txt_encriptado = base64_decode($plain_text);
    $txt_desencriptado = mcrypt_decrypt($algorithm, $key, $txt_encriptado, $mode, $iv);
    return $txt_desencriptado;

}
?>