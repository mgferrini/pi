<?php
include_once("controllers/funciones.php");

if ($_POST){
	$usuario = new Usuario ($_POST["email"],$_POST["password"],$_POST["nombre"],$_POST["apellido"],$_FILES["avatar"]["name"]);
	$errores=$usuario->validarRegistro($usuario,$_POST["repassword"]);
	if(count($errores)==0){
		$usuario -> guardarPerfil($_POST);

		redirect("index.php");
	}else {
		$perfil['nombre']=$_POST['nombre'];
		$perfil['apellido']=$_POST['apellido'];
		$perfil['email']=$_POST['email'];
		$perfil['nombre']=$_POST['nombre'];

	}

}else {
 	$perfil=$tablaUsuarios -> buscarEmail($_SESSION['email']);
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
						<input type="text" class="form-control" name="nombre" id="nombre" value="<?=(isset($perfil["nombre"]) )? $perfil["nombre"] : "" ;?>" required>
					</div>
					<div class="form-group col-md-6">
						<label for="apellido">Apellido</label>
						<input type="text" class="form-control" name="apellido" id="apellido" value="<?=(isset($perfil["apellido"]) )? $perfil["apellido"] : "" ;?>">
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
						<input type="password" class="form-control" id="inputPassword4pass" name="password" value=''>
					</div>
					<div class="form-group col-md-6">
						<label for="inputPassword4">Reconfirmar Contraseña *</label>
						<input type="password" class="form-control" id="inputPassword4pass" name="repassword" value='' >
					</div>
				</div>
				<div class="regSubirAvatar"> * Imagen de Perfil:
					<input type="file" name="avatar" id="avatar">
				</div>
				<button type="submit" class="btn regboton">Enviar</button>
			</form>
		</article>
	</section>
</div>
