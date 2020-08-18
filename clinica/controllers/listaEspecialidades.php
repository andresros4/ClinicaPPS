<?php 


require '../fw/fw.php';
require '../models/Especialidades.php';
require '../views/listaEspecialidades.php';



$v = new listaEspecialidades(); //vista
$e = new Especialidades();


if($_SESSION["id_tipo_usuario"] == USER_ADMINISTRADOR) {






$v->especialidades = $e->getTodos();


$v->render();



	} else {
	$v->error('Usted no tiene acceso a esta sección del sistema.');
}


 ?>