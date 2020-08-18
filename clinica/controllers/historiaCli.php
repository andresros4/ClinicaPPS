<?php 

// controllers/listaMascotasDeCliente.php


require '../fw/fw.php';
require '../views/historiaCli.php';


require '../models/HistoriaClinica.php';
require '../models/HistoriaClinicaDetalle.php';
require '../models/Usuarios.php';

$v = new historiaCli(); //vista

if($_SESSION["id_tipo_usuario"] == USER_ADMINISTRADOR || $_SESSION["id_tipo_usuario"] == USER_DOCTOR ) {

$u = new Usuarios();
$hc = new HistoriaClinica();
$hcd = new HistoriaClinicaDetalle();

if(!isset($_GET["id"])){

$consulta = $u->getConDni($_POST['dni']);

$id_usuario = $consulta['id_usuario'];

try{


$historiaClinica = $hc->getId($id_usuario);

if($historiaClinica){

$idHistoriaClinica = $historiaClinica['id_historia_clinica'];

$v->datos = $hcd->getDatos($idHistoriaClinica);

$v->idUsuario = $id_usuario;
$v->idHistoriaClinica = $idHistoriaClinica;
$v->nombrePaciente = $consulta['nombre'];
$v->apellidoPaciente = $consulta['apellido'];
} else {
	// no tiene historia clinica, hay que crearle una asi despues se la paso a la view, para que a su vez se la pase al agregarDetalle
	try {
		$idHistoriaClinica = $hc->add($id_usuario);
		$v->idUsuario = $id_usuario;
		$v->idHistoriaClinica = $idHistoriaClinica;
		$v->nombrePaciente = $consulta['nombre'];
		$v->apellidoPaciente = $consulta['apellido'];
	}catch(Exception $e){
	$v->error($e->getMessage().'  <a href="buscadorMascotas"> Regresar al buscador</a>');
}
}

} catch(Exception $e){
	$v->error($e->getMessage().'  <a href="buscadorMascotas"> Regresar al buscador</a>');
}



} else {

	$id_usuario = $_GET["id"];
	$consulta = $u->getId($id_usuario);


	$historiaClinica = $hc->getId($id_usuario);

	$idHistoriaClinica = $historiaClinica['id_historia_clinica'];

	$v->datos = $hcd->getDatos($idHistoriaClinica);

	$v->idUsuario = $id_usuario;
	$v->idHistoriaClinica = $idHistoriaClinica;
	$v->nombrePaciente = $consulta['nombre'];
	$v->apellidoPaciente = $consulta['apellido'];
	

	
}

$v->render();



} else {
	$v->error('Usted no tiene acceso a esta sección del sistema.');
}

 ?>
