<div class="card">
  <div class="card-header">	
  	<?php echo $this->info ?>
    	<h3>Lista de archivos adjuntos</h3>
    	<p>Haz click en el nombre del archivo para visualizarlo.</p>  
    	 </div>
  <div class="card-body">
    	<table class="table table-sm table-striped table-hover table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>Archivo</th>				
				</tr>	
			</thead>					
			<tbody>
			<?php 	
			if( $this->datos ){
				$fila ="";			
				foreach ($this->datos as $value) {
					$fila = "<tr>";	
					$fila .= "<td>".$value."</td>";								
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
	$link = "/clinica/historiaClinica-".$this->idUsuario;
	echo "<a href='$link' class='btn btn-lg btn-primary'>Volver</a>";

	?>
     
</div>
</div>

