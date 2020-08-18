<?php 
//models/HistoriaClinica.php

class HistoriaClinica extends Model {


	public function getId($id_usuario){

		var_dump($id_usuario);

		$sql = "SELECT id_historia_clinica FROM historia_clinica WHERE id_usuario=".$id_usuario;		

		if($this->db->query($sql))
			return $this->db->fetch();
		else
			return false;	
		
	}

	public function getIdUsuario($id_historia_clinica){

		

		$this->db->query("SELECT * FROM historia_clinica WHERE id_historia_clinica=".$id_historia_clinica);		

		return $this->db->fetch();
		
	}
		

	public function add($id_usuario){

		$sql = "INSERT INTO historia_clinica (id_usuario) VALUES ( '$id_usuario')";

		if($this->db->query($sql))
			return $this->db->last_id();
		else
			return false;		
		
	}

}

 ?>