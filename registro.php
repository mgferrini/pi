<?php
include_once("controllers/funciones.php");
//include_once("controllers/usuarios.php"); ESTO LO SAQUE PORQUE COPIE LAS FORMULAS MAS ABAJO
if ($_POST){
	$errores=validar($_POST,"registro");
	if(count($errores)==0){
		$avatar = armarAvatar($_FILES);
		$registro = armarRegistro($_POST,$avatar);
		guardar($registro);
		seteoUsuario($registro,$_POST);
		header("location: index.php");
	}
}

if (isset($_SESSION["nombre"])) {
  header("location: index.php");
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



<?php

function validar($datos,$bandera){
	$errores=[];
	if(isset($datos["nombre"])){
		$nombre = trim($datos["nombre"]);
		if(empty($nombre)){
			$errores["nombre"]= "Debe introducir el nombre";
		}
	}
	if(isset($datos["apellido"])){
		$apellido = trim($datos["apellido"]);
		if(empty($apellido)){
			$errores["apellido"]= "Debe introducir el apellido";
		}
	}
	if(!isset($datos["terminos"])){
		$errores["terminos"]= "Debe aceptar Términos y Condiciones";
	}

	$email = trim($datos["email"]);
	if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		$errores["email"]="Email invalido";
	}
	$password= trim($datos["password"]);
	if(isset($datos["repassword"])){
		$repassword = trim($datos["repassword"]);
	}

	if(empty($password)){
		$errores["password"]= "Debe introducir contraseña";
	}elseif (strlen($password)<6) {
		$errores["password"]="La contraseña debe tener como mínimo 6 caracteres";
	}
	if(isset($datos["repassword"])){
		if ($password != $repassword) {
			$errores["repassword"]="Las contraseñas no coinciden";
		}
	}
	if($bandera == "registro"){
		if($_FILES["avatar"]["error"]!=0){
			$errores["avatar"]="Error debe subir imagen";
		}
		$nombre = $_FILES["avatar"]["name"];
		$ext = pathinfo($nombre,PATHINFO_EXTENSION);
		if($ext != "png" && $ext != "jpg"){
			$errores["avatar"]="Debe seleccionar archivo png ó jpg";
		}
	}
	$usuario = buscarEmail($_POST["email"]);
	if($usuario!= null){
		$errores["email"]="Usuario ya existe";
	}
	return $errores;
}

function inputUsuario($campo){
	if(isset($_POST[$campo])){
		return $_POST[$campo];
	}
}

function armarAvatar($imagen){
	$nombre = $imagen["avatar"]["name"];
	$ext = pathinfo($nombre,PATHINFO_EXTENSION);
	$archivoOrigen = $imagen["avatar"]["tmp_name"];
	$archivoDestino = pathinfo( dirname(__FILE__) )["dirname"].'/'.pathinfo( dirname(__FILE__) )["basename"] ;
	$archivoDestino = $archivoDestino."/imagenes/";  //esto hay que ponerlo de acuerdo al directorio elegido
	$avatar = uniqid();
	$archivoDestino = $archivoDestino.$avatar;
	$archivoDestino = $archivoDestino.".".$ext;
	move_uploaded_file($archivoOrigen,$archivoDestino);
	$avatar = $avatar.".".$ext;
	return $avatar;
}

function armarRegistro($datos,$imagen){
	$usuario = [
	"nombre"=>$datos["nombre"],
	"email"=>$datos["email"],
	"password"=> password_hash($datos["password"],PASSWORD_DEFAULT),
	"avatar"=>$imagen,
	"perfil"=>1
	];
	return $usuario;
}

function guardar($usuario){
	$jsusuario = json_encode($usuario);
	file_put_contents('usuarios.json',$jsusuario. PHP_EOL, FILE_APPEND);
}

function buscarEmail($email){
	$usuarios = abrirBaseDatos();
	foreach ($usuarios as  $usuario) {
		if($email === $usuario["email"]){
			return $usuario;
		}
	}
	return null;
}


function abrirBaseDatos(){
	$baseDatosJson= file_get_contents("usuarios.json");
	$baseDatosJson = explode(PHP_EOL,$baseDatosJson);
	array_pop($baseDatosJson);
	$arrayUsuarios=array();
	foreach ($baseDatosJson as  $usuarios) {
		$arrayUsuarios[]= json_decode($usuarios,true);
	}
	return $arrayUsuarios;
}
function seteoUsuario($user,$dato){
	$_SESSION["nombre"]=$user["nombre"];
	$_SESSION["email"] = $user["email"];
	$_SESSION["perfil"]= $user["perfil"];
	$_SESSION["avatar"]= $user["avatar"];
	/* if(isset($dato["recordar"]) ){  LO SAQUE PARA REGISTRO
	setcookie("email",$dato["email"],time()+3600);
	setcookie("password",$dato["password"],time()+3600);
	}*/
}

function validarUsuario(){
	if($_SESSION["email"]){
		return true;
	}elseif ($_COOKIE["email"]) {
		$_SESSION["email"]=$_COOKIE["email"];
		return true;
	}else{
		return false;
	}
}
?>
