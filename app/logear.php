<?php 
function error($numero,$texto){ 
$ddf = fopen('~/docker-lamp/Proyecto0SGSSI/error.log','a'); 
fwrite($ddf,"[".date("r")."] Error $numero:$texto\r\n"); 
fclose($ddf); 
} 
set_error_handler('error'); 
?>