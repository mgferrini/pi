<?php
class BaseJSON extends BaseDatos{
  private $nombreArchivo;
  public function __construct($nombreArchivo){
    $this->nombreArchivo = $nombreArchivo;
  }
  public function getNombreArchivo(){
    return $this->nombreArchivo;
  }
  public function setNombreArchivo($nombreArchivo){
    $this->nombreArchivo = $nombreArchivo;
  }
  public function guardar($registro){
    $jsusuario = json_encode($registro);
    file_put_contents($this->nombreArchivo ,$jsusuario. PHP_EOL, FILE_APPEND);
  }
  public function abrirRegistro(){
    if(file_exists($this->$nombreArchivo)){
      $traer= file_get_contents($this->$nombreArchivo);
      $db = explode(PHP_EOL, $traer);
      array_pop($db);
      foreach ($db as $usuarioCodificado) {
        $decodificado=json_decode($usuarioCodificado, true);
        $usuarios[]=$decodificado;
      }
      return $usuarios;
    }
  }
  public function buscarDatos($usuarios, $email){
    foreach ($usuarios as $usuario) {
      if ($email == $usuario->getEmail()) {
        return $usuario;
        break;
      }
    }
  }


public function leer(){
  //A futuro trabajaremos en esto
}
public function actualizar(){
  //A futuro trabajaremos en esto
}
public function borrar(){
  //A futuro trabajaremos en esto
}
}
