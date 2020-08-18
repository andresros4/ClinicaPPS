<?php 
//models/Usuarios.php

class Usuarios extends Model {

	public function getTodos(){

		$this->db->query("SELECT * FROM usuarios");
		
		return $this->db->fetchAll();
	}

	public function getId($id){		

		$this->db->query( "SELECT * from  usuarios
			WHERE id_usuario=".$id );
		
		return  $this->db->fetch();

	}
	
	public function eliminar($id){		

		$this->db->query( "DELETE from usuarios WHERE id_usuario=".$id );	
		return  $this->db->fetch();

	}

	public function getConDni($dni){

		$this->db->query("SELECT * FROM usuarios WHERE dni=".$dni) ;
		
		if( $this->db->numRows() == 1 ) return $this->db->fetch();
		else throw new Exception("No existe un cliente con ese número de DNI."); 
		
	}

	public function editarCliente($id,$nombre, $apellido, $dni, $telefono, $email, $usuario, $id_obra_social, $numAfiliado, $estado){


		$sql = "UPDATE usuarios SET 
		nombre='$nombre', 
		apellido='$apellido', 
		dni=$dni, 
		telefono=$telefono, 
		email='$email', 
		user='$usuario', 
		id_obra_social=$id_obra_social, 
		numAfiliado=$numAfiliado,
		id_estado_usuario = $estado
		WHERE id_usuario=".$id;

		return$this->db->query($sql);
		
	}

	public function editarAdmin($id,$nombre, $apellido, $dni, $telefono, $email, $usuario, $estado){


		$sql = "UPDATE usuarios SET 
		nombre='$nombre', 
		apellido='$apellido', 
		dni=$dni, 
		telefono=$telefono, 
		email='$email', 
		user='$usuario',		
		id_estado_usuario = $estado
		WHERE id_usuario=".$id;

		return$this->db->query($sql);
		
	}
	

	public function editarDoctor($id,$nombre, $apellido, $dni, $telefono, $email, $usuario, $estado){


		$sql = "UPDATE usuarios SET 
		nombre='$nombre', 
		apellido='$apellido', 
		dni=$dni, 
		telefono=$telefono, 
		email='$email', 
		user='$usuario',
		id_estado_usuario= $estado
		WHERE id_usuario=".$id;

		return$this->db->query($sql);
		
	}


	public function agregarCliente($nombre, $apellido, $dni, $tel, $email, $pass , $obraSocial, $numAfiliado){

		$password = sha1($pass);

		$this->db->query("SELECT * FROM usuarios WHERE dni=".$dni) ;
		
		if( $this->db->numRows() == 1 ) throw new Exception("Ya existe un usuario con ese numero de DNI");

		$this->db->query("SELECT * FROM usuarios WHERE user='$user'") ;
		
		if( $this->db->numRows() == 1 ) throw new Exception("Ya existe un usuario con ese nombre de usuario");

		$this->db->query("SELECT * FROM usuarios WHERE email='$email'") ;
		
		if( $this->db->numRows() == 1 ) throw new Exception("Ya existe un usuario con ese email");

		

		$sql = "INSERT INTO usuarios  (nombre, apellido, dni,  telefono, email, id_tipo_usuario, user, pass, id_obra_social, numAfiliado )
		VALUES ( '$nombre', '$apellido', '$dni', 
		'$tel', '$email', '1', '$dni', '$password' , '$obraSocial', '$numAfiliado' )";

		if($this->db->query($sql))
			return $this->db->last_id();
		else
			return false;		
		
	}


	public function agregarUser($nombre, $apellido, $dni, $tel, $email, $pass , $user, $id_tipo_usuario){

		$password = sha1($pass);

		$this->db->query("SELECT * FROM usuarios WHERE dni=".$dni) ;
		
		if( $this->db->numRows() == 1 ) throw new Exception("Ya existe un usuario con ese numero de DNI");

		$this->db->query("SELECT * FROM usuarios WHERE user='$user'") ;
		
		if( $this->db->numRows() == 1 ) throw new Exception("Ya existe un usuario con ese nombre de usuario");

		$this->db->query("SELECT * FROM usuarios WHERE email='$email'") ;
		
		if( $this->db->numRows() == 1 ) throw new Exception("Ya existe un usuario con ese email");

		$sql = "INSERT INTO usuarios  (nombre, apellido, dni,  telefono, email,  id_tipo_usuario, user, pass)
		VALUES ( '$nombre', '$apellido', '$dni', 
		'$tel', '$email', '$id_tipo_usuario', '$user', '$password' )";

		if($this->db->query($sql))
			return $this->db->last_id();
		else
			return false;		
		
	}






// esta creo que no la uso mas pero la dejo por las dudas
	public function add($nombre, $apellido, $dni, $tel, $email, $pass , $obraSocial){

		$password = sha1($pass);



		$sql = "INSERT INTO usuarios  (nombre, apellido, dni, domicilio, telefono, email, id_ciudad, id_tipo_usuario, user, pass )
		VALUES ( '$nombre', '$apellido', '$dni', 'gregorio de lafe',
		'$tel', '$email', '1', '1', '$dni', '$password' )";

		if($this->db->query($sql))
			return $this->db->last_id();
		else
			return false;		
		
	}


	public function login($user, $pass){

		$u = $this->validaUser($user);
		$p = $this->validaPass($pass);

		$this->db->query( "SELECT * FROM usuarios
			WHERE user='$u' AND pass='$p'
			" );
		
		return  $this->db->fetch();

	}

	//retorna un array con la lista de todos los veterinarios (id_tipo_usuario=2)
	public function getSelectData(){

		$this->db->query("SELECT id_usuario AS id, nombre from  usuarios");
		
		return $this->db->fetchAll();

	}

	//al menos 3 caracteres para el nombre de usuario
	private function validaUser($user){
		if( strlen($user) <= 3 ) throw new Exception("User, cantidad de caracteres inválida.");		
		$u = substr( $user, 0, 50 );
		$u = $this->db->escape($u);

		return $u;		
	}

	//al menos 3 caracteres para la pass
	private function validaPass($pass){
		if( strlen($pass) <= 3 ) throw new Exception("Pass, cantidad de caracteres inválida.");		
		$u = substr( $pass, 0, 50 );
		$u = $this->db->escape($u);

		return $u;			
	}



	public function getConTipoUsuario($id_tipo_usuario) {
		
		$sql = "SELECT * FROM usuarios WHERE id_tipo_usuario=".$id_tipo_usuario;
		$this->db->query($sql);
		return $this->db->fetchAll();

	}







}

?>