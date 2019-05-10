<?PHP
abstract class BaseDatos{
  public $nombreTabla;
  abstract function leerTabla();
  abstract function buscarRegistro($nombreDelDato,$valorABuscar);
  public function __construct($nombre)
  {
    $this->nombreTabla = $nombre;
  }
}

?>