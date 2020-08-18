<div class="row justify-content-center">
	<div class="col-6">
		<div class="card">
			<div class="card-header">				
				<h3>Agregar usuario al sistema</h3>
				<p>Primero seleccione el tipo de usuario a agregar, luego complete todos los campos</p>		
			</div>
			<div class="card-body">

		                    
<form action="" method="POST" name="form_edit" id="form_edit">
    Tipo de usuario:
    <select id="id" class="form-control form-control-sm " name="id" onChange="mostrar(this.value);">
     	<option value="" selected =  "true" disabled>Seleccione...</option>
        <option value="2">Doctor</option>
        <option value="1">Cliente</option>
        <option value="3">Administrador</option>  
        <option value="4">Secretaria</option>     
     </select>
     <br/>
		

		                 	<div class="form-group" >
								<label for="nombre">Nombre</label>
								<input type="text" name="nombre" id="nombre"  placeholder="Ingresa el nombre." class="form-control" maxlength="200" required >			                    	
							</div>
								<div class="form-group" >
								<label for="apellido">Apellido</label>
								<input type="text" name="apellido" id="apellido" placeholder="Ingresa el apellido." class="form-control" maxlength="200" required >			                    	
							</div>
								<div class="form-group" >
								<label for="dni">DNI</label>
								<input type="text" name="dni" id="dni" placeholder="Ingresa el DNI." class="form-control" maxlength="8" required >			                    	
							</div>

							<div id="especialidades" class="form-group" style="display: none;" >
							<label for="id_especialidad">Especialidad</label>
								<?php echo $this->sel_especialidades; ?>                    	
							</div>	

							<div class="form-group" >
								<label for="email">Email</label>
								<input type="email" name="email" id="email"  placeholder="Ingresa el email." class="form-control"  required >		
							</div>

							<div class="form-group" >
								<label for="telefono">Telefono</label>
								<input type="text" name="telefono" id="telefono"  placeholder="Ingresa el telefono." class="form-control" maxlength="50" minlenght="7"  required >		
							</div>

							<div class="form-group" >
								<label for="usuario">Usuario</label>
								<input type="text" name="usuario" id="usuario" placeholder="Ingresa el usuario." class="form-control"  required >		
							</div>
							    <div class="form-group">
		                        <label for="pass" >Contraseña </label>
		                        <input id="pass" name="pass" placeholder="Ingresa una contraseña." type="password" class="form-control " required >
		                    </div>           

		                    <div id="obraSocial" class="form-group" style="display: none;" >
							<label for="id_obra_social">Obra Social</label>
								<?php echo $this->select_obrasSociales; ?>                    	
							</div>	
							<div id="numeroAfiliado" class="form-group" style="display: none;" >
								<label for="numAfiliado">Numero de afiliado</label>
								<input type="text" name="numAfiliado" id="numAfiliado"  placeholder="Ingresa el numero de afiliado." class="form-control"   >		
							</div>
				
							<input type="submit" class="btn btn-primary" value="Guardar">		
							
		     	</form>
			</div>
		</div>
	</div>
</div>
	
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
function mostrar(id) {
    if (id == "2") {
        $("#especialidades").show();
         $("#especialidades").prop('required');
         $("#obraSocial").hide();
        $("#numeroAfiliado").hide();    
    }

    if (id == "1") {
        $("#obraSocial").show();
        $("#numeroAfiliado").show();    
     	$("#numeroAfiliado").prop('required');
		$("#obraSocial").prop('required');
        $("#especialidades").hide();
    }

    if (id == "3" || id == "4") {
        $("#especialidades").hide();
         $("#obraSocial").hide();
        $("#numeroAfiliado").hide();    
    } 
 }
</script>