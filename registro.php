<?php
include_once("controllers/funciones.php");
if ($_POST){
	$usuario = new Usuario ($_POST["email"],$_POST["password"],$_POST["nombre"],$_POST["apellido"],$_FILES["avatar"]["name"]);
	$errores=$usuario->validarRegistro($usuario,$_POST["repassword"]);
	if(count($errores)==0){
		$tabla = $usuario->setTabla('users');
		$usuario1 = BaseMYSQL:: buscarEmail($usuario->getEmail(),$pdo,$usuario->getTabla()); // nombre de tabla , va como variable?
		if($usuario1 == false){
			$perfil = $usuario ->setPerfil(1);
			$avatar = $usuario->armarAvatar($_FILES); //aca deberia mandar $usuario -> getAvatar() ??? porque no funciona
			//	$registroUsuario= $usuario -> armarRegistro($usuario,$avatar);
			BaseMYSQL:: guardarUsuario($usuario,$avatar, $pdo,$usuario->getTabla()) ;
			Autenticador::seteoUsuario($usuario,$avatar);
			redirect("index.php");
		}else{
			$errores["email"]="Usuario ya registrado";
		}
	}
	if (isset($_SESSION["nombre"])) {
		redirect("index.php");
	}
}
?>



<div class="container regcontainer">

	<?php
	if( isset($errores)):?>
	<ul class="alert alert-warning">
		<?php
		foreach ($errores as $key => $value) :?>
		<li> <?=$value;?> </li>
		<?php endforeach;?>
	</ul>
	<?php endif;?>
	<?php
	?>



	<section class="row">
		<h1 class="regh1">Registro</h1>
	</section>
	<section class="registro row">
		<article class="regcolumna col-xs-12 col-md-4 col-lg-4">
			<h2 class="regtitulo2"> ¿Ya tenés cuenta?</h2>
			<br>
			<a class="btn regboton" href="?page=login" role="button">Ingresar</a>
			<br>
			<img src="img/soapreg.png" alt="jabon_arte" class="regimg">
		</article>
		<article class="form regformulario col-xs-12 col-md-8 col-lg-8">
			<h2 class="regtitulo">Ingresa tus datos para registrarte </h2><br>
			<form class="datosusuario" action="" method="POST" enctype= "multipart/form-data"  >
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="nombre">Nombre</label>
						<input type="text" class="form-control" name="nombre" id="nombre" value="<?=(isset($errores["nombre"]) )? "" : inputUsuario("nombre");?>">
					</div>
					<div class="form-group col-md-6">
						<label for="apellido">Apellido</label>
						<input type="text" class="form-control" name="apellido" id="apellido" value="<?=(isset($errores["apellido"]) )? "" : inputUsuario("apellido");?>">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-12">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email" value="<?=isset($errores["email"])? "" :inputUsuario("email") ;?>">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="inputPassword4">Contraseña</label>
						<input type="password" class="form-control" id="password" name="password">
					</div>
					<div class="form-group col-md-6">
						<label for="inputPassword4">Reconfirmar Contraseña</label>
						<input type="password" class="form-control" id="repassword" name="repassword">
					</div>
				</div>
				<div class="regSubirAvatar"> Imagen de Perfil:
					<input type="file" name="avatar" id="avatar">
				</div>
				<div class="form-group">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" id="terminos" name="terminos" >
						<label class="form-check-label" for="terminos">
							He leído y acepto Términos y Condiciones
						</label>
					</div>
				</div>
				<button type="submit" class="btn regboton">Enviar</button>
			</form>
		</article>
	</section>
</div>
