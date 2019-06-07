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
  }
 /* public function guardarPerfil2($datosNuevos){  //esta funcion deberia estar en BaseJson
    $usuarios = $this->abrirBaseRegistro();  //aca deberia ir $tablaUsuarios -> abrirBaseRegistro
    $usuariosnuevos=[];
    unlink($tablaUsuarios); // aca tambien deberia llamar a la tabla
    foreach ($usuarios as $usuario1) {
    if($datosNuevos["email"]==$usuario1["email"]){
      $usuarionuevo=[
        "nombre"=>$datosNuevos["nombre"],
        "apellido"=>$datosNuevos["apellido"],
        "email"=>$datosNuevos["email"],
        "password"=> $this->hashPassword($datosNuevos["password"]),
        "avatar"=>$datosNuevos["avatar"],
        "perfil"=>$usuario1["perfil"],
      ];
  
      if($_FILES["avatar"]["error"]==0){
        $nombre = $_FILES["avatar"]["name"];
        $ext = pathinfo($nombre,PATHINFO_EXTENSION);
        $archivoOrigen = $_FILES["avatar"]["tmp_name"];
        $archivoDestino = pathinfo( dirname(__FILE__) )["dirname"].'/'.pathinfo( dirname(__FILE__) )["basename"] ;
        $archivoDestino = $archivoDestino."/imagenes/";  
        $avatar = uniqid();
        $archivoDestino = $archivoDestino.$avatar;
        $archivoDestino = $archivoDestino.".".$ext;
        move_uploaded_file($archivoOrigen,$archivoDestino);
        $avatar = $avatar.".".$ext;
  
        $usuarionuevo["avatar"]= $avatar;
      }
  
      $_SESSION["nombre"]=$usuarionuevo["nombre"];
      $_SESSION["email"]=$usuarionuevo["email"];
      $_SESSION["avatar"]=$usuarionuevo["avatar"];
      $_SESSION["perfil"]=$usuarionuevo["perfil"];
  
    }else{
      $usuarionuevo=$usuario;
    }
    $usuariosnuevos[]=$usuarionuevo;
    }
    foreach ($usuariosnuevos as $usuario) {
    $jsusuario = json_encode($usuario);
    file_put_contents("usuarios.json", $jsusuario . PHP_EOL, FILE_APPEND );
    }
    }
  */
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
