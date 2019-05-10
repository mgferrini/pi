<?PHP
abstract class BaseDatos{
  protected  $nombreTabla; // para nosotros usuarios.json
  protected  $claveMaestra; // el nombre del campo que se usara para buscar por ejemplo, en el caso de usuarios, sera 'email'
  public $registroActual; // array con el ultimo registro encontrado
  abstract function leerTabla();
  abstract function buscarRegistro($valorABuscar);
  abstract function eliminarRegistro($valorABuscar);
  abstract function actualizarRegistro($identificadorDeRegistro, $nombreDelDato, $nuevoValor);
  abstract function agregarRegistro($datos); // es un array del tipo key-value
  public function __construct($nombre,$clave) // clave es el nombre del campo que identifica los registros, 'email' en nuestro caso.
  {
    $this->nombreTabla = $nombre;
    $this->claveMaestra = $clave;
  }
}

?>