<?php
include_once("controllers/funciones.php");
if ($_POST){
  $usuario=new Usuario($_POST["email"],$_POST["password"]);
  $errores=$usuario->validarLogin($usuario);
  if (count($errores)==0) {
    $resultado=BaseMYSQL::buscarEmail($_POST['email'],$pdo,'users');
    if($resultado){
      if(password_verify($usuario->getPassword(),$resultado["password"])==true){
        Autenticador::seteoUsuario($resultado,$usuario);
        if (isset($datos["remember"])) {
          dd($datos);
          Autenticador::seteoCookies();
        }
        redirect("index.php");
      }else {
        $errores[]="Clave Incorrecta <br>";
      }
    }else {
      $errores[]="Usuario no encontrado <br>";
    }
    echo "<p class='alert alert-danger'>";
    if(isset($errores)){
      foreach ($errores as $value) {
        echo $value;
      }
    }
    echo "</p>";
  }
}
if (isset($_SESSION["nombre"])) {
  header("location: index.php");
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
