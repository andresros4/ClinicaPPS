<?php 
//  models/TurnosEstados.php

class TurnosEstados extends Model {

	public function getTodos(){

		$this->db->query("SELECT * from estados_turnos");
		return $this->db->fetchAll();
	}

	public function getId($id){		
		
		if(!ctype_digit($id)) die("id_estado_turno no es un numero.");
		if($id <= 0) 	 	  die("id_estado_turno rango invalido.");

		$this->db->query( "SELECT * FROM estados_turnos WHERE id_estado_turno=".$id );
		
		return  $this->db->fetch();

	}

	public function getSelectData(){
		
		$this->db->query("SELECT id_estado_turno AS id, nombre from estados_turnos");
		return $this->db->fetchAll();

	}
}

 ?>