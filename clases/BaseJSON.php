<?PHP
require_once("basedatos.php");
class BaseJson extends BaseDatos{

  public $tablaEnMemoria;

  private function abrirTabla()
  {
    if(!file_exists( $this->nombreTabla )){
      file_put_contents($this->nombreTabla,PHP_EOL, FILE_APPEND);
    }
  }
  
  function buscarRegistro($nombreDelDato,$valorABuscar){

  }

  function leerTabla(){
    $this->abrirTabla();
    $traer= file_get_contents($this->nombreTabla);//Traer el archivo
    $db = explode(PHP_EOL, $traer);//aca lo separas
    array_pop($db);//Sacas el ultimo elemento
    foreach ($db as $usuarioCodificado) {//despues recorres lo que cambiaste y lo guardas en una variable
      $decodificado=json_decode($usuarioCodificado, true);//Y esa variable la decodificas
      $usuarios[]=$decodificado;// despues poner sus datos en alguna variable
    }
    $this->tablaEnMemoria = $usuarios;
    return $this->tablaEnMemoria;// abrirRegistro(); esta funcion podria devolverte un array con el usuario si lo encontro
  }
}

?>