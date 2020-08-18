<div class="row justify-content-center">
	<div class="col-6">
		<div class="card">
			<div class="card-header">							
				<h3>Edición de Obra Social: <?php echo $this->datos["nombre"]; ?></h3>
			</div>
			<div class="card-body">
				
				<form action="" method="POST" name="form_edit" id="form_edit">                                    
		                    
		                    <div class="form-group">
		                        <label for="nombre" >Nombre</label>
		                        <input id="nombre" name="nombre" type="text" class="form-control"  value="<?php echo $this->datos["nombre"] ?>" required >	
		                        <br/>
		                        <input type="submit" class="btn btn-primary" value="Guardar">
		     	</form>
			</div>
		</div>
	</div><!-- END COL-6 -->
</div><!-- END ROW -->