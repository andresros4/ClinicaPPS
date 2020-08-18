<?php 


require '../fw/fw.php';
require '../models/Usuarios.php';
require '../models/Especialidades.php';
require '../models/UsuarioEspecialidad.php';

require '../models/ObrasSociales.php';

require '../views/agregarUsuario.php';

$v = new agregarUsuario(); //vista


if($_SESSION["id_tipo_usuario"] == USER_ADMINISTRADOR) {






if(isset($_POST["nombre"])){


$id_tipo_usuario = (isset($_POST["id"]))? $_POST["id"] : "" ; 

if($id_tipo_usuario == 1) { // es cliente

		//validamos que esten todos los campos completos

		if(!isset($_POST["apellido"])) 	$v->error("Parametro apellido invalido.");
		if(!isset($_POST["dni"])) 		$v->error("Parametro dni invalido.");
		if(!isset($_POST["telefono"])) 	$v->error("Parametro telefono invalido.");
		if(!isset($_POST["numAfiliado"])) 	$v->error("Parametro numero de afiliado invalido.");
		if(!isset($_POST["pass"])) 	$v->error("Parametro contraseña invalido.");			
		if(!isset($_POST["id_obra_social"])) 	$v->error("Parametro obra social invalido.");

		//agregamos el usuario
		$u = new Usuarios();
		try {
		if($last_id=$u->agregarCliente( 
					$_POST["nombre"], 
					$_POST["apellido"], 
					$_POST["dni"], 
					$_POST["telefono"], 
					$_POST["email"], 
					$_POST["pass"],
					$_POST["id_obra_social"],  
					$_POST["numAfiliado"]
				)){
					header( "Location: home");
					exit;
				  }
		else
			$v->error('Usuario cliente no creado.<a href="home"> Regresar a home.</a>');
		} catch(Exception $e){
	$v->error($e->getMessage().'  <a href="agregarUsuario"> Regresar</a>');
}

	} elseif ($id_tipo_usuario == 2 ){  // es doctor 


		if(!isset($_POST["apellido"])) 	$v->error("Parametro apellido invalido.");
		if(!isset($_POST["dni"])) 		$v->error("Parametro dni invalido.");
		if(!isset($_POST["telefono"])) 	$v->error("Parametro telefono invalido.");
		if(!isset($_POST["pass"])) 	$v->error("Parametro contraseña invalido.");			
		if(!isset($_POST["usuario"])) 	$v->error("Parametro usuario invalido.");
		if(!isset($_POST["id_especialidad"])) 	$v->error("Parametro especialidad invalido.");

		$u = new Usuarios();
		try {
		if($last_id=$u->agregarUser( 
					$_POST["nombre"], 
					$_POST["apellido"], 
					$_POST["dni"], 
					$_POST["telefono"], 
					$_POST["email"], 
					$_POST["pass"],
					$_POST["usuario"],  
					$id_tipo_usuario
				)){
					//agrego el usuario_especialidad
					$userEspecialidad = new UsuarioEspecialidad();
					$userEspecialidad->add(
							$last_id,
							$_POST["id_especialidad"],  
					);
					header( "Location: home");
					exit;
				  }
		else
			$v->error('Usuario doctor no creado.<a href="home"> Regresar a home.</a>');
} catch(Exception $e){
	$v->error($e->getMessage().'  <a href="agregarUsuario"> Regresar</a>');
}

	} elseif ($id_tipo_usuario == 3 || $id_tipo_usuario == 4){ // es admin o secretaria
		if(!isset($_POST["apellido"])) 	$v->error("Parametro apellido invalido.");
		if(!isset($_POST["dni"])) 		$v->error("Parametro dni invalido.");
		if(!isset($_POST["telefono"])) 	$v->error("Parametro telefono invalido.");
		if(!isset($_POST["pass"])) 	$v->error("Parametro contraseña invalido.");			
		if(!isset($_POST["usuario"])) 	$v->error("Parametro usuario invalido.");
		$u = new Usuarios();
		try {
		if($last_id = $u->agregarUser(
					$_POST["nombre"], 
					$_POST["apellido"], 
					$_POST["dni"], 
					$_POST["telefono"], 
					$_POST["email"], 
					$_POST["pass"],
					$_POST["usuario"],  
					$id_tipo_usuario
		)){
			header( "Location: home");
					exit;
		}
		else
			$v->error('Usuario admin no creado.<a href="home"> Regresar a home.</a>');

	

} catch(Exception $e){
	$v->error($e->getMessage().'  <a href="agregarUsuario"> Regresar</a>');
}



	}	




}

				
$v->sel_especialidades = $v->crearSelect( 
												[
												"datos"  		=> (new Especialidades())->getSelectData()  ,
											 	"nombre_control"=> "id_especialidad",
											 	"sel"			=>	$id_especialidad,	
											 	"requerido"		=> 0
												]
								    		);
								    		

	
$v->select_obrasSociales = $v->crearSelect( [
											"datos"  		=> (new ObrasSociales())->getSelectData() ,
									 		"nombre_control"=> "id_obra_social",
										 	"requerido"		=> 0
							    		]
							    	);




$v->render();



} else {
	$v->error('Usted no tiene acceso a esta sección del sistema.');
}


 ?>