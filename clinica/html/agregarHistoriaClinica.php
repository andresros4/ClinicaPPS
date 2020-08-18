<div class="row justify-content-center">
	<div class="col-6">
		<div class="card">
			<div class="card-header">				
				<h3>Agregar registro a Historia Clínica</h3>
				<p>Los campos con (*) son obligatorios</p>		
			</div>
			<div class="card-body">

				<?php 
	$link = "/clinica/historiaClinica-".$this->idUsuario;
	?>
				
				<form action="" method="POST" name="form_edit" id="form_edit" enctype="multipart/form-data">                                    
		                    
		                    <div class="form-group">
		                        <label for="fecha" >Fecha (*) </label>
		                        <input id="fecha" name="fecha" type="date" class="form-control "  max="<?php echo date( "Y-m-d", strtotime( date("Y-m-d") ) );  ?>"  required  >  	               	                           	
							</div>	
							
							<div class="form-group">
		                        <label for="descripcion" >Descripción (*)</label>
		                        <br/>
		                        <textarea id="descripcion" name="descripcion" rows=5 cols=94 placeholder="Ingresa una descripción" required ></textarea>      	                           	
							</div>	

		                    <div class="form-group">
		                        <label for="file" >Agregar archivo (opcional) </label>
		                          <br/>
		                        <input id='file' name='file[]'  type='file'  multiple >
		                    </div>			
										
							<input type="submit" class="btn btn-primary" value="Guardar">
							                    <?php 
	
	echo "<a href='$link' class='btn btn-primary'>Volver</a>";
	?>
							
		     	</form>
			</div>
		</div>
	</div><!-- END COL-6 -->
</div><!-- END ROW -->