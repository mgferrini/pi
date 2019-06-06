<?php
class Autenticador{
  static public function seteoUsuario($usuario,$avatar){
    $_SESSION["nombre"]=$usuario->getNombre();
    $_SESSION["email"]=$usuario->getEmail();
    $_SESSION["avatar"]=$avatar;
    $_SESSION["perfil"]=$usuario->getPerfil();
  }
  static public function seteoCookies(){
    setcookie("email",$datos["email"], time() + 60*60*24);
    setcookie("password", $datos["password"], time()+ 60*60*24);
  }
}
