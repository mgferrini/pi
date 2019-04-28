<?php

session_start();
require_once('usuarios.php');
require_once("datos.php");

function dd($valor){
	echo "<pre>";
	var_dump($valor);
	echo "</pre>";
	exit;
}

