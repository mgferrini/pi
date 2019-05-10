<?php
class Sesion{
    static public function abrirSesion(){
        if(!isset($_SESSION)){
            session_start();
        }
    }
    static public function seteoUsuario($usuario1,$dato){
        $_SESSION["nombre"]=$usuario1["nombre"];
        $_SESSION["email"] = $usuario1["email"];
        $_SESSION["perfil"]= $usuario1["perfil"];
        $_SESSION["avatar"]= $usuario1["avatar"];
        if(isset($dato["recordar"]) ){
            setcookie("email",$usuario1["email"],time()+3600);
            setcookie("password",$usuario1["password"],time()+3600);
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