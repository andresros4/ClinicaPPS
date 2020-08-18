<?php 

require '../fw/fw.php';
require '../models/Usuarios.php';
require '../models/ObrasSociales.php';
require '../models/Especialidades.php';
require '../models/UsuarioEspecialidad.php';
require '../models/EstadosUsuario.php';
require '../views/usuariosEdit.php';

$v = new usuariosEdit(); //vista


$id_usuario = $_GET["id"];
$id_tipo_usuario = $_GET["tipo"];


// le paso el tipo de usuario al html y creo 3 formularios distintos, hago un if y dependiendo el tipo q le paso muestro ese

$v->idTipoUsuario = $id_tipo_usuario;
$u = new Usuarios();	
$v->datos =  $u->getId($id_usuario);

if ($id_tipo_usuario == 1 ) {
	$v->select_obrasSociales = $v->crearSelect( [
												"datos"  		=> (new ObrasSociales())->getSelectData() ,
											 	"nombre_control"=> "id_obra_social",
										 		"sel"			=>	$v->datos["id_obra_social"],	
											 	"requerido"		=> 1
								    			]
								    		);
} elseif ($id_tipo_usuario == 2) {
	$usuarioEspecialidad = new UsuarioEspecialidad();
	$id_especialidad = $usuarioEspecialidad->getId($id_usuario);
	$v->select_especialidades = $v->crearSelect( [
												"datos"  		=> (new Especialidades())->getSelectData() ,
											 	"nombre_control"=> "id_especialidad",
										 		"sel"			=>	$id_especialidad["id_especialidad"],	
											 	"requerido"		=> 1
								    			]
								    		);

}


if( isset($_POST["nombre"])){

	if ($id_tipo_usuario == 1 ) {

		if(!isset($_POST["nombre"])) 	$v->error("Parametro nombre invalido.");
		if(!isset($_POST["apellido"])) 	$v->error("Parametro apellido invalido.");
		if(!isset($_POST["dni"])) 		$v->error("Parametro dni invalido.");
		if(!isset($_POST["telefono"])) 	$v->error("Parametro telefono invalido.");
		if(!isset($_POST["email"])) 	$v->error("Parametro email invalido.");
		if(!isset($_POST["usuario"])) $v->error("Parametro usuario invalido.");
		if(!isset($_POST["id_obra_social"])) $v->error("Parametro id_obra_social invalido.");
		if(!isset($_POST["numAfiliado"])) $v->error("Parametro numero de afiliado invalido.");
		
		if($u->editarCliente( 
						$id_usuario,
						$_POST["nombre"], 
						$_POST["apellido"], 
						$_POST["dni"], 
						$_POST["telefono"], 
						$_POST["email"], 
						$_POST["usuario"],  
						$_POST["id_obra_social"],
						$_POST["numAfiliado"],
						$_POST["id_estado_usuario"] 
					))
				header( "Location: listaUsuarios"); 
					
		else
			$v->error('Cliente no editado.<a href="listaUsuarios"> Regresar.</a>');

} elseif ($id_tipo_usuario == 2 ) {

		if(!isset($_POST["nombre"])) 	$v->error("Parametro nombre invalido.");
		if(!isset($_POST["apellido"])) 	$v->error("Parametro apellido invalido.");
		if(!isset($_POST["dni"])) 		$v->error("Parametro dni invalido.");
		if(!isset($_POST["telefono"])) 	$v->error("Parametro telefono invalido.");
		if(!isset($_POST["email"])) 	$v->error("Parametro email invalido.");
		if(!isset($_POST["usuario"])) $v->error("Parametro usuario invalido.");
		if(!isset($_POST["id_especialidad"])) $v->error("Parametro especialidad invalido.");
		
		
		if($u->editarDoctor( 
						$id_usuario,
						$_POST["nombre"], 
						$_POST["apellido"], 
						$_POST["dni"], 
						$_POST["telefono"], 
						$_POST["email"], 
						$_POST["usuario"], 
						$_POST["id_estado_usuario"] 
					)){

				$usuarioEspecialidad = new UsuarioEspecialidad();
				try {
				$usuarioEspecialidad->editarEspecialidad($id_usuario, $_POST["id_especialidad"]);
				header( "Location: listaUsuarios");
				} catch(exception $e){
				$v->error("<p>".$e->getMessage().'<a href="listaUsuarios"> Regresar</a></p>');
			}				
		}
		} else {

		if(!isset($_POST["nombre"])) 	$v->error("Parametro nombre invalido.");
		if(!isset($_POST["apellido"])) 	$v->error("Parametro apellido invalido.");
		if(!isset($_POST["dni"])) 		$v->error("Parametro dni invalido.");
		if(!isset($_POST["telefono"])) 	$v->error("Parametro telefono invalido.");
		if(!isset($_POST["email"])) 	$v->error("Parametro email invalido.");
		if(!isset($_POST["usuario"])) $v->error("Parametro usuario invalido.");

		if($u->editarAdmin( 
						$id_usuario,
						$_POST["nombre"], 
						$_POST["apellido"], 
						$_POST["dni"], 
						$_POST["telefono"], 
						$_POST["email"], 
						$_POST["usuario"], 
						$_POST["id_estado_usuario"]  
					))
				header( "Location: listaUsuarios"); 
					
		else
			$v->error('Administrador no editado.<a href="listaUsuarios"> Regresar.</a>');
		

}
}



$v->select_estadoUsuario = $v->crearSelect( [
												"datos"  		=> (new EstadosUsuario())->getSelectData() ,
											 	"nombre_control"=> "id_estado_usuario",
										 		"sel"			=>	$v->datos["id_estado_usuario"],	
											 	"requerido"		=> 1
								    			]
								    		);



$v->render();



// $v->error('Cliente invalido.<a href="clientes"> Regresar a clientes.</a>');

 ?>