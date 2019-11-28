<?php 

	class abastecer
	{
		static private $connection;
		static private $id;
		static private $autor;

		static public function agregar($id_libro, $cantidad, $id_proveedor)
		{
			if(!self::$connection)
			{
				self::$connection = db_connector::get_connection();
			}
			$sentencia = self::$connection->prepare("
			INSERT INTO abastecer (id_abastecer, id_libro, cantidad, id_proveedor) 
			VALUES ( NULL, :id_libro, :cantidad, :id_proveedor)
			");

			$result = $sentencia->execute(
				array(
					':id_libro'	=>	$id_libro,
					':cantidad'	=>	$cantidad,
					':id_proveedor'	=>	$id_proveedor
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
			WHERE id_autor = :id
			"
		);

		try{
			$result = $sentencia->execute(array(':autor'	=>	$autor,
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
						"SELECT * FROM autor 
						WHERE id = '$id' 
						LIMIT 1"
					);
					$sentencia->execute();
					$result = $sentencia->fetchAll();
					return $result;
		}

		static public function get_all()
		{
			// Este condicional lo que se encarga es de verificar si hay una conexión activada para hacer uso de esta y no crear una conexión nueva, abriendo huecos de seguridad.
			if(!self::$connection)
			{
				self::$connection = db_connector::get_connection();
			}
				$sentencia = self::$connection->prepare(
						"SELECT a.id_abastecer, l.id_libro, l.precio, a.cantidad, a.fecha_entrada, l.titulo, a.id_proveedor, p.nombre_comercial, dp.*
							FROM abastecer AS a
							INNER JOIN libro AS l ON a.id_libro = l.id_libro
							INNER JOIN proveedor AS p ON a.id_proveedor = p.id
							INNER JOIN datos_personales AS dp ON p.datos_personales = dp.id_datos_personales"
					);
					$sentencia->execute();
					$result = $sentencia->fetchAll(PDO::FETCH_ASSOC);
					return $result;
		}
	}
?>