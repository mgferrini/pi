<?PHP

	unset($_SESSION["nombre"]);
	unset($_SESSION["email"] );
	unset($_SESSION["avatar"]);
	unset($_SESSION["perfil"]);
	
	header("location:index.php"); 
?>