<div class="row justify-content-center">
	<div class="col-6">
		<div class="card">
			<div class="card-header">							
				Buscador de Clientes
			</div>
			<div class="card-body">
				
				<form action="/clinica/historiaClinica" method="POST" name="buscador" id="buscador">                                    
		                    
		                    <div class="form-group">
		                        <label for="dni" >Dni del Cliente</label>
		                        <input id="dni" name="dni" type="text" class="form-control" placeholder="Ingrese DNI del cliente a buscar"  required>	
		                        <br/>
							 </div>
							<input type="submit" class="btn btn-primary" value="Buscar" >
		     	</form>
			</div>
		</div>
	</div><!-- END COL-6 -->
</div><!-- END ROW -->