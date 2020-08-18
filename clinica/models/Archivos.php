<?php 
//models/Archivos.php

class Archivos extends Model {

	public function getTodos(){

		$this->db->query("SELECT * from archivos");
		return $this->db->fetchAll();
	}

	public function getId($id){

		$this->db->query("SELECT * FROM archivos WHERE id_archivo=".$id);		

		return $this->db->fetch();
		
	}
	
	public function add($fileName, $id_historia_clinica_detalle){


		$sql = "INSERT INTO archivos (ruta, id_historia_clinica_detalle) VALUES ('$fileName', '$id_historia_clinica_detalle')";
		return $this->db->query($sql);
	}
	

}

 ?>