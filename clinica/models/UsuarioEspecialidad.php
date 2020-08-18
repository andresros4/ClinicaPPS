	<?php 
	
	class UsuarioEspecialidad extends Model {



	public function add($id_usuario, $id_especialidad){

			

			$sql = "INSERT INTO usuario_especialidad  (id_usuario, id_especialidad)	VALUES ( '$id_usuario', '$id_especialidad' )";
				return $this->db->query($sql);
		

		}

	public function getId($id_usuario){



		$this->db->query("SELECT * FROM usuario_especialidad WHERE id_usuario=".$id_usuario);
			return $this->db->fetch();
		

		}


		public function editarEspecialidad($id_usuario, $id_especialidad){
	
		$sql = "UPDATE usuario_especialidad SET 
				id_especialidad='$id_especialidad' 
				WHERE id_usuario=".$id_usuario;
	
			return$this->db->query($sql);
		
	}


	}
	 ?>
