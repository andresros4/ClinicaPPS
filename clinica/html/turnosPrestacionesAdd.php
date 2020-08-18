<div class="row justify-content-center">
	<div class="col-6">
		<div class="card">
			<div class="card-header">
				
				<div class="row">
					<div class="col-1">
							<a class="btn btn-success" href="turnosPrestaciones" title="Regresar"><i class="fa fa-long-arrow-alt-left"></i></a>
					</div>								
					<div class="col-8">
							<h3>Nuevo Turno </h3>				
							<p>Debes seleccionar una fecha y un doctor para conocer los horarios de turno disponibles.</p>
					</div>			
				</div>
			</div>
			<div class="card-body">
				<?php echo $this->info; ?>
				<form action="" method="POST" name="form_edit" id="form_add">                                   
		                    <div class="form-group">
		                        <label for="fecha" >Fecha (*)</label>
		                        <input id="fecha" name="fecha" type="date" class="form-control " placeholder="Selecciona una fecha" value="<?php echo $this->datos["fecha"] ?>"  required min="<?php echo date("Y-m-d"); ?>" max="<?php echo date( "Y-m-d", strtotime( date("Y-m-d")." +3 month" ) );  ?>" >
		                        <input id="fecha_actual" name="fecha_actual" type="hidden" value="" >
		            
		                    </div>

		                      <div class="form-group">
		                        <label for="id_especialidad" >Especialidad (*)</label>
		                        <?php echo $this->sel_especialidades; ?>		                        
		                    </div>	

		                    <div class="form-group">
		                        <label for="id_doctor" >Doctor (*)</label>
		                        <?php echo $this->sel_doctor; ?>		                        
		                    </div>	
		                   
		                    <div class="form-group">
		                        <label for="id_horario" >Horarios disponibles (*)</label>
		                        <?php echo $this->sel_horarios; ?>
		                    </div>
		                    		
							   
							</div>		                    
		                   		                    										
							
							<input type="submit" class="btn btn-primary" value="Guardar">
		     	</form>
			</div>
		</div>
	</div><!-- END COL-6 -->
</div><!-- END ROW -->
<script type="text/javascript">
	

	$(document).ready(function(){
		 $("body").on( "change" , "#fecha, #id_doctor, #id_especialidad" , function(){
		 	var param="";
		 	var actualizar = false;




		 	if( $("#fecha").val() !="" && $("#id_doctor").val() !="" )	{
		 		param = "fecha="+$("#fecha").val()+"&doc="+$("#id_doctor").val();
		 		
		 		if( $("#id_horario").val() != null && $("#id_horario").val() != "")
		 				param = param+"&hora="+$("#id_horario").val();		 			 			
		 		
		 		actualizar = true;
		 	}

		 	if( $("#id_especialidad").val() !="" )
		 			if(true)
		 			{
		 		param = param+"&esp="+$("#id_especialidad").val();	
		 		actualizar = true;		 			
		 		
		 	}
		 	if(actualizar)
		 		window.location.href = "turnosPrestacionesAdd?" + param;            						
		 });
		       						
	});

</script>
