<?php
class Validador{
  public function validarLogin($usuario){
    $errores=array();
    $email = trim($usuario->getEmail());
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
       $errores[]="El email ingresado no es el correcto <br>";
    }
    $password= trim($usuario->getPassword());
    if(empty($password)){
      $errores[]="Ingrese una clave <br>";
    }
    return $errores;
  }
}
