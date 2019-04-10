<?php
	include_once("head.html");
	echo "<div class='container-fluid'>";
	include_once("header.php");
	include_once("navbar.php");
	echo "<br>";
	echo "<br>";
	$queryString = $_GET;

	if( isset($queryString["page"])){
		include_once( $queryString["page"]. ".php");
	}else{
		include_once("carousel.php");
	}

	include_once("footer.php");
?>
</div>
