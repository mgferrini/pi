<?php
include_once("controllers/funciones.php");

/* hacerlo andar y que grabe el archivo de usuarios.
if ($_POST){
  $errores=validarRegistro($_POST);
	if (count($errores)==0){
		//$avatar = crearAvatar($_FILES);
		$avatar = "";
    $registro = crearRegistro($_POST, $avatar);
    guardarRegistro($registro);
    $error["success"]="Registro creado con exito";
  }
}
*/
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
    <h1 class="regh1">Registro</h1>
  </section>
  <section class="registro row">
        <article class="regcolumna col-xs-12 col-md-4 col-lg-4">
          <h2 class="regtitulo2"> ¿Ya tenés cuenta?</h2>
          <br>
          <a class="btn regboton" href="?page=login" role="button">Ingresar</a>
          <br><br>
          <img src="img/soap_0001.jpg" alt="jabon_arte" class="regimg">
        </article>
        <article class="form regformulario col-xs-12 col-md-8 col-lg-8">
          <h2 class="regtitulo">Ingresa tus datos para registrarte </h2><br>
          <form class="datosusuario" action="#" method="POST">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="nombre">Nombre *</label>
                  <input type="text" class="form-control" name="nombre" id="nombre" value="" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="apellido">Apellido *</label>
                  <input type="text" class="form-control" name="apellido" id="apellido" value="" required>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="fecha">Fecha de Nacimiento</label>
                   <input type="date" class="form-control" id="fecha" name="fecha">
                </div>
                <div class="form-group col-md-6">
                  <label for="email">Email *</label>
                  <input type="email" class="form-control" id="email" name="email" required>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Contraseña *</label>
                  <input type="password" class="form-control" id="inputPassword4pass" name="password" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Reconfirmar Contraseña *</label>
                  <input type="password" class="form-control" id="inputPassword4pass" name="repassword" required>
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
            <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="suscripcion" name="suscripcion">
                <label class="form-check-label" for="suscricion">
                    Por favor suscribirme a la lista de correo de Phi Organic
                </label>
              </div>
            </div>
             <div class="form-group">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" id="terminos" name="terminos" value="si" required>
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
