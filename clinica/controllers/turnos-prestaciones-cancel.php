<?php 

//    ../controllers/turnos-prestaciones.php


require '../fw/fw.php';
require '../models/TurnosPrestaciones.php';
require '../views/turnosPrestacionesCancel.php';


$v = new turnosPrestacionesCancel(); //vista

if( isset($_GET["id"]) ){
	
	$t = new TurnosPrestaciones(); 		//modelo				
	$turno = $t->getId($_GET["id"]);
	$fechaTurno = date_create($turno["fecha"]);
	$fechaActual = date_create();

	$diferencia = date_diff($fechaActual, $fechaTurno);
	
	if($diferencia->days < 1 ) { // se esta cancelando con menos de 24 hs de anticipacion
		$v->render();
	}	else {

	try{
	
		$t->cancelarTurno($_GET["id"]);
	
	}catch(exception $e){
		$v->error("<p>".$t->getMessage().'<a href="turnosPrestaciones"> Regresar</a></p>');
	}
	

	header("Location: /clinica/turnosPrestaciones");
	exit;
	}


}

if(isset($_POST["cancelar"])){
	
	try{
	
		$t->cancelarTurno($_GET["id"]);
	
	}catch(exception $e){
		$v->error("<p>".$t->getMessage().'<a href="turnosPrestaciones"> Regresar</a></p>');
	}
	

	$v->alertSuccess("<p> Turno cancelado con éxito <a href='turnosPrestaciones'> Regresar</a></p>");
	$v->render();
	exit;
	}


//	$v->info = "Error al cancelar turno.";
//	$v->error();




 ?>