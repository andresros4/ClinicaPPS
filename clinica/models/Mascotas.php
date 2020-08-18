<?php 
//models/Empleados.php

class Mascotas extends Model {

	public function getTodos(){

		$this->db->query("SELECT m.id_mascota, m.nombre, m.id_cliente, c.nombre AS nombre_cliente, c.apellido AS apellido_cliente from mascotas AS m
												INNER JOIN clientes AS c
													ON m.id_cliente=c.id_cliente");
		return $this->db->fetchAll();
	}

	public function getId($id){		
		//VALIDAR id
		$this->db->query( "SELECT * FROM mascotas WHERE id_mascota=".$id );

		return $this->db->fetch();

	}
	
	public function getIdRaza($id){	
		// valido el id de la mascota
		$this->db->query("SELECT * FROM mascotas WHERE id_mascota=".$id);
		 if( $this->db->numRows() != 1 ) die("ID mascota ingresado incorrectamente.");	
		

		$this->db->query( "SELECT id_raza FROM mascotas WHERE id_mascota=".$id );

		return $this->db->fetch();

	}


	
	public function add($id_cliente, $nombre, $id_raza, $descripcion, $fecha_nac, $sexo){

	
		if( strlen($nombre) <= 0 ) throw new Exception("Ingresa el nombre de la mascota.");
		$nombre = substr( $nombre, 0, 150 );
		$nombre = $this->db->escape($nombre);
		$nombre = $this->db->escapeWildcards($nombre);

		if(strlen($descripcion) <= 0) throw new Exception("Ingresa una descripcion.");
		$descripcion = substr( $descripcion, 0, 150 );
		$descripcion = $this->db->escape($descripcion);
		$descripcion = $this->db->escapeWildcards($descripcion);

		
		if ($sexo != 'M' && $sexo != 'F') throw new Exception("Sexo ingresado incorrectamente.");

		$fecha  = explode('-', $fecha_nac);
		if (count($fecha) == 3) {
   			 if ( !checkdate($fecha[1], $fecha[2], $fecha[0]) ) {
        		throw new Exception("Fecha inexistente.");
 	  			 } 
		} else {
			throw new Exception("Fecha ingresada incorrectamente.");
		}

		$fechaActual = date('Y-m-d', time()); 

		if($fecha_nac > $fechaActual ) throw new Exception("No podes ingresar una mascota que todavía no nació.");

		// id raza validado en el controller
		// id cliente validado en el controller
		

		$sql = "INSERT INTO mascotas  (nombre,  id_raza, fecha_nac, descripcion, sexo, id_cliente )
					VALUES ( '$nombre', '$id_raza' , '$fecha_nac', '$descripcion',
									'$sexo', '$id_cliente')";

		return $this->db->query($sql);		
		
	}

 	public function getMascotasDeCliente($id_cliente) {

 	$this->db->query("SELECT * FROM mascotas WHERE id_cliente=".$id_cliente);		

	return $this->db->fetchAll();
	}
	
	

	// listado de mascotas segun id_cliente para completar control select html
	public function getSelectDataCliente($id_cliente=0){
			
		
		$this->db->query("SELECT id_mascota AS id, nombre FROM mascotas WHERE id_cliente=".$id_cliente);
		return $this->db->fetchAll();

	}
}

 ?>