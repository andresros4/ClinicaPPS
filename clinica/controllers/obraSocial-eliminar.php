<?php 


require '../fw/fw.php';
require '../models/ObrasSociales.php';
require '../views/obraSocialEliminar.php';


$v = new obraSocialEliminar();

if( isset($_GET["id"]) ){
	
	$os = new ObrasSociales(); 			
	
	try{
		
		$os->eliminar($_GET["id"]);
		
	}catch(exception $e){
		$v->error("<p>".$e->getMessage().'<a href="home"> Regresar</a></p>');
	}
	
	header("Location: /clinica/listaObrasSociales");
	exit;
	
}


?>