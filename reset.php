<?php
include_once("controllers/funciones.php");
if ($_POST) {
	$errores=validarLogin($_POST);

	if (count($errores)==0) {
		//		header("location:index.php");

	}
}

function validarLogin($datos){
	$errores=[];
	$email=trim($datos['email']);
	if ($email=="") {
		$errores[]="Complete el campo requerido";
	}elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
		$errores[]="El email ingresado no es el correcto";
	}
	$usuariosTodos = abrirRegistro();
	$resultado = buscarDatos($usuariosTodos,$email);
	if($resultado){
		$errores[]="Se ha enviado un correo con las informacion neesaria para recuperar su clave";
	}else{
		$errores[]="No registramos esa casilla de correo.";
	}
	return $errores;
}

function abrirRegistro(){
	$traer= file_get_contents("usuarios.json");//Traer el archivo
	$db = explode(PHP_EOL, $traer);//aca lo separas
	array_pop($db);//Sacas el ultimo elemento
	foreach ($db as $usuarioCodificado) {//despues recorres lo que cambiaste y lo guardas en una variable
		$decodificado=json_decode($usuarioCodificado, true);//Y esa variable la decodificas
		$usuarios[]=$decodificado;// despues poner sus datos en alguna variable
	}
	return $usuarios;// abrirRegistro(); esta funcion podria devolverte un array con el usuario si lo encontro
}

function buscarDatos($usuarios, $email){// aca tenes que ir a buscar el usuario en el archivo json
	foreach ($usuarios as $usuario) {
		if ($email == $usuario["email"]) {
			return $usuario;
			break;
		}
	}
}

?>


<div class="container">
	<div class="row">
		<div class="col-md-12 ">
			<div class="row">
				<div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
					<div class="panel panel-default">
						<div class="panel-body">
							<form accept-charset="UTF-8" role="form" method="post">
								<fieldset>
									<legend><h3> <i class="fa fa-lock "></i> Reseteo de Clave</h3></legend>
									<p>Ingresa tu dirección de correo y recibiras un correo para generar una nueva clave.</p>
									<?php
									if(isset($errores)){
										foreach ($errores as $value) {
											echo $value;
										}
									}
									?>

									<div class="form-group">
										<input type="email" name="email" id="email" class="form-control input-lg" placeholder="ingresa tu Email" tabindex="4">
									</div>
									<div class="row">
										<div class="col-xs-12 col-md-12"><input class="btn btn-lg btn-success btn-block" type="submit" value="Enviar"></div>
									</div>
								</fieldset>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
