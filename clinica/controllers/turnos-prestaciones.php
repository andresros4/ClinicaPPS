<?php 

//    ../controllers/turnos-prestaciones.php


require '../fw/fw.php';
require '../models/TurnosPrestaciones.php';
require '../views/turnosPrestacionesLista.php';

$e = new TurnosPrestaciones(); 		//modelo
$v = new turnosPrestacionesLista(); //vista

if(isset($_POST["desde"]) AND isset($_POST["hasta"])){
		
		$v->desde = $_POST["desde"];
		$v->hasta = $_POST["hasta"];
		
		try {
	
			if( $_SESSION["id_tipo_usuario"] == USER_CLIENTE )
				$v->turnos = $e->getTodosRangoCliente( $v->desde , $v->hasta, $_SESSION["id_usuario"] );
			elseif ($_SESSION["id_tipo_usuario"] == USER_DOCTOR) 	//si es un doctor solo puede ver sus turnos
				$v->turnos = $e->getTodosRangoDoctor( $_SESSION["id_usuario"], $v->desde , $v->hasta ); 
			else  // si es admin o secretaria puede ver todos los turnos
				$v->turnos = $e->getTodosRangoAdmin($v->desde , $v->hasta);
		} catch (Exception $e) {
			$v->error($e->getMessage());
		}	

		$v->alertSuccess('Turnos desde '.$v->desde." hasta ".$v->hasta.'.');
		


} else {

	$v->desde = "";
	$v->hasta = "";

		try {
	
			if( $_SESSION["id_tipo_usuario"] == USER_CLIENTE )
				$v->turnos = $e->getTodosRangoCliente( "", "", $_SESSION["id_usuario"] );
			elseif ($_SESSION["id_tipo_usuario"] == USER_DOCTOR) 	//si es un doctor solo puede ver sus turnos
				$v->turnos = $e->getTodosRangoDoctor( $_SESSION["id_usuario"],"",""); 
			else  // si es admin o secretaria puede ver todos los turnos
				$v->turnos = $e->getTodosRangoAdmin();
		} catch (Exception $e) {
			$v->error($e->getMessage());
		}	

		
}
	
$v->render();

 ?>