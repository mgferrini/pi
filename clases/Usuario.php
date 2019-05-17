<?php
class Usuario{
  private $nombre;
  private $apellido;
  private $email;
  private $password;
  private $avatar;
  private $perfil;
  private $tabla;

  public function __construct($email, $password, $nombre=null, $apellido = null, $avatar =null,$tabla =null){
    $this->email = $email;
    $this->password = $password;
    $this->nombre = $nombre;
    $this->apellido = $apellido;
    $this->avatar = $avatar;
    $this->tabla = $tabla;

  }
  public function getNombre(){
    return $this->nombre;
  }
  public function setNombre($nombre){
    $this->nombre = $nombre;
  }
  public function getApellido(){
    return $this->apellido;
  }
  public function setApellido($apellido){
    $this->apellido = $apellido;
  }
  public function getEmail(){
    return $this->email;
  }
  public function setEmail($email){
    $this->email = $email;
  }
  public function getPassword() {
    return $this->password;
  }
  public function setPassword($password){
    $this->password = $password;
  }
  public function getAvatar(){
    return $this->avatar;
  }
  public function setAvatar($avatar){
    $this->avatar= $avatar;
  }
  public function getPerfil(){
    return $this->perfil;
  }
  public function setPerfil($perfil){
    $this->perfil = $perfil;
  }
  public function getTabla(){
    return $this->tabla;
  }
  public function setTabla($tabla){
    $this->tabla = $tabla;
  }

  // Vale : REGISTRO

  public function validarRegistro ($usuario,$repassword){
    $errores = array();
    $nombre = trim($usuario->getNombre());
    if(isset($nombre)){
      if(empty($nombre)){
        $errores["nombre"]= "El campo nombre no debe estar vacio";
      }
    }
    $nombre = trim($usuario->getApellido());
    if(isset($apellido)){
      if(empty($apellido)){
        $errores["apellido"]= "El campo apellido no debe estar vacio";
      }
    }
    $email = trim($usuario->getEmail());
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $errores["email"]="Email invalido";
    }
    $password= trim($usuario->getPassword());
    if(isset($repassword)){
      $repassword= trim($repassword);
    }
    if(empty($password)){
      $errores["password"]= "El campo password no debe estar vacío";
    }elseif (strlen($password)<6) {
      $errores["password"]="La contraseña debe tener como mínimo 6 caracteres";
    }
    if(isset($repassword)){
      if ($password != $repassword) {
        $errores["repassword"]="Las contraseñas no coinciden";
      }
    }
    if($_FILES["avatar"]["error"]!=0){
      $errores["avatar"]="Error: debe subir imagen";
    }
    $nombre = $_FILES["avatar"]["name"];
    $ext = pathinfo($nombre,PATHINFO_EXTENSION);
    if($ext != "png" && $ext != "jpg"){
      $errores["avatar"]="Debe seleccionar archivo png ó jpg";
    }
    $usuario1 = $this -> buscarEmail($usuario->getEmail());
    if($usuario1 !== null){
      $errores["email"]="El usuario ya existe";
    }
    return $errores;
  }

  public function armarAvatar($imagen){
    $nombre = $imagen["avatar"]["name"];
    $ext = pathinfo($nombre,PATHINFO_EXTENSION);
    $archivoOrigen = $imagen["avatar"]["tmp_name"];
    $archivoDestino = dirname(__DIR__);
    $archivoDestino = $archivoDestino."/imagenes/";
    $avatar = uniqid();
    $archivoDestino = $archivoDestino.$avatar;
    $archivoDestino = $archivoDestino.".".$ext;
    move_uploaded_file($archivoOrigen,$archivoDestino);
    $avatar = $avatar.".".$ext;
    return $avatar;
  }

  public function armarRegistro($usuario,$avatar){
    $registroUsuario = [
    "nombre"=>$usuario->getNombre(),
    "apellido"=>$usuario->getApellido(),
    "email"=>$usuario->getEmail(),
    "password"=> $this->hashPassword($usuario->getPassword()),
    "avatar"=>$avatar,
    "perfil"=>1
    ];
    return $registroUsuario;
  }

  public function abrirBaseRegistro(){
    if(file_exists($this->nombreArchivo)){
      $traer= file_get_contents($this->nombreArchivo);
      $db = explode(PHP_EOL, $traer);
      array_pop($db);
      foreach ($db as $usuarioCodificado) {
        $decodificado=json_decode($usuarioCodificado, true);
        $usuarios[]=$decodificado;
      }
      return $usuarios;
    }
  }

  public function buscarEmail($email){
    $usuarios = $this->abrirBaseRegistro();
    if($usuarios!==null){
      foreach ($usuarios as $usuario1) {
        if($email === $usuario1["email"]){
          return $usuario1;
        }
      }
    }

    return null;
  }
  public function guardar($registro){
    $jsusuario = json_encode($registro);
    file_put_contents($this->abrirBaseRegistro(),$jsusuario. PHP_EOL, FILE_APPEND);
  }
  public function hashPassword ($password){
    return password_hash($password,PASSWORD_DEFAULT);
  }
  public function verificarPassword($password,$passwordHash){
    return password_verify($password,$passwordHash);
  }

  // LOGIN NACHO
  public function validarLogin($usuario){
    $errores=array();
    $email = trim($this->getEmail());
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $errores[]="El email ingresado no es el correcto <br>";
      if (empty($email)){
        $errores[]="Usuario inexistente";
      }
    }
    $password= trim($this->getPassword());
    if(empty($password)){
      $errores[]="Ingrese una clave <br>";
    }
    return $errores;
  }
}

?>