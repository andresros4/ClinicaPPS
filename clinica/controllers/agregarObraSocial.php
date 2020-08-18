<?php 


require '../fw/fw.php';

require '../models/ObrasSociales.php';

require '../views/agregarObraSocial.php';

$v = new agregarObraSocial(); //vista

if($_SESSION["id_tipo_usuario"] == USER_ADMINISTRADOR) {

if(isset($_POST["nombre"])){

		$os = new ObrasSociales();
		if($last_id=$os->agregarObraSocial( 
					$_POST["nombre"], 
				)){
					header( "Location: listaObrasSociales");
					exit;
				  }
		else
			$v->error('Obra social creada.<a href="home"> Regresar a home.</a>');

	}

$v->render();

} else {
	$v->error('Usted no tiene acceso a esta sección del sistema.');
}
 ?>