<?php 


require '../fw/fw.php';
require '../models/Especialidades.php';
require '../views/especialidadEliminar.php';


$v = new especialidadEliminar();

if( isset($_GET["id"]) ){
	
	$e = new Especialidades(); 			
	
	try{
	
		$e->eliminar($_GET["id"]);
	
	}catch(exception $e){
		$v->error("<p>".$e->getMessage().'<a href="home"> Regresar</a></p>');
	}
	
	header("Location: /clinica/listaEspecialidades");
	exit;
	
}
	

 ?>