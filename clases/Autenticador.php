<?php
class Autenticador{
  static public function seteoUsuario(){
    $_SESSION["nombre"]=$resultado["nombre"];
    $_SESSION["email"]=$resultado["email"];
    $_SESSION["avatar"]=$resultado["avatar"];
    $_SESSION["perfil"]=$resultado["perfil"];
  }
  static public function seteoCookies(){
    setcookie("email",$datos["email"], time() + 60*60*24);
    setcookie("password", $datos["password"], time()+ 60*60*24);
  }
}
