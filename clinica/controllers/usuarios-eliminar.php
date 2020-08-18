<?php 


require '../fw/fw.php';
require '../models/Usuarios.php';
require '../views/usuariosEliminar.php';


$v = new usuariosEliminar();

if( isset($_GET["id"]) ){
	
	$u = new Usuarios(); 			
	
	try{
	
		$u->eliminar($_GET["id"]);
	
	}catch(exception $e){
		$v->error("<p>".$e->getMessage().'<a href="home"> Regresar</a></p>');
	}
	
	header("Location: /clinica/listaUsuarios");
	exit;
	
}
	

 ?>