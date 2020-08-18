<div class="card">
  <div class="card-header">
  	<?php echo $this->info; ?>	
    	<h3>Historia Clínica de <?php  
    		$paciente = $this->apellidoPaciente . ", ". $this->nombrePaciente;
    		echo $paciente;
    	  ?>   </h3>  
    	 </div>
  <div class="card-body">
    	<table class="table table-sm table-striped table-hover table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>Fecha</th>
					<th>Médico</th>
					<th>Descripción</th>
					<th>Archivos adjuntos</th>
				</tr>	
			</thead>					
			<tbody>
			<?php 	
			$flag = 0;
			if( $this->datos ){
				$flag = 1;
				$fila ="";			
				foreach ($this->datos as $value) {
					$fila = "<tr>";	
					$fila .= "<td>".$value['fecha']."</td>";			
					$fila .= "<td>".$value['nombre_doctor']."</td>";
					$fila .= "<td>".$value['descripcion']."</td>";


						$fila .= "<td> <a href='/clinica/verArchivos-".$value['id_historia_clinica_detalle']. "'>
													Ver 
						</a> </td>";
	
					
							   $fila .="</tr>";
									
					echo $fila;
				} 
				



			}else 
			echo "Sin resultados";
			?>
			</tbody>
		</table>
  </div>
<div class="mx-auto" style="width: 200px;">


	<?php 
	$link = "/clinica/agregarHistoriaClinica-".$this->idHistoriaClinica;
	echo "<a href='$link' class='btn btn-lg btn-primary'>Agregar</a>";

	?>
     
</div>
</div>


	