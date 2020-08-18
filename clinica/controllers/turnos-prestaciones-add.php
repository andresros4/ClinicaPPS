<?php 

require '../fw/fw.php';
require '../models/TurnosPrestaciones.php';
require '../models/Horarios.php';

require '../models/Especialidades.php';
require '../models/Doctores.php';
require '../models/TurnosEstados.php';

require '../views/turnosPrestacionesAdd.php';

$v = new turnosPrestacionesAdd(); //vista


$id_cliente = $_SESSION["id_usuario"];
if(isset($_POST["id_horario"])){		
	
	
	//	if(!isset($_POST["fecha"])) 				$v->error("Parametro fecha invalido.");
//		if(!isset($_POST["id_horario"])) 			$v->error("Parametro horario invalido.");
	

	
		$e = new TurnosPrestaciones(); //modelo
		
		try {
			$e->agregarTurno(
				$id_cliente,
				$_POST["id_doctor"],
				$_POST["fecha"], 
				$_POST["id_horario"],										 												
						(string)TURNO_ASIGNADO //ASIGNADO				
					);
			
		} catch (Exception $e) {
			$v->error($e->getMessage());
		}
		
		header("Location: turnosPrestaciones");
		exit;
		
	}
	
	$fecha = (isset($_GET["fecha"]))? $_GET["fecha"] : date("Y-m-d");
	$v->datos += [ "fecha" => $fecha ];
	$id_doctor = (isset($_GET["doc"]))? $_GET["doc"] : "" ; 
	$id_horario = (isset($_GET["hora"]))? $_GET["hora"] : "";
	$id_especialidad = (isset($_GET["esp"]))? $_GET["esp"] : "";
	$v->datos += [ "id_cliente" => $id_cliente ];
	

	if($fecha != "" && $id_doctor != ""){ 
		
		$v->sel_horarios = $v->crearSelect( 
			[
				"datos"  		=> (new TurnosPrestaciones())->getSelectDataFechaDoc($fecha, $id_doctor, $id_horario) ,
				"nombre_control"=> "id_horario",
				"sel"			=>	$id_horario,	
				"requerido"		=> 1
			]
								    		); //selecciona el horario seteado y lista el resto de los disponibles para ese dia para el doctor indicado
	}else
	$v->sel_horarios ="";



	if($id_especialidad != ""){ 												
		
		$v->sel_doctor = $v->crearSelect( 
			[
				"datos"  		=> (new Doctores())->getDoctoresPorEspecialidad($id_especialidad) ,
				"nombre_control"=> "id_doctor",
				"sel"			=>	$id_doctor,	
				"requerido"		=> 1
			]
		); 


	} else {

		$v->sel_doctor = $v->crearSelect( 
			[
				"datos"  		=> (new Doctores())->getSelectData()  ,
				"nombre_control"=> "id_doctor",
				"sel"			=>	$id_doctor,	
				"requerido"		=> 1
			]
		);
	}

	
	$v->sel_especialidades = $v->crearSelect( 
		[
			"datos"  		=> (new Especialidades())->getSelectData()  ,
			"nombre_control"=> "id_especialidad",
			"sel"			=>	$id_especialidad,	
			"requerido"		=> 0
		]
	);
	

	$v->render();
	exit;


	?>