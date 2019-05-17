<?php
session_start();
require_once("datos.php");
// require_once("./clases/Sesion.php");
//Sesion::abrirSesion();
require_once("helpers.php");
require_once("./clases/Usuario.php");
require_once("./clases/Autenticador.php");
require_once("./clases/BaseDatos.php");
require_once("./clases/BaseJSON.php");

$tablaUsuarios=new BaseJSON("usuarios.json");
/* VALE: Esto ahora esta en helpers:
function dd($valor){
	echo "<pre>";
	var_dump($valor);
	echo "</pre>";
	exit;
}*/
