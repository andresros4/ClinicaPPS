	<?php 
	//models/TurnosPrestaciones.php

	class TurnosPrestaciones extends Model {

		
		public function getId($id){

			if(!ctype_digit($id)) die("id_turno no es un numero");
			if($id <= 0) die("id_turno rango invalido");


			$sql = "SELECT t.id_turno, t.fecha, t.id_doctor , t.id_horario, CONCAT(u.apellido, ', ', u.nombre) AS nombre_doctor, et.id_estado_turno, et.nombre AS nombre_estado,  h.nombre AS nombre_horario FROM turnos_prestaciones_medicas AS t LEFT JOIN usuarios u ON t.id_doctor = u.id_usuario LEFT JOIN horarios AS h ON t.id_horario = h.id_horario LEFT JOIN estados_turnos et ON t.id_estado_turno = et.id_estado_turno WHERE t.id_turno =".$id;

			$this->db->query($sql);
			
			return $this->db->fetch();
			
		}

		

		public function agregarTurno($id_cliente,$id_doctor, $fecha, $id_horario,$id_estado_turno){
	


			$sql = "INSERT INTO `turnos_prestaciones_medicas` (`fecha`, `id_horario`, `id_cliente`, `id_estado_turno`, `id_doctor`) 
			VALUES ('$fecha', $id_horario, $id_cliente,  $id_estado_turno, $id_doctor)";
			
			
			if($this->db->query($sql)){
					 $id = $this->db->last_id(); 		//obtengo el ultimo id
					 return $id;
					}			
					else
						return false;
				}




				public function getTodosRangoCliente($desde="", $hasta="", $id_cliente){

					if( empty($desde) ) {

						$sql = "SELECT t.id_turno, DATE_FORMAT(t.fecha, '%d-%m-%Y') AS fecha, t.id_doctor , t.id_horario, CONCAT(u.apellido, ', ', u.nombre) AS nombre_doctor, et.id_estado_turno, et.nombre AS nombre_estado,  h.nombre AS nombre_horario FROM turnos_prestaciones_medicas AS t LEFT JOIN usuarios u ON t.id_doctor = u.id_usuario LEFT JOIN horarios AS h ON t.id_horario = h.id_horario LEFT JOIN estados_turnos et ON t.id_estado_turno = et.id_estado_turno WHERE t.fecha = CURDATE() AND t.id_cliente = '$id_cliente' ORDER BY t.fecha ASC";

					}
					
					else {
						$this->validaFecha($desde);	

						$this->validaFecha($hasta);

						$sql = "SELECT t.id_turno, DATE_FORMAT(t.fecha, '%d-%m-%Y') AS fecha, t.id_doctor , t.id_horario, CONCAT(u.apellido, ', ', u.nombre) AS nombre_doctor, et.id_estado_turno, et.nombre AS nombre_estado,  h.nombre AS nombre_horario FROM turnos_prestaciones_medicas AS t LEFT JOIN usuarios u ON t.id_doctor = u.id_usuario LEFT JOIN horarios AS h ON t.id_horario = h.id_horario LEFT JOIN estados_turnos et ON t.id_estado_turno = et.id_estado_turno WHERE t.fecha BETWEEN '$desde' AND '$hasta' AND t.id_cliente = '$id_cliente' ORDER BY t.fecha ASC";

					}

					$this->db->query($sql);
					return $this->db->fetchAll();
				}

		
				public function getTodosRangoDoctor($id_doc, $desde="", $hasta=""){

					if( empty($desde) ) {
						$sql ="SELECT t.id_turno, DATE_FORMAT(t.fecha, '%d-%m-%Y') AS fecha, t.id_doctor , t.id_horario, CONCAT(u.apellido, ', ', u.nombre) AS nombre_cliente, et.id_estado_turno, et.nombre AS nombre_estado,  h.nombre AS nombre_horario FROM turnos_prestaciones_medicas AS t LEFT JOIN usuarios u ON t.id_cliente = u.id_usuario LEFT JOIN horarios AS h ON t.id_horario = h.id_horario LEFT JOIN estados_turnos et ON t.id_estado_turno = et.id_estado_turno WHERE t.fecha = CURDATE() AND t.id_doctor = '$id_doc' ORDER BY t.fecha ASC";
					}

					else{
						$this->validaFecha($desde);
						$this->validaFecha($hasta);


						$sql="SELECT t.id_turno, DATE_FORMAT(t.fecha, '%d-%m-%Y') AS fecha, t.id_doctor , t.id_horario, CONCAT(u.apellido, ', ', u.nombre) AS nombre_cliente, et.id_estado_turno, et.nombre AS nombre_estado,  h.nombre AS nombre_horario FROM turnos_prestaciones_medicas AS t LEFT JOIN usuarios u ON t.id_cliente = u.id_usuario LEFT JOIN horarios AS h ON t.id_horario = h.id_horario LEFT JOIN estados_turnos et ON t.id_estado_turno = et.id_estado_turno WHERE t.fecha BETWEEN '$desde' AND '$hasta' AND t.id_doctor = '$id_doc' ORDER BY t.fecha ASC";
					}




					$this->db->query($sql);
					return $this->db->fetchAll();
				}


				public function getTodosRangoAdmin($desde="", $hasta=""){

					if( empty($desde) ) {
						$sql = "SELECT t.id_turno, DATE_FORMAT(t.fecha, '%d-%m-%Y') AS fecha, t.id_doctor , t.id_horario, CONCAT(u.apellido, ', ', u.nombre) AS nombre_cliente, et.id_estado_turno, et.nombre AS nombre_estado,  h.nombre AS nombre_horario , CONCAT(us.apellido, ', ', us.nombre) AS nombre_doctor FROM turnos_prestaciones_medicas AS t LEFT JOIN usuarios u ON t.id_cliente = u.id_usuario LEFT JOIN usuarios us ON t.id_doctor = us.id_usuario LEFT JOIN horarios AS h ON t.id_horario = h.id_horario LEFT JOIN estados_turnos et ON t.id_estado_turno = et.id_estado_turno WHERE t.fecha = CURDATE() ORDER BY t.fecha ASC";
					}
					else {
						$this->validaFecha($desde);		
						$this->validaFecha($hasta);	
						$sql="SELECT t.id_turno, DATE_FORMAT(t.fecha, '%d-%m-%Y') AS fecha, t.id_doctor , t.id_horario, CONCAT(u.apellido, ', ', u.nombre) AS nombre_cliente, et.id_estado_turno, et.nombre AS nombre_estado,  h.nombre AS nombre_horario , CONCAT(us.apellido, ', ', us.nombre) AS nombre_doctor FROM turnos_prestaciones_medicas AS t LEFT JOIN usuarios u ON t.id_cliente = u.id_usuario LEFT JOIN usuarios us ON t.id_doctor = us.id_usuario LEFT JOIN horarios AS h ON t.id_horario = h.id_horario LEFT JOIN estados_turnos et ON t.id_estado_turno = et.id_estado_turno WHERE t.fecha BETWEEN '$desde' AND '$hasta' ORDER BY t.fecha ASC";

					}



					$this->db->query($sql);
					return $this->db->fetchAll();
				}


				public function cancelarTurno($id){

					if(!ctype_digit($id)) throw new Exception("id_turno no es un numero.");
					if($id <= 0) 	 	  throw new Exception("id_turno rango invalido.");		
					if(!$this->getId($id)) throw new exception("ID inexistente.");

					return $this->db->query("UPDATE turnos_prestaciones_medicas SET id_estado_turno=".TURNO_CANCELADO." 
						WHERE id_turno=".$id);
				}




		// recibe una fecha y retorna todos los turnos disponibles para ese dia(no asignados, no cumplidos),
		// incluyendo el id_sel si lo recibe como parametro porque es el turno propio en cuestion
				public function getSelectDataFechaDoc($fecha, $doctor, $id_sel=""){

					if(!ctype_digit($doctor)) die("doctor no es un numero.");
					if($doctor <= 0) 	 	   die("doctor rango invalido.");

					$f = explode('-', $fecha);
					if ( count($f) == 3 ){
						if ( !checkdate($f[1], $f[2], $f[0]) )die("Fecha invalida.");
					}else{
						die("Fecha formato invalido.");
					}


					$sql = "SELECT id_horario AS id, nombre FROM horarios
					WHERE id_horario NOT IN 
					(select id_horario from turnos_prestaciones_medicas 
					where fecha = '$fecha' 
					AND (id_estado_turno=".TURNO_ASIGNADO." OR id_estado_turno=".TURNO_CUMPLIDO.") 
					AND id_doctor=$doctor)";

					if(!empty($id_sel))
						$sql .= "OR id_horario=".$id_sel;

					$this->db->query($sql);		

					return $this->db->fetchAll();

				}

				public function editarTurno($id,$estado){


					$sql = "UPDATE turnos_prestaciones_medicas SET 
					id_estado_turno= $estado 

					WHERE id_turno=".$id;

					return$this->db->query($sql);

				}


				private function validaIdEstadoTurno($id){

					if(!ctype_digit($id)) throw new Exception("id_estado_turno no es un numero.");
					if($id <= 0) 	 	  throw new Exception("id_estado_turno rango invalido.");
					if( !$this->db->query("SELECT * FROM estados_turnos WHERE id_estado_turno=".$id) ) 
						throw new Exception("id_estado_turno inexistente.");

				}

				private function validaIdVeterinario($id){

					if(!ctype_digit($id)) throw new Exception("id_veterinario no es un numero.");
					if($id <= 0) 	 	  throw new Exception("id_veterinario rango invalido.");
					if( !$this->db->query("SELECT * FROM usuarios WHERE id_tipo_usuario=2 AND id_usuario=".$id) ) 
						throw new Exception("id_veterinario inexistente.");

				}

				private function validaIdCliente($id){

					if(!ctype_digit($id)) throw new Exception("id_cliente no es un numero.");
					if($id <= 0) 	 	  throw new Exception("id_cliente rango invalido.");
					if( !$this->db->query("SELECT * FROM clientes WHERE id_cliente=".$id) ) 
						throw new Exception("id_cliente inexistente.");

				}


				private function validaIdHorario($id){

					if(!ctype_digit($id)) throw new Exception("id_horario no es un numero.");
					if($id <= 0) 	 	  throw new Exception("id_horario rango invalido.");
					if( !$this->db->query("SELECT * FROM horarios WHERE id_horario=".$id) ) 
						throw new Exception("id_horario inexistente.");

				}

				private function validaFecha($fecha){

					$f = explode('-', $fecha);
					if ( count($f) == 3 ){
						if ( !checkdate($f[1], $f[2], $f[0]) )	throw new Exception("Fecha invalida.");
					}else{
						throw new Exception("Fecha formato invalido.");
					}

				}

			}

			?>