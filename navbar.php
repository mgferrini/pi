<?PHP
  
  $categorias = getCategorias();
  //var_dump($categorias);
  //  
?>   
<div class="row">
  <div class="col-md-12">
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link navCat" href="">JABONES</a>
          </li>
          <li class="nav-item">
            <a class="nav-link navCat" href="#">ACEITES</a>
          </li>
          <li class="nav-item">
            <a class="nav-link navCat" href="#">CREMAS</a>
          </li>
          <li class="nav-item">
            <a class="nav-link navCat" href="#"  > CABELLO </a>
          </li>
          <li class="nav-item navCat">
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-1 icon" type="search" placeholder="" aria-label="Search">
              <a class="fas fa-search nav-item fa-lg icon" type="submit" ></a>
            </form>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</div>
<!-- <div class="row" style="margin-top:20px">
</div>
 linea de corte entre el nav y el contenido -->