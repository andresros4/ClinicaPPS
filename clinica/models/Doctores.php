<?php 
//models/Veterinarios.php

class Doctores extends Model {

	public function getTodos(){

		$this->db->query("SELECT * from  usuarios WHERE id_tipo_usuario=2");
		
		return $this->db->fetchAll();
	}

	public function getId($id){		
		
		$this->db->query( "SELECT * from  usuarios
							WHERE id_usuario=".$id );
		
		return  $this->db->fetch();

	}

	//retorna un array con la lista de todos los veterinarios (id_tipo_usuario=2)
	public function getSelectData(){
			
		$this->db->query("SELECT id_usuario AS id, CONCAT(apellido, ', ', nombre) AS nombre  from  usuarios WHERE id_tipo_usuario=2");
		
		return $this->db->fetchAll();

	}

	public function getDoctoresPorEspecialidad($id_especialidad){  // crea el select de todos los veterinarios segun la especialidad pasada por parametro

			
			if($id_especialidad <= 0) 	 	   die("especialidad rango invalido.");

			$sql = "SELECT id_usuario AS id, CONCAT(apellido, ', ', nombre) AS nombre FROM usuarios
										WHERE id_usuario IN 
										(select id_usuario from usuario_especialidad 
												where id_especialidad = '$id_especialidad')";

		

			$this->db->query($sql);		

			return $this->db->fetchAll();


	}








}

 ?>