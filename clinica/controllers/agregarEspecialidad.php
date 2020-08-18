<?php 


require '../fw/fw.php';

require '../models/Especialidades.php';

require '../views/agregarEspecialidad.php';

$v = new agregarEspecialidad(); //vista

if($_SESSION["id_tipo_usuario"] == USER_ADMINISTRADOR) {


if(isset($_POST["nombre"])){

		$e = new Especialidades();
		if($last_id=$e->agregarEspecialidad( 
					$_POST["nombre"], 
				)){
					header( "Location: listaEspecialidades");
					exit;
				  }
		else
			$v->error('Especialidad no creada.<a href="home"> Regresar a home.</a>');

	}

$v->render();

} else {
	$v->error('Usted no tiene acceso a esta sección del sistema.');
}


 ?>