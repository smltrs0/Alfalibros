<?php 

	class categoria
	{
		static private $connection;
		static private $id;
		static private $categoria;

		static public function crear($categoria)
		{
			if(!self::$connection)
			{
				self::$connection = db_connector::get_connection();
			}
			$sentencia = self::$connection->prepare("
			INSERT INTO categoria_libro ( categoria) 
			VALUES ( :categoria)
			");

			$result = $sentencia->execute(
				array(
					':categoria'	=>	$categoria
				)
			);
				if(!empty($result))
				{	//si se agrego correctamente regresa un true
					return TRUE;
				}else{
					return FALSE;
				}
		}	

		static public function editar($id, $categoria)
		{
			self::$connection = db_connector::get_connection();
			$sentencia = self::$connection->prepare(
			"UPDATE categoria_libro
			SET 
			categoria = :categoria 
			WHERE id_categoria = :id
			"
		);

		try{
			$result = $sentencia->execute(array(':categoria'	=>	$categoria,
												':id'			=>	$id));

		}catch(PDOException $e){
			return $e->getMessage();
		}
				if(!empty($result))
				{	//si se agrego correctamente regresa un true
					return TRUE;
				}else{
					return FALSE;
				}
			
		}


		static public function id($id)
		{
			if(!self::$connection)
			{
				self::$connection = db_connector::get_connection();
			}
				
				$sentencia = self::$connection->prepare(
						"SELECT * FROM categoria_libro 
						WHERE id_categoria = '$id' 
						LIMIT 1"
					);
					$sentencia->execute();
					$result = $sentencia->fetchAll();
					return $result;
		}
	}
?>