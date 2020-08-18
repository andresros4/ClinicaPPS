<?php 
//  fw/fw.php
session_start();

require_once '../fw/Database.php';
require_once '../fw/Model.php';
require_once '../fw/View.php';

if(!isset($_SESSION["id_usuario"])){
	
    header("Location: login");exit;
              
}


define( 'TURNO_ASIGNADO' 	, 1 );
define( 'TURNO_CLIENTE_NO_PRESENTADO' , 2 );
define( 'TURNO_CUMPLIDO' 	, 3 );
define( 'TURNO_CANCELADO' 	, 4 );
define( 'TURNO_DOCTOR_NO_PRESENTADO' 	, 5 );



define( 'USER_CLIENTE', 1 );
define( 'USER_DOCTOR' 	, 2 );
define( 'USER_ADMINISTRADOR' , 3 );
define( 'USER_SECRETARIA' , 4 );


 ?>