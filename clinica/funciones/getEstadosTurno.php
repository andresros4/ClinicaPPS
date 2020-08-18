<?php 

/*
	La funcion recibe el estado en el que se encuentra un turno y retorna los posibles estados
	a los que puede pasar en un array(id, nombre)
*/

function getEstadosTurno($estado=""){

		switch ($estado) {
			case TURNO_ASIGNADO:
				return [
						 [ "id" => TURNO_EN_PROGRESO, 	"nombre" =>	"En progreso" ],
						 [ "id" => TURNO_CANCELADO, 	"nombre" =>	"Cancelado" ] 	 
					   ];
				break;
			case TURNO_EN_PROGRESO:
				return [
						 [ "id" => TURNO_EN_PROGRESO, 	"nombre" =>	"En progreso" ],
						 [ "id" => TURNO_CUMPLIDO, 		"nombre" =>	"Cumplido" ]
					   ];
				break;
			case TURNO_CUMPLIDO:
				return [						 
						 [ "id" => TURNO_CUMPLIDO, 		"nombre" =>	"Cumplido" ]
					   ];
				break;
			case TURNO_CANCELADO:
				return [						 
						 [ "id" => TURNO_CANCELADO, 	"nombre" =>	"Cancelado" ]
					   ];
				break;			
			default:
				return [
						 [ "id" => TURNO_EN_PROGRESO, 	"nombre" =>	"En progreso" ]	 
					   ];				
		}	


}

 ?>