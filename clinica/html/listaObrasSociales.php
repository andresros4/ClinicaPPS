<div class="card">
  <div class="card-header">
    	<h3>Lista de Obras Sociales</h3> 

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
			if( $this->obrasSociales ){
				$filas ="";			
				foreach ($this->obrasSociales as $value) {
					$filas .= "<tr>";				
					$filas .= "<td>".$value["nombre"]."</td>";
					//BOTONES DE ACCION
					$filas .= '<td>
								<a class="btn btn-primary btn-edit" href="obraSocialEdit-'.$value["id_obra_social"].'" id="btn-edit'.$value["id_obra_social"].'" title="Editar obra social"><i class="fa fa-edit"></i></a>
								<button class="btn btn-danger btn-cancel" nombre ="'.$value["nombre"].'"   id_obra_social="'.$value["id_obra_social"].'" id="btn-cancel'.$value["id_obra_social"].'" title="Eliminar obra social"><i class="fa fa-times"></i></button>								
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
            		if( confirm("Quieres eliminar la obra social " + $(this).attr("nombre") + "?" ) )
            						window.location.href = "controllers/obraSocial-eliminar.php?id="+$(this).attr("id_obra_social");            						
         });

	});

</script>



	
