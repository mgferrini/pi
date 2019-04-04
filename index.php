<?php
	include_once("head.html");
	include_once("header.php");
	include_once("navbar.php");
	
	$queryString = $_GET;
	
	if( isset($queryString["page"])){
		include_once( $queryString["page"]. ".php");
	}else{
		include_once("default.php");
	}
	
	include_once("footer.php");
?>
