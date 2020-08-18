<?php 


require '../fw/fw.php';
require '../models/Usuarios.php';
require '../models/HistoriaClinica.php';
require '../models/Archivos.php';
require '../models/HistoriaClinicaDetalle.php';
require '../views/agregarHistoriaClinica.php';

$v = new agregarHistoriaClinica(); //vista


$id_doctor = $_SESSION["id_usuario"];

$id_historia_clinica = $_GET["id"];

$hc = new HistoriaClinica();
$a = new Archivos();
$usuario = $hc->getIdUsuario($id_historia_clinica);
$v->idUsuario = $usuario["id_usuario"];

if( isset($_POST["fecha"])){

	if(!isset($_POST["descripcion"])) 	$v->error("Parametro descripcion invalido.");

	
	$hcd = new HistoriaClinicaDetalle();
	if($last_id=$hcd->agregarDetalle( 
		$_POST["fecha"], 
		$_POST["descripcion"],   
		$id_doctor,
		$id_historia_clinica
	)){
				
		$fileCount = count($_FILES['file']['name']);
		for($i = 0 ; $i < $fileCount ; $i++){
			$fileName = $_FILES['file']['name'][$i];
			$a->add($fileName, $last_id);			
					$directorio = '../archivos/'.$last_id; //Declaramos un  variable con la ruta donde guardaremos los archivos

					//Validamos si la ruta de destino existe, en caso de no existir la creamos
					if(!file_exists($directorio)){
						mkdir($directorio, 0777) or die("No se puede crear el directorio de extraccion");	
					}

					$dir=opendir($directorio); //Abrimos el directorio de destino
					$target_path = $directorio.'/'.$fileName; //Indicamos la ruta de destino, así como el nombre del archivo

			//Movemos y validamos que el archivo se haya cargado correctamente
			//El primer campo es el origen y el segundo el destino
					if(move_uploaded_file($_FILES['file']['tmp_name'][$i], $target_path)) {	
						echo "El archivo $fileName se ha almacenado en forma exitosa.<br>";
					} else {	
						echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
					}
			closedir($dir); //Cerramos el directorio de destino

		}

		header( "Location: historiaClinica-".$usuario["id_usuario"]); 
		exit;
	}
	else
		$v->error('Detalle no creado.<a href="buscadorPacientes"> Regresar a buscador.</a>');

} 	

$v->render();


?>