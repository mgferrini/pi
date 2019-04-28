<?php
include_once("controllers/funciones.php");

if ($_POST){
	$errores=validarPerfil($_POST);
	if(count($errores)==0){
		//    $avatar = armarAvatar($_FILES);
		//    $registro = armarRegistro($_POST,$avatar);
		guardar($_POST);

		header("location: index.php");
	}else {
		$perfil['nombre']=$_POST['nombre'];
		$perfil['apellido']=$_POST['apellido'];
		$perfil['email']=$_POST['email'];
		$perfil['nombre']=$_POST['nombre'];
		 	
	}
	
}else {
//	dd($_SESSION);
 	$perfil=buscarDatos(abrirRegistro(), $_SESSION['email']);
// 	dd($perfil);
}

function validarPerfil($datos){
	$errores=[];
	if(isset($datos["nombre"])){
		$nombre = trim($datos["nombre"]);
		if(empty($nombre)){
			$errores["nombre"]= "Debe introducir el nombre";
		}
	}
	if(isset($datos["apellido"])){
		$apellido = trim($datos["apellido"]);
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

function guardar($datos){
	$email =$datos["email"];
	$newpass=$datos["password"];
	$usuarios=abrirRegistro();
//	dd($usuarios);
	$usuariosnuevos=[];
	unlink("usuarios.json");
	foreach ($usuarios as $usuario) {
		if($email==$usuario["email"]){
			$usuarionuevo=[
			"nombre"=>$datos["nombre"],
			"email"=>$datos["email"],
			"password"=>password_hash($newpass,PASSWORD_DEFAULT),
			"avatar"=>$usuario["avatar"],
			"perfil"=>$usuario["perfil"],
			];

			if($_FILES["avatar"]["error"]=0){
				$nombre = $_FILES["avatar"]["name"];
				$ext = pathinfo($nombre,PATHINFO_EXTENSION);
				$archivoOrigen = $_FILES["avatar"]["tmp_name"];
				$archivoDestino = pathinfo( dirname(__FILE__) )["dirname"].'/'.pathinfo( dirname(__FILE__) )["basename"] ;
				$archivoDestino = $archivoDestino."/imagenes/";  //esto hay que ponerlo de acuerdo al directorio elegido
				$avatar = uniqid();
				$archivoDestino = $archivoDestino.$avatar;
				$archivoDestino = $archivoDestino.".".$ext;
				move_uploaded_file($archivoOrigen,$archivoDestino);
				$avatar = $avatar.".".$ext;
				
				$usuarionuevo["avatar"]= $avatar;
				
			}
			
			var_dump($usuarionuevo);

			$_SESSION["nombre"]=$usuarionuevo["nombre"];
			$_SESSION["email"]=$usuarionuevo["email"];
			$_SESSION["avatar"]=$usuarionuevo["avatar"];
			$_SESSION["perfil"]=$usuarionuevo["perfil"];


		}else{
			$usuarionuevo=$usuario;
		}
		$usuariosnuevos[]=$usuarionuevo;
	}
	foreach ($usuariosnuevos as $usuario) {
		$jsusuario = json_encode($usuario);
		file_put_contents("usuarios.json", $jsusuario . PHP_EOL, FILE_APPEND );
	}
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
		<!--<article class="regcolumna col-xs-12 col-md-4 col-lg-4">
		<h2 class="regtitulo2"> ¿Ya tenés cuenta?</h2>
		<br>
		<a class="btn regboton" href="?page=login" role="button">Ingresar</a>
		<br><br>
		<img src="img/soap_0001.jpg" alt="jabon_arte" class="regimg">
		</article>-->
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
					<div class="form-group col-md-6">
						<label for="fecha">Fecha de Nacimiento</label>
						<input type="date" class="form-control" id="fecha" name="fecha">
					</div>
					<div class="form-group col-md-6">
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
				<div class="form-group">
					<label for="direccion">Dirección</label>
					<input type="text" class="form-control" id="direccion" name="direccion">
				</div>
				<div class="form-row">
					<div class="form-group col-md-5">
						<label for="ciudad">Ciudad</label>
						<input type="text" class="form-control" id="ciudad" name="ciudad">
					</div>
					<div class="form-group col-md-5">
						<label for="provincia">Provincia</label>
						<select id="provincia" class="form-control" name="provincia">
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
						<input type="text" class="form-control" id="inputZip">
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
