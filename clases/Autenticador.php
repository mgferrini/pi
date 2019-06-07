<?php
class Autenticador{
  static public function seteoUsuario($resultado){
    $_SESSION["nombre"] = $resultado["first_name"];
    $_SESSION["email"] = $resultado["email"];
    $_SESSION["avatar"] = $resultado["avatar"];
    $_SESSION["perfil"] = $resultado["profile"];
  }
  static public function seteoCookies(){
    setcookie("email",$datos["email"], time() + 60*60*24);
    setcookie("password", $datos["password"], time()+ 60*60*24);
  }
}
