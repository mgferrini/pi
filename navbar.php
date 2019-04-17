<?PHP
  
  $categorias = getCategorias();
  //var_dump($categorias);
  //  
?>
<div class="row">
  <div class="col-md-5">
    <a class="logo" href="index.php"><img src="img/logo-phi2.png" alt="logo" ></a>    
    <span class="marca0">Phi</span>
    <span class="marca1">Organic</span>
  </div>
  <div class="col-md-7">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.php"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Menu1</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Menu2</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Categorias
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              
              <!-- utilizar un forech para publicar los textos de cada categoria y el link correspondiente 
              'id' => string '01' (length=2)
              'nombre' => string 'Jabones' (length=7)
              'top-banner' => string 'imgTopBannerCat01' (length=17)
              'background-img' => string 'imgFondo01.jpg' (length=14)
              
              en href poner ?categoria= (el ID del array)

              tiene que quedar como a continuacion: 
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <a class="dropdown-item" href="#">Something else here</a>
              -->
              <a class="dropdown-item" href="?page=categoria&id=01">Action</a>

            </div>
          </li>
        </ul>
      </div>
    </nav>

  </div>
</div>
<div class="row" style="margin-top:20px">
  <!-- linea de corte entre el nav y el contenido -->
</div>
