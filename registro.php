<?php
include_once("controllers/funciones.php");
if ($_POST){
	$usuario = new Usuario ($_POST["email"],$_POST["password"],$_POST["nombre"],$_POST["apellido"],$_FILES["avatar"]["name"]);
	//$usuario -> setTabla("./usuariosVale.json");  No funciona
	$errores=$usuario->validarRegistro($usuario,$_POST["repassword"]);
	if(count($errores)==0){
		$avatar = $usuario->armarAvatar($_FILES); //aca deberia mandar $usuario -> getAvatar() ??? porque no funciona
		$registroUsuario= $usuario -> armarRegistro($usuario,$avatar);
		$usuario -> guardar($registroUsuario) ;
	//	Autenticador::seteoUsuario($usuario,$_POST);      TODAVIA NO INTENTE HACERLO
	redirect("index.php");
	}
}
if (isset($_SESSION["nombre"])) {
	redirect("index.php");
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
						<label for="nombre">Nombre *</label>
						<input type="text" class="form-control" name="nombre" id="nombre" value="<?=(isset($errores["nombre"]) )? "" : inputUsuario("nombre");?>">
					</div>
					<div class="form-group col-md-6">
						<label for="apellido">Apellido *</label>
						<input type="text" class="form-control" name="apellido" id="apellido" value="<?=(isset($errores["apellido"]) )? "" : inputUsuario("apellido");?>">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="fecha">Fecha de Nacimiento</label>
						<input type="date" class="form-control" id="fecha" name="fecha" value="<?=(isset($_POST["fecha"]) )? $_POST["fecha"]: "";?>">
					</div>
					<div class="form-group col-md-6">
						<label for="email">Email *</label>
						<input type="email" class="form-control" id="email" name="email" value="<?=isset($errores["email"])? "" :inputUsuario("email") ;?>">
					</div>
				</div>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="inputPassword4">Contraseña *</label>
						<input type="password" class="form-control" id="password" name="password">
					</div>
					<div class="form-group col-md-6">
						<label for="inputPassword4">Reconfirmar Contraseña *</label>
						<input type="password" class="form-control" id="repassword" name="repassword">
					</div>
				</div>
				<div class="form-group">
					<label for="direccion">Dirección</label>
					<input type="text" class="form-control" id="direccion" name="direccion" value="<?=(isset($_POST["direccion"]) )? $_POST["direccion"]: "";?>">
				</div>
				<div class="form-row">
					<div class="form-group col-md-5">
						<label for="ciudad">Ciudad</label>
						<input type="text" class="form-control" id="ciudad" name="ciudad" value="<?=(isset($_POST["ciudad"]) )? $_POST["ciudad"]: "";?>">
					</div>
					<div class="form-group col-md-5">
						<label for="provincia">Provincia</label>
						<select id="provincia" class="form-control" name="provincia" id="provincia">
							<?php
							$provincias=["Seleccionar","Buenos Aires","CABA","Catamarca","Chaco","Chubut","Córdoba","Corrientes","Entre Ríos","Formosa","Jujuy","La Pampa","La Rioja","Mendoza","Misiones","Neuquén","Río Negro","Salta","San Juan","San Luis","Santa Cruz","Santa Fe","Santiago del Estero","Tierra del Fuego","Tucumán"];
							foreach ($provincias as $key =>$value) {
								if($key==0){
									echo "<option hidden value='$key'> $value</option>";
								} else {
									echo "<option value='$key'> $value</option>";
								}
							}
							?>
						</select>
					</div>
					<div class="form-group col-md-2">
						<label for="inputZip">Código Postal</label>
						<input type="text" class="form-control" id="zip" name="zip" value="<?=(isset($_POST["zip"]) )? $_POST["zip"]: "";?>">
					</div>
				</div>
				<div class="regSubirAvatar"> * Imagen de Perfil:
					<input type="file" name="avatar" id="avatar">
				</div>
				<div class="form-group">
					<div class="form-check">
						<input class="form-check-input" type="checkbox" id="terminos" name="terminos" >
						<label class="form-check-label" for="terminos">
							He leído y acepto Términos y Condiciones *
						</label>
					</div>
				</div>
				<button type="submit" class="btn regboton">Enviar</button>
				<p> * Datos obligatorios </p>
			</form>
		</article>
	</section>
</div>


