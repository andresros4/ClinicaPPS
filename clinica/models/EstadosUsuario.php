<?php 


class EstadosUsuario extends Model {

	public function getSelectData(){
		
		$this->db->query("SELECT id_estado_usuario AS id, nombre from estados_usuarios");
		return $this->db->fetchAll();

	}
}

 ?>