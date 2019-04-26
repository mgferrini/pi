<!-- ESTE ARCHIVO NO SE TOCA -->

<?php
	ob_start(); 
	require_once('controllers/funciones.php');
    
  if( ($_POST) && (isset($_POST["register"])) ){
    savedata($_POST);
    header('Location: #');
    exit;
  }

  if( ($_POST) && (isset($_POST["logout"])) ){
    closesession();
    header('Location: #');
    exit;
  }

  $mailValue = '';
  if( isset($_COOKIE['cookie-email'])){
    $mailValue = $_COOKIE['cookie-email'];
  }
  if( isset($_COOKIE['cookie-pass'])){
    $passValue = $_COOKIE['cookie-pass'];
  }
    
	include_once("head.html");

	include_once("pageStart.php");
	include_once("header.php");
	include_once("navbar.php");
  
	$queryString = $_GET;

	if( isset($queryString["page"])){
		include_once( $queryString["page"]. ".php");
	}else{
		include_once("carousel.php");
	}

	include_once("footer.php");
	include_once("pageEnd.php");
	ob_end_flush();
?>
</div>
