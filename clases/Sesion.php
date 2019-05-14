<?php
class Sesion{
    static public function abrirSesion(){
        if(!isset($_SESSION)){
            session_start();
        }
    }
    static public function seteoUsuario($usuario){
        $_SESSION["nombre"]=$usuario["nombre"];
        $_SESSION["email"] = $usuario["email"];
        $_SESSION["perfil"]= $usuario["perfil"];
        $_SESSION["avatar"]= $usuario["avatar"];
        if(isset($dato["recordar"]) ){
            setcookie("email",$usuario["email"],time()+3600);
            setcookie("password",$usuario["password"],time()+3600);
        }
    }
    static public function validarUsuario(){
        if($_SESSION["email"]){
            return true;
        }elseif ($_COOKIE["email"]) {
            $_SESSION["email"]=$_COOKIE["email"];
            return true;
        }else{
            return false;
        }
        
    }
}