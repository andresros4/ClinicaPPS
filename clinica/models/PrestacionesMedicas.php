<?php 
//models/PrestacionesMedicas.php

class PrestacionesMedicas extends Model {

	public function getTodos(){

		$this->db->query("SELECT * from prestaciones_medicas");
		return $this->db->fetchAll();
	}

	public function getId($id){		
			
				
		$this->db->query( "SELECT * FROM prestaciones_medicas WHERE id_prestacion_medica=".$id );
		
		return  $this->db->fetch();

	}

	public function getSelectData(){
		
		$this->db->query("SELECT id_prestacion_medica AS id, CONCAT(nombre, ' [$', precio_venta, ']') AS nombre 
							FROM prestaciones_medicas");
		return $this->db->fetchAll();
	}



	public function getNombreDePrestacion($id_prestacion_medica) {
		$this->db->query("SELECT nombre FROM prestaciones_medicas WHERE id_prestacion_medica=".$id_prestacion_medica);
		return $this->db->fetch();
	}
}
 ?>