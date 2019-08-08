<?php 
include_once 'db_connector.php';
class Usuarios extends db_connector
{
	public function __construct()
	{
		$this->db_connection();
		//$connection = parent::db_connection()
	}

	public function get_all()
	{
		$query = "SELECT * FROM usuarios ";
		$statement = $this->connection->prepare($query);
		$statement->execute();
		$result = $statement->fetchAll(PDO::FETCH_ASSOC);
		return $result;
	}

	public function get_usuario($id)
	{
			$output = array();
			$sentencia = $this->connection->prepare(
					"SELECT * FROM usuarios 
					WHERE id = '$id' 
					LIMIT 1"
				);
				$sentencia->execute();
				$result = $sentencia->fetchAll();

				return $result;
	}
			


	public function eliminar_usuario($id)
	{
		// Llamamos a la funcion get name para obtener el nombre de la foto a la que pertenece el id para eliminarla
		$image = self::get_image_name($id);
		if(!empty($image))
			{
				//unlink elimina un fichero
				unlink("../uploaded_files/users/" . $image);
			}

			$statement = $this->connection->prepare(
			"DELETE FROM usuarios WHERE id = :id"
			);
			$result = $statement->execute(
			array(
			':id'	=>	$id
			));
				// Si $result fue exitoso es que se elimino
				if(!empty($result))
				{
					echo 'Eliminado correctamente';
				}
				else{
					echo "Error no se pudo eliminar";
				}
	
	}

	public function upload_image()
	{
		if(isset($_FILES["user_image"]))
		{
			$extension = explode('.', $_FILES['user_image']['name']);
			$new_name = rand() . '.' . $extension[1];
			$destination = '../uploaded_files/users/' . $new_name;
			move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);
			return $new_name;
		}
	}

	public function get_image_name($id)
	{
			$sentencia = $this->connection->prepare(
					"SELECT image FROM usuarios 
					WHERE id = '$id' 
					LIMIT 1"
				);
				$sentencia->execute();
				$result = $sentencia->fetchAll();
				foreach($result as $row)
					{
						return 	$row["image"];

					}
	}


}




