<?php 

require '../fw/fw.php';
require '../models/Especialidades.php';
require '../views/especialidadEdit.php';

$v = new especialidadEdit(); //vista
$e = new Especialidades;


$id_especialidad = $_GET["id"];

	
$v->datos =  $e->getId($id_especialidad);


if(isset($_POST["nombre"])){

	if($e->editarEspecialidad( 
						$id_especialidad,
						$_POST["nombre"], 
					))
				header( "Location: listaEspecialidades"); 
					
		else
			$v->error('Especialidad no editada.<a href="listaEspecialidades"> Regresar.</a>');
}

$v->render();



 ?>