<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registro</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400" rel="stylesheet">
<link rel="stylesheet" href="css/master.css">
</head>
<body>
<div class="container-fluid regcontainer">
    <section class="row">
        <h1 class="regh1">Registro</h1>
        <br><br>
    </section>
    <section class="space">
      <br>
    </section>
    <section class="registro row">
        <article class="regcolumna col-xs-12 col-md-4 col-lg-4">
          <h2 class="regtitulo2"> ¿Ya tenés cuenta?</h2>
          <br>
          <a class="btn regboton" href="#" role="button">Ingresar</a>
          <br><br>
          <img src="img/regjabon1.png" alt="jabon_arte" class="regimg">
        </article>   
        <article class="form regformulario col-xs-12 col-md-8 col-lg-8">
          <h2 class="regtitulo">Ingresa tus datos para registrarte </h2><br>
          <form class="datosusuario" action="datosregistro.php" method="POST">
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
                  <label for="email">Email *</label>
                  <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPassword4">Contraseña *</label>
                  <input type="password" class="form-control" id="inputPassword4pass" name="password" required>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="fecha">Fecha de Nacimiento</label>
                   <input type="date" class="form-control" id="fecha" name="fecha">
                </div>
                <div class="form-group col-md-6">
                  <label for="dni">Documento Nro.</label>
                  <input type="text" class="form-control" id="dni" name="dni">
                </div>
              </div>
              <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion">
              </div>
              <div class="form-row">
                  <div class="form-group col-md-6">
                    <label for="ciudad">Ciudad</label>
                    <input type="text" class="form-control" id="ciudad" name="ciudad">
                  </div>
                <div class="form-group col-md-4">
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
