<?php
include_once("autoload.php");
if ($_POST) {
  $usuario=new Usuario($_POST["email"],$_POST["password"]);
  $errores=$validar->validarLogin($usuario);
  // if (count($errores)==0) {
  //   header("location:index.php");
  // }
if (isset($_SESSION["nombre"])) {
  header("location: index.php");
}

  // $errores=[];
  // $email=trim($datos['email']);
  // if ($email=="") {
  //   $errores[]="Complete este campo <br>";
  // }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
  //   $errores[]="El email ingresado no es el correcto <br>";
  // }
  // $password=trim($datos["password"]);
  // if ($password=="") {
  //   $errores[]="Ingrese una clave <br>";
  // }
  $usuariosTodos=$dbJSON->abrirRegistro();
  dd($usuariosTodos);
  $resultado = $dbJSON->buscarDatos($usuariosTodos,$email);
  if($resultado){
    if(password_verify($datos["password"],$resultado["password"])==true){
      Autenticador::seteoUsuario();
      // $_SESSION["nombre"]=$resultado["nombre"];
      // $_SESSION["email"]=$resultado["email"];
      // $_SESSION["avatar"]=$resultado["avatar"];
      // $_SESSION["perfil"]=$resultado["perfil"];
      if (isset($datos["remember"])) {
        Autenticador::seteoCookies();
        // setcookie("email",$datos["email"], time() + 60*60*24);
        // setcookie("password", $datos["password"], time()+ 60*60*24);
      }
    }else {
      $errores[]="Clave Incorrecta <br>";
    }
  }else {
    $errores[]="Usuario no encontrado <br>";
  }
  echo "<p class='alert alert-danger'>";
  return $errores;
  echo "</p>";
}

// function abrirRegistro(){
//   if(!file_exists('usuarios.json')){
//     file_put_contents('usuarios.json',PHP_EOL, FILE_APPEND);
//   }
//   $traer= file_get_contents("usuarios.json");
//   $db = explode(PHP_EOL, $traer);
//   array_pop($db);
//   foreach ($db as $usuarioCodificado) {
//     $decodificado=json_decode($usuarioCodificado, true);
//     $usuarios[]=$decodificado;
//   }
//   return $usuarios;
// }

// function buscarDatos($usuarios, $email){
//   foreach ($usuarios as $usuario) {
//     if ($email == $usuario["email"]) {
//       return $usuario;
//       break;
//     }
//   }
// }

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
                <input class="form-control" placeholder="E-mail" name="email" type="text" value="<?=isset($_COOKIE["email"])?$_COOKIE["email"] : "" ;?>">
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Password" name="password" type="password" value="<?=isset($_COOKIE["password"])?$_COOKIE["password"] : "" ;?>">
              </div>
              <div class="checkbox">
                <label>
                  <input name="remember" type="checkbox" value="Remember Me"> Recordarme
                </label>
              </div>
              <input class="btn regboton" type="submit" value="Ingresar">
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
      <h2 class="regtitulo2">¿Acaso no estas registrado?</h2>
      <p>Registrate para estar al tanto de las ultimas novedades acerca de los productos, los nuevos productos de Phi Organic, proximos lanzamientos y un monton de cosas mas.</p>
      <br>
      <a class="btn regboton" href="?page=registro">Registrarse</a>
    </article>
  </section>
</div>
