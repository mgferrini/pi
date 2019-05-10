<?php
class Usuario{
    private $nombre;
    private $apellido;
    private $email;
    private $password;
    private $avatar;
    private $perfil;
    private $tabla; // tabla de la base de datos o archivo json, segun corresponda
    
    private $errores // hacer solo el GET, nunca el set
 
    public function __construct($email, $password){
        $this->email = $email;
        $this->password = $password;
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
    
    function validarRegistro($datos, $archivos){ 
    	/*
    	
    	LimpiarArrayDeErrores
			$datos es el post del formaulario Registro
			$archivos seria el $_FILES recibido del formulario
			validar los datos capturados del fomrulario
			buscar email 
				verificar que no este duplicado
			armar avatar con el $file
			armar el registro  con el post y el file
			guardar registro, pasarle a la $db los datos para grabar ya sea el archivo o la tabla
			setear usuario en la $_SESSION
			guardar cookie si corresponda
			retornar errores
			*/
    }
    
    function validarLogin($datos){
    	/*
    	LimpiarArrayDeErrores
    	$datos es el post del formaulario login
    	validar los datos capturados del fomrulario, email y password no vacios
    	buscar email 
				verificar que exista y nos devuelta el $usuario[]
			verificar password
			SI? recordar -> guardar cookie
			setear usuario en la $_SESSION
			retornar errores
    	*/
    }
    
    function validarPerfil($datos, $archivos){
    	/*
    	LimpiarArrayDeErrores
    	$datos es el post del formaulario login
    	validar los datos capturados del fomrulario, email y password etc
    	buscar email 
				verificar que exista y nos devuelta el $usuario[]
			
			
			actualizar Usuario ()
				-guardar registro, pasarle a la $db los datos para grabar ya sea el archivo o la tabla
				
			retornar errores
    	*/
    }
    
    function ResetPassword($datos){
    	/*
    	LimpiarArrayDeErrores
    	$datos es el post del formaulario login o solamente el email
    	
    	buscar email 
			
			verificar que exista y nos devuelta el $usuario[]
			
			generar nueva password
			
			enviar email
			actualizar Usuario () 
			
			retornar errores
    	*/
    }
}

//validar Registro
//armar avatar
//armar registro
//guardar registro
//validar Login
//olvide password
//cambiar perfil

?>