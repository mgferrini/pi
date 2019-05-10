<?PHP
include_once("clases/BaseJSON.php");
$db = new BaseJson("usuarios.json");
var_dump( $db->leerTabla() );
?>