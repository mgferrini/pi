<?php
session_start();
require_once("datos.php");
require_once("helpers.php");
require_once("clases/BaseDatos.php");
//require_once("clases/BaseJson.php");  //esto no lo vamos a usar mas
require_once("./clases/BaseMYSQL.php"); // agrego Vale
require_once("./clases/Usuario.php");
require_once("./clases/Autenticador.php");


//Declaro mis variables
$host = "localhost";
$bd = "organic";
$usuario = "root";
$password = "";  //ver password: Adela ""
$puerto = "3306"; //MAC:  puerto: 8889 , windows : 3306
$charset = "utf8mb4"; // esto es para que lea los caracteres especiales


$pdo = BaseMYSQL::conexion($host,$bd,$usuario,$password,$puerto,$charset);  //hay que agregarlo
//var_dump($pdo);


 //$tablaUsuarios = new BaseJson ("usuarios.json"); // esto hay que sacarlo o ponerle un nombre distinto al de arriba
