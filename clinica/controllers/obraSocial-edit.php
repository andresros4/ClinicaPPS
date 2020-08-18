<?php 

require '../fw/fw.php';
require '../models/ObrasSociales.php';
require '../views/obraSocialEdit.php';

$v = new obraSocialEdit(); //vista
$os = new ObrasSociales;


$id_obra_social = $_GET["id"];

	
$v->datos =  $os->getId($id_obra_social);


if(isset($_POST["nombre"])){

	if($os->editarObraSocial( 
						$id_obra_social,
						$_POST["nombre"], 
					))
				header( "Location: listaObrasSociales"); 
					
		else
			$v->error('Obra social no editada.<a href="listaObrasSociales"> Regresar.</a>');
}

$v->render();



 ?>