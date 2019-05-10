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

  private function guardarTabla(){
    file_put_contents($this->nombreTabla, "" );
    foreach ($this->tablaEnMemoria as $registroLeido){
      if($this->registroActual[$this->claveMaestra] == $registroLeido[$this->claveMaestra] ){
        $registroAGrabar=$this->registroActual;
      }else{
        $registroAGrabar=$registroLeido;
      }
      $this->agregarRegistro($registroAGrabar);
    }
  }
  
  function actualizarRegistro($identificadorDeRegistro, $nombreDelDato, $nuevoValor){
    if ($this->buscarRegistro($identificadorDeRegistro)){
      $this->registroActual[$nombreDelDato] = $nuevoValor;

      // la implementacion de esta rutina en el caso de archivo, tiene que guardar en disco, sino se pierden los cambios
      // pero antes de guardar tenemos que actualizar toda la tabla que tenemos en memoria, sino vamos a guardar lo viejo, o incompleto
      $this->guardarTabla();

      return true;
    }else {
      return FALSE;
    }
  }

  function eliminarRegistro($valorABuscar){
    $this->leerTabla();
    file_put_contents($this->nombreTabla, "" );
    foreach ($this->tablaEnMemoria as $registroLeido){
      if($registroLeido[$this->claveMaestra] <> $valorABuscar ){ // SI Y SOLO SI ES DISTINTO
        $this->agregarRegistro($registroLeido);
      }
    }
    $this->leerTabla(); // actualiza....
  }

  function agregarRegistro($datos){
    $jsonData = json_encode($datos);
    file_put_contents($this->nombreTabla, $jsonData . PHP_EOL, FILE_APPEND );
    $this->leerTabla(); // volvemos a leer para actualizar nuestras variables de clase
  }

  function buscarRegistro($valorABuscar){
    if($this->tablaEnMemoria == null ){
      $this->leerTabla();
    }
    foreach ($this->tablaEnMemoria as $registroLeido) {
      if ($valorABuscar == $registroLeido[$this->claveMaestra]) {
        $this->registroActual = $registroLeido; // lo guardamos en el objeto, asi lo podemos seguir usando sin buscar de nuevo.
        return $this->registroActual;
        break;
      }
    }
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
    $this->tablaEnMemoria = $usuarios; // guardamos el resultado en un campo del objeto, hay que hacerlo con un set pero no tengo ganas
    return $this->tablaEnMemoria; // devolvemos todos los registros
  }
}

?>