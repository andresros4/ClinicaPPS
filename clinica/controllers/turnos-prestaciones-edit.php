<?php 

require '../fw/fw.php';
require '../models/TurnosPrestaciones.php';
require '../models/TurnosEstados.php';
require '../views/turnosPrestacionesEdit.php';

$v = new turnosPrestacionesEdit(); //vista
$t = new TurnosPrestaciones;


$id_turno = $_GET["id"];

	
//$v->datos =  $t->getId($id_turno);

$turno = $t->getId($id_turno);
$v->select_estados = $v->crearSelect( 
			[
				"datos"  		=> (new TurnosEstados())->getSelectData() ,
				"nombre_control"=> "id_estado_turno",
				"sel"			=>	$turno["id_estado_turno"],	
				"requerido"		=> 1
			]
								    		);


if(isset($_POST["id_estado_turno"])){

	if($t->editarTurno( 
						$id_turno,
						$_POST["id_estado_turno"], 
					))
				header( "Location: turnosPrestaciones"); 
					
		else
			$v->error('Turno no editado.<a href="turnosPrestaciones"> Regresar.</a>');
}

$v->render();



 ?>