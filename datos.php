<?PHP

/*
Categorias ( id, nombre)

	Jabones
		Almendras
		Chocolate
		Palta	
		
		
	Aceites
		Menta
		Lavanda
		Calendula
		
	Hidratantes
		Corporal
		Facial
		Manos
		
Articulos
	( id, idCategoria, nombre, stock, valor, imagen, descripcion )
	
*/

	$categorias=array();
	$categorias[]= array(
		"id" => "01" , "nombre" => "Jabones" );
	$categorias[]= array(
		"id" => "02" , "nombre" => "Aceites" );
	$categorias[]= array(
		"id" => "03" , "nombre" => "Hidratantes" );

	$articulos=array();
	
	$articulos[] = Array(
		"id" => "101", "idCategoria" => "01", "nombre" => "Almendras", "stock" => 10, "valor" => 101, "imagen" => "img/jabonAlmendras.jpg", "descripcion" => "Jabon de Almendras"
	);
	
	$articulos[] = Array(
		"id" => "102", "idCategoria" => "01", "nombre" => "Chocolate", "stock" => 10, "valor" => 102, "imagen" => "img/jabonChocolate.jpg", "descripcion" => "Jabon de Chocolate"
	);
	
	$articulos[] = Array(
		"id" => "103", "idCategoria" => "01", "nombre" => "Palta", "stock" => 10, "valor" => 103, "imagen" => "img/jabonPalta.jpg", "descripcion" => "Jabon de Palta"
	);

	
	$articulos[] = Array(
		"id" => "201", "idCategoria" => "02", "nombre" => "Menta", "stock" => 10, "valor" => 201, "imagen" => "img/aceiteAlmendras.jpg", "descripcion" => "Aceite de Menta"
	);
	
	$articulos[] = Array(
		"id" => "202", "idCategoria" => "02", "nombre" => "Lavanda", "stock" => 10, "valor" => 202, "imagen" => "img/aceiteChocolate.jpg", "descripcion" => "Aceite de Lavanda"
	);
	
	$articulos[] = Array(
		"id" => "203", "idCategoria" => "02", "nombre" => "Calendula", "stock" => 10, "valor" => 203, "imagen" => "img/aceitePalta.jpg", "descripcion" => "Aceite de Calendula"
	);
	
		
	$articulos[] = Array(
		"id" => "301", "idCategoria" => "03", "nombre" => "Almendras", "stock" => 10, "valor" => 301, "imagen" => "img/hidratantesCorporal.jpg", "descripcion" => "Hidratantes Corporal"
	);
	
	$articulos[] = Array(
		"id" => "302", "idCategoria" => "03", "nombre" => "Chocolate", "stock" => 10, "valor" => 302, "imagen" => "img/hidratantesFacial.jpg", "descripcion" => "Hidratantes Facial"
	);
	
	$articulos[] = Array(
		"id" => "303", "idCategoria" => "03", "nombre" => "Palta", "stock" => 10, "valor" => 303, "imagen" => "img/hidratantesManos.jpg", "descripcion" => "Hidratantes de Manos"
	);
	
	
	echo("<pre>");
	
	
	var_dump($categorias);
	echo("<hr>");
	var_dump($articulos);
	echo("</pre>");
	
	function getCategorias(){
		return $categorias;
	}
	
	function getArticulos( $idCategoria = "" ){
		return $articulos;
	}
	
?>