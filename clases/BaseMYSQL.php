<?php

class BaseMYSQL extends BaseDatos{
  static public function conexion($host,$db_nombre,$usuario,$password,$puerto,$charset){ //charset: para que lea los caracteres especiales
    try {
      $dsn = "mysql:host=".$host.";"."dbname=".$db_nombre.";"."port=".$puerto.";"."charset=".$charset;
      $baseDatos = new PDO($dsn,$usuario,$password);
      $baseDatos->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      return $baseDatos;
    } catch (PDOException $errores) {
      echo "No me pude conectar a la BD ". $errores->getmessage();
      exit;
    }
  }

  static public function guardarUsuario($usuario,$pdo,$tabla){
    $sql="insert into $tabla (id, first_name, last_name, email, password, avatar, profile)  values (default, :first_name,:last_name,:email,:password,:avatar, :profile)";
    $query=$pdo->prepare($sql);
    $query->bindValue(':first_name',$usuario->getNombre());
    $query->bindValue(':last_name',$usuario->getApellido());
    $query->bindValue(':email',$usuario->getEmail());
    $query->bindValue(':password',$usuario->hashPassword($usuario->getPassword()));
    $query->bindValue(':avatar',$usuario->getAvatar());
    $query->bindValue('profile',$usuario->getPerfil());
    $query->execute();
  }

  static public function buscarEmail($email,$pdo,$tabla){
    $sql = "select * from $tabla where email = :email";
    $query = $pdo->prepare($sql);
    $query->bindValue(':email',$email);
    $query -> execute();
    $userFound = $query -> fetch(PDO::FETCH_ASSOC);
    return $userFound;
  }

  public function guardarPerfil($usuario,$pdo, $tabla){
    $sql="update $tabla set first_name = :first_name, last_name = :last_name, password = :password, avatar= :avatar, profile=:profile where email= :email;";
    $query=$pdo->prepare($sql);
    $query->bindValue(':first_name',$usuario->getNombre());
    $query->bindValue(':last_name',$usuario->getApellido());
    $query->bindValue(':email',$usuario->getEmail());
    $query->bindValue(':password',$usuario->hashPassword($usuario->getPassword()));
    $query->bindValue(':avatar',$usuario->getAvatar());
    $query->bindValue(':profile',$usuario->getPerfil());
    $query->execute();
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
  public function guardar(array $registro){
    //A futuro trabajaremos en esto
  }
}
