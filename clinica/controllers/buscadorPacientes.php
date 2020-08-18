<?php 




require '../fw/fw.php';
require '../views/buscadorPacientes.php';

$v = new buscadorPacientes(); //vista


if($_SESSION["id_tipo_usuario"] == USER_ADMINISTRADOR || $_SESSION["id_tipo_usuario"] == USER_DOCTOR ) {

$v->render();

} else {
	$v->error('Usted no tiene acceso a esta sección del sistema.');
}

 ?>