<?php
include_once("controllers/funciones.php"); 
if ($_POST) {
  $errores=validarLogin($_POST);
  if (count($errores)==0) {
    header("location:index.php");
  }
}


function validarLogin($datos){
  $errores=[];
  $email=trim($datos['email']);
  if ($email=="") {
    $errores[]="Complete este campo";
  }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    $errores[]="El email ingresado no es el correcto";
  }
  $password=trim($datos["password"]);
  if ($password=="") {
    $errores[]="Ingrese una clave";
  }
  $usuariosTodos = abrirRegistro();
  $resultado = buscarDatos($usuariosTodos,$email);
  if($resultado){
    if(password_verify($datos["password"],$resultado["password"])==true){
      //Grabar sesiones
      $_SESSION["nombre"]=$resultado["nombre"];
      $_SESSION["email"]=$resultado["email"];
      $_SESSION["avatar"]=$resultado["avatar"];
      $_SESSION["perfil"]=$resultado["perfil"];
    }else {
      $errores[]="Clave Incorrecta";
    }
  }else {
    $errores[]="Usuario no encontrado";
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
// para que puedas seguir con la validacion del email y la contraseña
// y sino devolver NULL, entonces preguntas por ese valor que te devuelve y actuas en consecuencia
?>

<?php
	if(isset($errores)){
		foreach ($errores as $value) {
			echo $value;
		}
	}
?>

<div class="container regcontainer">
  <section class="row">
    <h1 class="regh1">Login</h1>
  </section>
  <section class="registro row">
    <article class="form regformulario col-md-5">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h2 class="regtitulo">Usuario y Contraseña</h2><br>
        </div>
        <div class="panel-body">
          <form accept-charset="UTF-8" role="form" method="post">
            <fieldset>
              <div class="form-group">
                <input class="form-control" placeholder="E-mail" name="email" type="text" >
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Password" name="password" type="password">  
              </div>
              <div class="checkbox">
                <label>
                  <input name="remember" type="checkbox" value="Remember Me"> Recordarme
                </label>
              </div>
              <input class="regboton" type="submit" value="Ingresar">
              <hr>
              <div class="forgot">
                <a href="?page=reset">Olvide mi contraseña</a>
              </div>
            </fieldset>
          </form>
        </div>
      </div>
    </article>
    <article class="form regformulario col-md-5 offset-md-2">
      <h2 class="regtitulo">¿Acaso no estas registrado?</h2>
      <p>Registrate para estar al tanto de las ultimas novedades acerca de los productos, los nuevos productos de Phi Organic, proximos lanzamientos y un monton de cosas mas.</p>
      <br>
      <a class="regboton" href="?page=registro">Registrarse</a>
    </article>
  </section>
</div>
