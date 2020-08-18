	<div class="card">
		<div class="card-header">
			<h3>Historial de Turnos</h3>
			<div class="col-6">
				<form method="post" id="form_filtro">
					<div class="form-group row">
						<label class="col-sm-2 col-form-label" for="desde">Desde</label>    		
						<div class="col-sm-10">
							<input class="form-control form-control-sm" type="date" autocomplete="off" name="desde" id="desde" value="<?php echo $this->desde; ?>" required>
						</div>
						<label class="col-sm-2 col-form-label" for="hasta">Hasta</label>    		
						<div class="col-sm-10">
							<input class="form-control form-control-sm" type="date" autocomplete="off" name="hasta" id="hasta" value="<?php echo $this->hasta; ?>" required >
						</div>
					</div>		    	  			    		
					<input type="submit" class="btn btn-primary mb-2" value="Consultar">
				</form>	    	
				<?php if(!empty($this->info)) echo '<div class="alert alert-success" role="alert">
				'.$this->info.'
				</div>'; ?>
			</div>
		</div>
		<div class="card-body">
			<table class="table table-sm table-striped table-hover table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>Fecha/Hora</th>	
						<?php if( $_SESSION["id_tipo_usuario"] == USER_CLIENTE ){	 ?>		
							<th>Doctor</th>		
							<th>Estado</th>	
							<th>Accion</th>				
						<?php } elseif ($_SESSION["id_tipo_usuario"] == USER_DOCTOR) { ?>
							<th>Paciente</th>	
							<th>Estado</th>	
						<?php } else { ?>
							<th>Doctor</th>
							<th>Paciente</th>	
							<th>Estado</th>		
							<th>Accion</th>	

						<?php } ?>
					</tr>	
				</thead>					
				<tbody>
					<?php 			 
					if( $this->turnos ){
						$filas ="";			
						foreach ($this->turnos as $value) {
							$filas .= "<tr>";				
							$filas .= "<td>".$value["fecha"]." ".$value["nombre_horario"]."</td>";		
							if( $_SESSION["id_tipo_usuario"] == USER_CLIENTE ){		
								$filas .= "<td>".$value["nombre_doctor"]."</td>";
								$filas .= "<td>".$value["nombre_estado"]."</td>";
								
								$fechaTurno = DateTime::createFromFormat('!d-m-Y', $value["fecha"])->getTimestamp();
								$fechaActual = DateTime::createFromFormat('!d-m-Y', date("d-m-Y"))->getTimestamp();
							
								$pasado = 0;
								if ($fechaActual > $fechaTurno)
									$pasado=1;
								$cancelar_des = ($value["id_estado_turno"] == TURNO_ASIGNADO && $pasado == 0)? '' : 'disabled' ;
								$filas .= '<td>
								<button class="btn btn-danger btn-cancel" id_turno="'.$value["id_turno"].'" id="btn-cancel'.$value["id_turno"].'" title="Cancelar Turno" '.$cancelar_des.'><i class="fa fa-times"></i></button>
								</td>';	
							}elseif ($_SESSION["id_tipo_usuario"] == USER_DOCTOR ) {
								$filas .= "<td>".$value["nombre_cliente"]."</td>";		
								$filas .= "<td>".$value["nombre_estado"]."</td>";	
								
							} else {
								$filas .= "<td>".$value["nombre_doctor"]."</td>";
								$filas .= "<td>".$value["nombre_cliente"]."</td>";
								$filas .= "<td>".$value["nombre_estado"]."</td>";
								
								$fechaTurno = DateTime::createFromFormat('!d-m-Y', $value["fecha"])->getTimestamp();
								$fechaActual = DateTime::createFromFormat('!d-m-Y', date("d-m-Y"))->getTimestamp();
								
								$pasado = 0;					
								
								if ($fechaActual > $fechaTurno)								
									$pasado=1;
								
								$cancelar_des = ($value["id_estado_turno"] == TURNO_ASIGNADO && $pasado == 0)? '' : 'disabled' ;

								$filas .= '<td>
								<a class="btn btn-primary btn-edit" href="turnosPrestacionesEdit-'.$value["id_turno"].'" id="btn-edit'.$value["id_turno"].'" title="Editar turno"><i class="fa fa-edit"></i></a>
								<button class="btn btn-danger btn-cancel" id_turno="'.$value["id_turno"].'" id="btn-cancel'.$value["id_turno"].'" title="Cancelar Turno" '.$cancelar_des.'><i class="fa fa-times"></i></button>
								</td>';	

							}
							
							$filas .="</tr>";					
						} 
						echo $filas;
					}else echo '<tr><td>Sin resultados</td></tr>';
					?>
				</tbody>
			</table>
		</div>
	</div>
	<script type="text/javascript">

		$(document).ready(function(){		
			
			$("body").on( "click" , ".btn-cancel" , function(){
				if( confirm("Quieres cancelar el turno #" + $(this).attr("id_turno") + "?" ) )
					window.location.href = "/clinica/turnosPrestacionesCancel-"+$(this).attr("id_turno");            						
			});

		});

	</script>




