<?php 
//models/Empleados.php

class Horarios extends Model {

	public function getTodos(){

		$this->db->query("SELECT * from horarios");
		return $this->db->fetchAll();
	}

	public function getId($id){		
		
		$this->db->query( "SELECT * FROM horarios WHERE id_horario=".$id );
		
		return  $this->db->fetch();

	}

	
}

 ?>