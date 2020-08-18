<div class="card">
  <div class="card-header">
    	<h3>Lista de usuarios</h3> 


<div class="col-6">
	    	<form action="" method="POST" name="form_tipoUsuario" id="form_tipoUsuario">
	    		<div class="form-group row">
    
    <label for="id">Tipo de usuario:</label>
    <select id="id" class="form-control form-control-sm " name="id" >
     	<option value="" selected =  "true" disabled>Seleccione...</option>
        <option value="2">Doctor</option>
        <option value="1">Cliente</option>
        <option value="3">Administrador</option>     
        <option value="4">Secretaria</option>  
     </select>
     </div>
     <input type="submit" class="btn btn-primary" value="Consultar">
 </form>
  </div>

  </div>
  <div class="card-body">
    	<table class="table table-sm table-striped table-hover table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>Nombre</th>
					<th>Apellido</th>					
					<th>Usuario</th>									
					<th>Accion</th>
				</tr>	
			</thead>					
			<tbody>
			<?php 				
			if( $this->usuarios ){
				$filas ="";			
				foreach ($this->usuarios as $value) {
					$filas .= "<tr>";				
					$filas .= "<td>".$value["nombre"]."</td>";
					$filas .= "<td>".$value["apellido"]."</td>";
					$filas .= "<td>".$value["user"]."</td>";				
						

					//BOTONES DE ACCION
					$filas .= '<td>
								<a class="btn btn-primary btn-edit" href="usuariosEdit-'.$value["id_usuario"].'-'.$value["id_tipo_usuario"].'" id="btn-edit'.$value["id_usuario"].'" title="Editar usuario"><i class="fa fa-edit"></i></a>
								<button class="btn btn-danger btn-cancel" id_usuario="'.$value["id_usuario"].'" id="btn-cancel'.$value["id_usuario"].'" title="Eliminar usuario"><i class="fa fa-times"></i></button>								
							   </td>';
					$filas .="</tr>";					
				} 
				echo $filas;
			}else echo '<tr><td colspan="7">Sin resultados</td></tr>';
			?>
			</tbody>
		</table>
  </div>
</div>
<script type="text/javascript">
	
	$(document).ready(function(){		
		
		$("body").on( "click" , ".btn-cancel" , function(){
            		if( confirm("Quieres eliminar al usuario #" + $(this).attr("id_usuario") + "?" ) )
            						window.location.href = "controllers/usuarios-eliminar.php?id="+$(this).attr("id_usuario");            						
         });

	});

</script>



	
