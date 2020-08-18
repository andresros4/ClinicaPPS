<div class="row justify-content-center">
	<div class="col-6">
		<div class="card">
			<div class="card-header">							
				<h3>Edición de Turno</h3>
			</div>
			<div class="card-body">
				
				<form action="" method="POST" name="form_edit" id="form_edit">                                    

					<div id="id_estado_turno" class="form-group" >
						<label for="id_estado_turno">Estado</label>
						<?php echo $this->select_estados; ?>                    	
					</div>	
					<input type="submit" class="btn btn-primary" value="Guardar">
				</form>
			</div>
		</div>
	</div><!-- END COL-6 -->
</div><!-- END ROW -->