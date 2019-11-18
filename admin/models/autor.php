<?php 

	class autor
	{
		static private $connection;
		static private $id;
		static private $autor;

		static public function crear($autor)
		{
			if(!self::$connection)
			{
				self::$connection = db_connector::get_connection();
			}
			$sentencia = self::$connection->prepare("
			INSERT INTO autor ( autor) 
			VALUES ( :autor)
			");

			$result = $sentencia->execute(
				array(
					':autor'	=>	$autor
				)
			);
				if(!empty($result))
				{	//si se agrego correctamente regresa un true
					return TRUE;
				}else{
					return FALSE;
				}
		}	

		static public function editar($id, $autor)
		{
			self::$connection = db_connector::get_connection();
			$sentencia = self::$connection->prepare(
			"UPDATE autor
			SET 
			autor = :autor 
			WHERE id = :id
			"
		);
		$result = $sentencia->execute(
			array(
				':autor'	=>	$autor,
				':id'			=>	$id
			)
		);
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
						"SELECT * FROM autor 
						WHERE id = '$id' 
						LIMIT 1"
					);
					$sentencia->execute();
					$result = $sentencia->fetchAll();
					return $result;
		}
	}
?>