<?php 
//models/ObrasSociales.php

class ObrasSociales extends Model {

	public function getId($id){		

		$this->db->query( "SELECT * from  obras_sociales
							WHERE id_obra_social=".$id );
		
		return  $this->db->fetch();

	}
	public function getTodos(){

		$this->db->query("SELECT * from obras_sociales");
		return $this->db->fetchAll();
	}
	
	// este metodo retorna la configuracion  para que Tools::crearSelectTabla( array() ) genere el select html
	public function getSelectData(){
			
		$this->db->query("SELECT id_obra_social AS id, nombre FROM obras_sociales");				

		return $this->db->fetchAll();
	}
	
	public function editarObraSocial($id,$nombre){

		$sql = "UPDATE obras_sociales SET 
				nombre='$nombre' WHERE id_obra_social=".$id;
	
		return$this->db->query($sql);
		
	}

	public function eliminar($id){		

		$this->db->query( "DELETE from obras_sociales WHERE id_obra_social=".$id );	
		return  $this->db->fetch();

	}


	public function agregarObraSocial($nombre){

		
		$sql = "INSERT INTO obras_sociales  (nombre) VALUES ( '$nombre')";

		if($this->db->query($sql))
			return $this->db->last_id();
		else
			return false;		
		
	}

}

 ?>