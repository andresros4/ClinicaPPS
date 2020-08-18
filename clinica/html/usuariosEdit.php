<div class="row justify-content-center">
	<div class="col-6">
		<div class="card">
			<div class="card-header">							
				<h3>Edición de usuario <?php echo $this->datos["apellido"].', '.$this->datos["nombre"]; ?></h3>
			</div>
			<div class="card-body">
				<?php if ($this->idTipoUsuario == 1 ) { // es cliente ?>
					<form action="" method="POST" name="form_edit" id="form_edit">   

						<div class="form-group" >
							<label for="id_estado_usuario">Estado</label>
							<?php echo $this->select_estadoUsuario; ?>                    	
						</div>	                                 
						
						<div class="form-group">
							<label for="nombre" >Nombre</label>
							<input id="nombre" name="nombre" type="text" class="form-control"  value="<?php echo $this->datos["nombre"] ?>" required >		                       
						</div><div class="form-group">
							<label for="apellido" >Apellido</label>
							<input id="apellido" name="apellido" type="text" class="form-control "  value="<?php echo $this->datos["apellido"] ?>"  required  >
						</div><div class="form-group">
							<label for="dni" >DNI</label>
							<input id="dni" name="dni" type="number" class="form-control " value="<?= $this->datos["dni"]; ?>" minlength = "8" maxlength="8" required >
						</div>
						<div class="form-group" >
							<label for="email">Email</label>
							<input type="email" name="email" id="email"  class="form-control" maxlength="200" value="<?= $this->datos["email"]; ?>" required >			                    	
						</div>
						<div class="form-group" >
							<label for="telefono">Telefono</label>
							<input type="number" name="telefono" id="telefono"  class="form-control" value="<?= $this->datos["telefono"]; ?>" required >		
						</div>
						<div class="form-group" >
							<label for="usuario">Usuario</label>
							<input type="text" name="usuario" id="usuario"  class="form-control"  value="<?= $this->datos["user"]; ?>" required >		
						</div>

					<!--		<div class="form-group" >
								<label for="pass">Contraseña</label>
								<input type="password" name="pass" id="pass"   class="form-control" placeholder="Dejar en blanco si no la quieres cambiar."  >		
							</div> -->

							<div class="form-group" >
								<label for="id_obra_social">Obra Social</label>
								<?php echo $this->select_obrasSociales; ?>                    	
							</div>		

							<div class="form-group" >
								<label for="numAfiliado">Numero de Afiliado</label>
								<input type="number" name="numAfiliado" id="numAfiliado"  class="form-control" value="<?= $this->datos["numAfiliado"]; ?>" required >		
							</div>					
							
							<input type="submit" class="btn btn-primary" value="Guardar">
						</form>

					<?php } elseif ($this->idTipoUsuario == 2) { // es doctor ?>

						<form action="" method="POST" name="form_edit" id="form_edit">      


							<div class="form-group" >
								<label for="id_estado_usuario">Estado</label>
								<?php echo $this->select_estadoUsuario; ?>                    	
							</div>	                              
							
							<div class="form-group">
								<label for="nombre" >Nombre</label>
								<input id="nombre" name="nombre" type="text" class="form-control"  value="<?php echo $this->datos["nombre"] ?>" required >		                       
							</div><div class="form-group">
								<label for="apellido" >Apellido</label>
								<input id="apellido" name="apellido" type="text" class="form-control "  value="<?php echo $this->datos["apellido"] ?>"  required  >
							</div><div class="form-group">
								<label for="dni" >DNI</label>
								<input id="dni" name="dni" type="number" class="form-control " value="<?= $this->datos["dni"]; ?>" minlength = "8" maxlength="8" required >
							</div>
							<div class="form-group" >
								<label for="email">Email</label>
								<input type="email" name="email" id="email"  class="form-control" maxlength="200" value="<?= $this->datos["email"]; ?>" required >			                    	
							</div>
							<div class="form-group" >
								<label for="telefono">Telefono</label>
								<input type="number" name="telefono" id="telefono"  class="form-control" value="<?= $this->datos["telefono"]; ?>" required >		
							</div>
							<div class="form-group" >
								<label for="usuario">Usuario</label>
								<input type="text" name="usuario" id="usuario"  class="form-control"  value="<?= $this->datos["user"]; ?>" required >		
							</div>

					<!--		<div class="form-group" >
								<label for="pass">Contraseña</label>
								<input type="password" name="pass" id="pass"   class="form-control" placeholder="Dejar en blanco si no la quieres cambiar."  >		
							</div>  -->

							<div class="form-group" >
								<label for="id_especialidad">Especialidad</label>
								<?php echo $this->select_especialidades; ?>                    	
							</div>					
							
							<input type="submit" class="btn btn-primary" value="Guardar">
						</form>
					<?php } else { // es admin ?>
						<form action="" method="POST" name="form_edit" id="form_edit">      

							<div class="form-group" >
								<label for="id_estado_usuario">Estado</label>
								<?php echo $this->select_estadoUsuario; ?>                    	
							</div>	                              
							
							<div class="form-group">
								<label for="nombre" >Nombre</label>
								<input id="nombre" name="nombre" type="text" class="form-control"  value="<?php echo $this->datos["nombre"] ?>" required >		                       
							</div><div class="form-group">
								<label for="apellido" >Apellido</label>
								<input id="apellido" name="apellido" type="text" class="form-control "  value="<?php echo $this->datos["apellido"] ?>"  required  >
							</div><div class="form-group">
								<label for="dni" >DNI</label>
								<input id="dni" name="dni" type="number" class="form-control " value="<?= $this->datos["dni"]; ?>" minlength = "8" maxlength="8" required >
							</div>
							<div class="form-group" >
								<label for="email">Email</label>
								<input type="email" name="email" id="email"  class="form-control" maxlength="200" value="<?= $this->datos["email"]; ?>" required >			                    	
							</div>
							<div class="form-group" >
								<label for="telefono">Telefono</label>
								<input type="number" name="telefono" id="telefono"  class="form-control" value="<?= $this->datos["telefono"]; ?>" required >		
							</div>
							<div class="form-group" >
								<label for="usuario">Usuario</label>
								<input type="text" name="usuario" id="usuario"  class="form-control"  value="<?= $this->datos["user"]; ?>" required >		
							</div>

					<!--		<div class="form-group" >
								<label for="pass">Contraseña</label>
								<input type="password" name="pass" id="pass"   class="form-control" placeholder="Dejar en blanco si no la quieres cambiar."  >		
							</div>  -->

							<input type="submit" class="btn btn-primary" value="Guardar">
						</form>
					<?php }  ?>


				</div>
			</div>
		</div><!-- END COL-6 -->
</div><!-- END ROW -->