<?php

function validarRegistro($datos){
	$errores = [];
	
	$nombre = trim($datos["nombre"]);
	if (empty($nombre)){
		$errores["nombre"]="Complete su nombre";
		echo "chuleta";
	}
	$email = trim($datos["email"]);
	if(empty($email)){
		$errores["email"]="Complete el email";
	}elseif (!filter_var($email,    FILTER_VALIDATE_EMAIL)){
		$errores["email"]="Email  invlido";

	}
	$password = trim($datos["password"]);
	$repassword = trim($datos["repassword"]);
	if(empty($password)){
		$errores["password"] = "Introduzca su password";
	}elseif (strlen($password)<6) {
		$errores["password"] = "La contrasea debe tener mnimo seis carcteres";
	}elseif ($password != $repassword) {
		$errores["repassword"]= "Hermano querido no coinciden las contraseas";
	}
	

	if(isset($_FILES["avatar"])){
		if($_FILES["avatar"]["error"] != UPLOAD_ERR_OK ){
			$errores["avatar"]= "Error subiendo imagen o no ha seleccionado ninguna imagen";
		}
		$nombre = $_FILES["avatar"]["name"];
		$ext = pathinfo($nombre, PATHINFO_EXTENSION);
		if($ext!='jpg' && $ext!='png'){
			$errores["avatar"]= "imagen invalida";
		
		}
	}										

	return $errores;
}

function persistirInput($campo){
	// agrego este comentario en esta funciona para probar que hace git con el cambio
    if(isset($_POST[$campo])){
        return $_POST[$campo];
    }
}

function crearAvatar($imagen){
	$nombre = $imagen["avatar"]["name"];
	$ext = pathinfo($nombre, PATHINFO_EXTENSION);
	$archivoTmp = $imagen["avatar"]["tmp_name"];
	$destino = dirname(__DIR__) . '/imagenes/' . uniqid() . '.' . $ext;
	$resultado = move_uploaded_file($archivoTmp,$destino);
	var_dump($resultado);
	
	return $destino;
}

function crearRegistro($datos,$imagen){
    $usuario = [
        "nombre"=>$datos["nombre"],
        "email"=>$datos["email"],
        "password"=> password_hash($datos["password"],PASSWORD_DEFAULT),
        "avatar" => $imagen
    ];
    return $usuario;
}

function guardarRegistro($usuario){
    $jsusuario = json_encode($usuario);
    file_put_contents("usuarios.json", $jsusuario . PHP_EOL ,FILE_APPEND);
}

?>