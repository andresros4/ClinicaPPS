<?php 


require '../fw/fw.php';
require '../models/Usuarios.php';
require '../views/listaUsuarios.php';

//$e = new TurnosPrestaciones(); 		//modelo


$v = new listaUsuarios(); //vista
$u = new Usuarios();



if($_SESSION["id_tipo_usuario"] == USER_ADMINISTRADOR) {

if(isset($_POST["id"])){
$id_tipo_usuario = $_POST["id"];


try {	
		$v->usuarios=$u->getConTipoUsuario($id_tipo_usuario);				
		} catch (Exception $e) {
			$v->error($e->getMessage());
		}

}


$v->render();


	} else {
	$v->error('Usted no tiene acceso a esta sección del sistema.');
}

 ?>