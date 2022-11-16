<?php
class csrf
{
  public static function getTokenCSRF(){
      $token = bin2hex(random_bytes(32));
      $_SESSION['token-csrf'] = $token;
      return $token;
  }
  //Verifica si se ha recibido un token igual que se genero aleatoreamente
  public static function checkTokenCSRF($token)
  {
    if (!empty($_SESSION['token-csrf']) && $token ===  $_SESSION['token-csrf'])
    {
      unset($_SESSION['token-csrf']);
      return true;
    }
    return false;
  }
}
?>