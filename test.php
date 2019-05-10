<?PHP
include_once("clases/BaseJSON.php");

$user_email = "alguien@dh.com";

$db = new BaseJson("usuarios.json","email");
//var_dump( $db->leerTabla() );

$miUsuario = $db->buscarRegistro($user_email);

var_dump( $miUsuario );

echo "<hr>";

$resultado = $db->actualizarRegistro($user_email, "perfil", ++$miUsuario["perfil"] );
echo( "Resultado:  $resultado " );
var_dump( $db->registroActual );

echo "<hr>";

$miUsuarioNuevo = $miUsuario;
$miUsuarioNuevo["email"] = $miUsuario["email"].$miUsuario["perfil"];
echo "agregar usuario ";
var_dump( $miUsuarioNuevo );
$db->agregarRegistro($miUsuarioNuevo);

echo "<hr>";
echo "tabla Actualizada: ";
var_dump( $db->tablaEnMemoria );

echo "<hr>";
echo "eliminar usuario: " . $miUsuarioNuevo['email'] ;
$db->eliminarRegistro($miUsuarioNuevo["email"]); // pasandole el valor correspondiente del campo clave

?>