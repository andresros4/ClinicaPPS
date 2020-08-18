<?php 
//models/HistoriaClinicaDetalle.php

class HistoriaClinicaDetalle extends Model {

		
	public function getDatos($id_historia_clinica){

		// va bien pero le falta el nombre del doctor, muestra el id solamente  $this->db->query("SELECT id_usuario,  DATE_FORMAT(fecha, '%d-%m-%Y') AS fecha, descripcion from historia_clinica_detalle WHERE id_historia_clinica=".$id_historia_clinica);

		$sql= "SELECT h.id_historia_clinica_detalle, h.id_usuario,  DATE_FORMAT(h.fecha, '%d-%m-%Y') AS fecha, h.descripcion, CONCAT(u.apellido, ', ', u.nombre) AS nombre_doctor from historia_clinica_detalle h LEFT JOIN usuarios u ON h.id_usuario = u.id_usuario
		 WHERE h.id_historia_clinica=".$id_historia_clinica." ORDER BY h.fecha ASC";


		if($this->db->query($sql))
			return $this->db->fetchAll();
		else
			return false;	
	}


	public function agregarDetalle($fecha, $descripcion, $id_doctor, $id_historia_clinica){

					$sql = "INSERT INTO historia_clinica_detalle (id_historia_clinica, id_usuario, fecha, descripcion) VALUES ($id_historia_clinica, $id_doctor, '$fecha', '$descripcion')";
				if($this->db->query($sql))
			return $this->db->last_id();
		else
			return false;			
		
	}

	public function getHistoriaClinica($id_historia_clinica_detalle){
		$sql = "SELECT * FROM historia_clinica_detalle WHERE id_historia_clinica_detalle=".$id_historia_clinica_detalle;
		$this->db->query($sql);				
		return $this->db->fetch();
		
	}
}

 ?>