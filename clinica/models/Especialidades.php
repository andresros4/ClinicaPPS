<?php 
//models/Especialidades.php

class Especialidades extends Model {

	public function getTodos(){

		$this->db->query("SELECT * from especialidades");
		return $this->db->fetchAll();
	}

	public function getId($id){

		$this->db->query("SELECT * FROM especialidades WHERE id_especialidad=".$id);		

		return $this->db->fetch();
		
	}
	
	// este metodo retorna la configuracion  para que Tools::crearSelectTabla( array() ) genere el select html
	public function getSelectData(){
			
		$this->db->query("SELECT id_especialidad AS id, nombre FROM especialidades");				

		return $this->db->fetchAll();
	}
	
	public function editarEspecialidad($id,$nombre){

		$sql = "UPDATE especialidades SET 
				nombre='$nombre' WHERE id_especialidad=".$id;
	
		return$this->db->query($sql);
		
	}

	public function agregarEspecialidad($nombre){

		
		$sql = "INSERT INTO especialidades  (nombre) VALUES ( '$nombre')";

		if($this->db->query($sql))
			return $this->db->last_id();
		else
			return false;		
		
	}


	public function eliminar($id){		

		$this->db->query( "DELETE from especialidades WHERE id_especialidad=".$id );	
		return  $this->db->fetch();

	}
}
