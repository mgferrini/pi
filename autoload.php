<?php
require_once("clases/Usuario.php");
require_once("clases/Validador.php");
require_once("clases/Autenticador.php");
require_once("clases/BaseDatos.php");
require_once("clases/BaseJSON.php");

$validar=new Validador();
$dbJSON=new BaseJSON("usuarios.json");
