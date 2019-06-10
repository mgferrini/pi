<?php
include_once("controllers/funciones.php");

if ($_POST){
	$usuario = new Usuario ($_POST["email"],$_POST["password"],$_POST["first_name"],$_POST["last_name"],$_FILES);
	$errores=$usuario->validarRegistro($usuario,$_POST["repassword"]);
	if(count($errores)==0){
		$usuario->setTabla('users');
		$usuario-> setNombre ($_POST['first_name']);
		$usuario-> setApellido ($_POST['last_name']);
		BaseMYSQL:: guardarPerfil($usuario, $pdo,$usuario->getTabla()) ;
		$avatar = $usuario->armarAvatar($usuario->getAvatar());
		$avatar = $usuario->setAvatar($avatar);
		$registroUsuario= $usuario -> armarRegistro($usuario);
		Autenticador::seteoUsuario($registroUsuario);
		redirect("index.php");
	}else {
		$perfil['first_name']=$_POST['first_name'];
		$perfil['last_name']=$_POST['last_name'];
		$perfil['email']=$_POST['email'];
		$perfil['password']=$_POST['password'];
		$perfil['repassword']=$_POST['repassword'];
	}

}else {
	$resultado=BaseMYSQL::buscarEmail($_SESSION['email'],$pdo,'users');
	$perfil=$resultado;
}
?>

<div class="container regcontainer">
	<?php if(isset($errores)):
		echo "<ul class='alert alert-danger text-center'>";
		foreach ($errores as $key => $value) :?>
		<li><?=$value;?> </li>
	<?php endforeach;
	echo "</ul>";
endif;?>

<section class="row">
	<h1 class="regh1">Perfil</h1>
</section>
<section class="registro row">
	<article class="form regformulario col-xs-12 col-md-8 col-lg-8">
		<h2 class="regtitulo">Modifica tus datos</h2><br>
		<form class="datosusuario" action="#" method="POST" enctype= "multipart/form-data"  >
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="nombre">Nombre *</label>
					<input type="text" class="form-control" name="first_name" id="nombre" value="<?=(isset($perfil["first_name"]) )? $perfil["first_name"] : "" ;?>" required>
				</div>
				<div class="form-group col-md-6">
					<label for="apellido">Apellido</label>
					<input type="text" class="form-control" name="last_name" id="apellido" value="<?=(isset($perfil["last_name"]) )? $perfil["last_name"] : "" ;?>">
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-12">
					<label for="email">Email *</label>
					<input type="email" class="form-control" id="email" name="email" readonly value="<?=(isset($perfil["email"]) )? $perfil["email"] : "" ;?>" >
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-md-6">
					<label for="inputPassword4">Contraseña *</label>
					<input type="password" class="form-control" id="inputPassword4pass" name="password" value="<?=(isset($perfil["password"]) )? $perfil["password"] : "" ;?>">
				</div>
				<div class="form-group col-md-6">
					<label for="inputPassword4">Reconfirmar Contraseña *</label>
					<input type="password" class="form-control" id="inputPassword4pass" name="repassword" value="<?=(isset($perfil["repassword"]) )? $perfil["repassword"] : "" ;?>" >
				</div>
			</div>
			<div class="regSubirAvatar"> * Imagen de Perfil:
				<input type="file" name="avatar" id="avatar">
			</div>
			<button type="submit" class="btn regboton">Actualizar</button>
		</form>
	</article>
</section>
</div>
