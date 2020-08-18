<?php 
//models/Usuarios.php

class TipoUsuarios extends Model {



//retorna un array con la lista de todos los veterinarios (id_tipo_usuario=2)
	public function getSelectData(){
			
		$this->db->query("SELECT id_tipo_usuario AS id, nombre from  tipo_usuario");
		
		return $this->db->fetchAll();

	}



	}

 ?>