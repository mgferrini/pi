<div class="row">
  <div class="col-md-3">
    <a class="logo" href="index.php"><img src="img/logo_hoja.png" width="300" alt="logo" ></a>    
  </div>
  <div class="col-md-9">
	  <nav class="navbar navbar-expand-lg">
	    <div class="collapse navbar-collapse navOrder collapse show" id="navbarSupportedContent">
	      <ul class="navbar-nav flex-row">
	        <li class="nav-item flex-nowrap">
	          <?PHP if(isset($_SESSION["nombre"])) : ?>   
	        	  <img height="35" width="35" class="img-fluid rounded-circle" src="<?PHP echo("imagenes/".$_SESSION["avatar"]); ?>"><?PHP echo( "&nbsp;&nbsp; Hola &nbsp;" . $_SESSION["nombre"] . "&nbsp;!"); ?>
	          <?PHP endif ?> 
	        </li>
	        <li class="nav-item dropdown">
	            <a class="nav-link navflecha dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	              <i class="fas fa-user-plus fa-md icon"></i> 
	            </a>  
	            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
	                <?PHP if(!isset($_SESSION["nombre"])) : ?> <a class="dropdown-item" href="?page=login"><i class="navuser">Login</i></a>  <?PHP endif ?>   
	                <?PHP if(!isset($_SESSION["nombre"])) : ?><a class="dropdown-item" href="?page=registro"><i class="navuser">Registrarse</i></a> <?PHP endif ?>  
	                <?PHP if(isset($_SESSION["nombre"])) : ?><a class="dropdown-item" href="?page=perfil"><i class="navuser">Editar Perfil</i></a> <?PHP endif ?> 
	                <?PHP if(isset($_SESSION["nombre"])) : ?><a class="dropdown-item" href="?page=logout"><i class="navuser">Logout</i></a><?PHP endif ?> 
	            </div>  
	          </li>
	          <li class="nav-item">
	            <a class="nav-link" href="#">
	              <i class="fas fa-shopping-basket fa-md icon navcart"></i>
	            </a>
	          </li>
	    	</ul>
	  	</div>
		</nav>
 	</div>	
</div>
