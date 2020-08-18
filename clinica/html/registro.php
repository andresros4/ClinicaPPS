<div class="row justify-content-center">
	<div class="col-6">
		<div class="card">
			<div class="card-header">							
				<h3>Registro</h3>
				<p>Todos los campos son obligatorios</p>		
			</div>
			<div class="card-body">
				
				<form action="" method="POST" name="form_edit" id="form_edit">                                    
		                    
		                    <div class="form-group">
		                        <label for="dni" >DNI </label>
		                        <input id="dni" name="dni" type="text" class="form-control" placeholder="Ingresa tu DNI" required minlength="8" maxlength="8"  >		                     
		                    </div><div class="form-group">
		                        <label for="nombre" >Nombre/s </label>
		                        <input id="nombre" name="nombre" type="text" class="form-control " placeholder="Ingresa tu nombre/s"   required  >  	               	                           	
							</div>	
							<div class="form-group">
		                        <label for="apellido" >Apellido/s </label>
		                        <input id="apellido" name="apellido" type="text" class="form-control " placeholder="Ingresa tu apellido/s"   required  >  	                           	
							</div>	
							<div class="form-group">
		                        <label for="mail" >Mail </label>
		                        <input id="mail" name="mail" type="email" class="form-control " placeholder="Ingresa tu mail"   required  >  	                           	
							</div>	

		                    <div class="form-group">
		                        <label for="telefono" >Telefono </label>
		                        <input id="telefono" name="telefono" placeholder="Ingresa tu telefono" type="textarea" class="form-control " maxlength="20" required >
		                    </div>
		                    <div class="form-group" >
							<label for="id_obra_social">Obra Social</label>
								<?php echo $this->select_obrasSociales; ?>                    	
							</div>	
							 <div class="form-group">
		                        <label for="numAfiliado" >Numero de afiliado </label>
		                        <input id="numAfiliado" name="numAfiliado" placeholder="Ingresa tu numero de afiliado" type="textarea" class="form-control " required >
		                    </div>
		                     <div class="form-group">
		                        <label for="pass" >Contraseña </label>
		                        <input id="pass" name="pass" placeholder="Ingresa una contraseña" type="password" class="form-control " required >
		                    </div>
						
							
										
							<input type="submit" class="btn btn-primary" value="Guardar">
							 <a href="/clinica/login" class="btn btn-primary">Volver</a>
		     	</form>
			</div>
		</div>
	</div><!-- END COL-6 -->
</div><!-- END ROW -->