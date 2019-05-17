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
  public function abrirBaseRegistro(){
    if(file_exists($this->nombreArchivo)){
      $baseDatosJson= file_get_contents($this->nombreArchivo);
      $baseDatosJson = explode(PHP_EOL,$baseDatosJson);
      array_pop($baseDatosJson);
      foreach ($baseDatosJson as  $usuarios) {
        $arrayUsuarios[]= json_decode($usuarios,true);
      }
      return $arrayUsuarios;
    }else{
      return null;
    }
  }

  public function buscarEmail($email){
    $usuarios = $this->abrirBaseRegistro();
    if($usuarios!==null){
      foreach ($usuarios as $usuario) {
        if($email === $usuario["email"]){
          return $usuario;
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
