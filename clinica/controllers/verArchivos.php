<?php 


require '../fw/fw.php';
require '../models/Usuarios.php';
require '../models/HistoriaClinica.php';
require '../models/HistoriaClinicaDetalle.php';
require '../models/Archivos.php';

require '../views/verArchivos.php';

$v = new verArchivos(); //vista


$id_historia_clinica_detalle = $_GET["id"];
$hc = new HistoriaClinica();
$hcd = new HistoriaClinicaDetalle();
$historiaClinica = $hcd->getHistoriaClinica($id_historia_clinica_detalle);
$usuario = $hc->getIdUsuario($historiaClinica['id_historia_clinica']);
$v->idUsuario = $usuario["id_usuario"];


$lista = array();

$directorio = @opendir('../archivos/'.$id_historia_clinica_detalle.'/');
$i = 0;
while($elemento = readdir($directorio))
{
	if($elemento != '.' && $elemento != '..'){
		$lista[$i] = "<a href='archivos/$id_historia_clinica_detalle/$elemento' target='_blank'>$elemento</a>";
		$i++;
	}
}

$v->datos=$lista;
$v->render();


?>