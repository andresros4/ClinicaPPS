<div class="card">
  <div class="card-header">
    	<h3>Lista de especialidades</h3> 

  </div>
  <div class="card-body">
    	<table class="table table-sm table-striped table-hover table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>Nombre</th>
					<th>Acción</th>
				</tr>	
			</thead>					
			<tbody>
			<?php 				
			if( $this->especialidades ){
				$filas ="";			
				foreach ($this->especialidades as $value) {
					$filas .= "<tr>";				
					$filas .= "<td>".$value["nombre"]."</td>";
					//BOTONES DE ACCION
					$filas .= '<td>
								<a class="btn btn-primary btn-edit" href="especialidadEdit-'.$value["id_especialidad"].'" id="btn-edit'.$value["id_especialidad"].'" title="Editar especialidad"><i class="fa fa-edit"></i></a>
								<button class="btn btn-danger btn-cancel" nombre ="'.$value["nombre"].'"   id_especialidad="'.$value["id_especialidad"].'" id="btn-cancel'.$value["id_especialidad"].'" title="Eliminar especialidad"><i class="fa fa-times"></i></button>								
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
            		if( confirm("Quieres eliminar la especialidad " + $(this).attr("nombre") + "?" ) )
            						window.location.href = "controllers/especialidad-eliminar.php?id="+$(this).attr("id_especialidad");            						
         });

	});

</script>



	
