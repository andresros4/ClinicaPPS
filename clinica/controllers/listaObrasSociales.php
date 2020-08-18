<?php 


require '../fw/fw.php';
require '../models/ObrasSociales.php';
require '../views/listaObrasSociales.php';



$v = new listaObrasSociales(); //vista
$os = new ObrasSociales();


if($_SESSION["id_tipo_usuario"] == USER_ADMINISTRADOR) {


$v->obrasSociales = $os->getTodos();


$v->render();

	} else {
	$v->error('Usted no tiene acceso a esta sección del sistema.');
}


 ?>