<?php 
//models/Clientes.php

class Clientes extends Model {

	public function getTodos(){

		$this->db->query("SELECT * from clientes");
		return $this->db->fetchAll();
	}

	public function getId($id){

		$this->db->query("SELECT * FROM clientes WHERE id_cliente=".$id);		

		return $this->db->fetch();
		
	}

	public function edit($id, $nombre, $apellido, $dni, $dom, $tel, $email, $id_ciudad){

		$nom = ( strlen($nombre) <= 0 )? $nombre : false ;
		if($nom) die("");
		$nom = substr( $nom, 0, 150 );
		$nom = $this->db->escape($nom);	



		$sql = "UPDATE clientes SET nombre='$nombre', apellido='$apellido', dni='$dni', domicilio='$dom',
									telefono='$tel', email='$email', id_ciudad='$id_ciudad'
				WHERE id_cliente=".$id;

		return $this->db->query($sql);		
		
	}

	//retorna el id si creo correctamente, sino false
	public function add($nombre, $apellido, $dni, $dom, $tel, $email, $id_ciudad){

		$sql = "INSERT INTO clientes  (nombre, apellido, dni, domicilio, telefono, email, id_ciudad )
					VALUES ( '$nombre', '$apellido', '$dni', '$dom',
									'$tel', '$email', '$id_ciudad' )";

		if($this->db->query($sql))
			return $this->db->last_id();
		else
			return false;		
		
	}
	public function getIdConDni($dni){
 	
	 	$this->db->query("SELECT id_cliente FROM clientes WHERE dni=".$dni) ;
		
		if( $this->db->numRows() == 1 ) return $this->db->fetch();
			else throw new Exception("No existe un cliente con ese número de DNI."); 
		
	}

	//retorna array con campos para crear un control select
	public function getSelectData(){
		
		$this->db->query("SELECT id_cliente AS id, CONCAT(apellido, ', ', nombre, ' (Dni-', dni, ')') AS nombre from clientes");
		
		return $this->db->fetchAll();	

	}
	
}

 ?>