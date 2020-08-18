<?php 


require '../fw/Model.php';
require '../fw/View.php';
require '../fw/Database.php';
require '../models/Usuarios.php';
require '../models/ObrasSociales.php';
require '../views/registro.php';

$v = new registro(); //vista

if( isset($_POST["nombre"])){
				
		if(!isset($_POST["apellido"])) 	$v->error("Parametro apellido invalido.");
		if(!isset($_POST["dni"])) 		$v->error("Parametro dni invalido.");
		if(!isset($_POST["telefono"])) 	$v->error("Parametro telefono invalido.");
		if(!isset($_POST["numAfiliado"])) 	$v->error("Parametro numero de afiliado invalido.");
		if(!isset($_POST["pass"])) 	$v->error("Parametro contraseña invalido.");			
		if(!isset($_POST["id_obra_social"])) 	$v->error("Parametro obra social invalido.");
		

		$u = new Usuarios();
		try{
		if($last_id=$u->agregarCliente( 
					$_POST["nombre"], 
					$_POST["apellido"], 
					$_POST["dni"], 
					$_POST["telefono"], 
					$_POST["mail"], 
					$_POST["pass"],
					$_POST["id_obra_social"],  
					$_POST["numAfiliado"] 
				)){
					header( "Location: login");
					exit;
				  }
		else
			$v->error('Usuario no creado.<a href="login"> Regresar a login.</a>');
		} catch(Exception $e){
	$v->error($e->getMessage().'  <a href="home"> Regresar</a>');
}

}	

//creamos un select con la funcion crearSelect pidiendole los datos al modelo Ciudades
$v->select_obrasSociales = $v->crearSelect( [
											"datos"  		=> (new ObrasSociales())->getSelectData() ,
									 		"nombre_control"=> "id_obra_social",
										 	"requerido"		=> 1
							    		]
							    	);


$v->render();


 ?>