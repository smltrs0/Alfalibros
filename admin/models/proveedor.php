<?php 

	class proveedor
	{
		static private $connection;
		static private $id;
		static private $cod_tipo_documento;
		static private $nombre;
		static private $apellido;
		static private $documento;
		static private $nombre_comercial;
		static private $direccion;
		static private $telefono;


		static public function crear_proveedor($id_datos_personales, $nombre_comercial)
		{
			self::$connection = db_connector::get_connection();
			$sentencia = self::$connection->prepare("
			INSERT INTO proveedor (id, nombre_comercial, datos_personales) 
			VALUES (NULL, :nombre_comercial, :datos_personales)
			");

			$result = $sentencia->execute(
				array(
					':nombre_comercial'	=>	$nombre_comercial,
					':datos_personales'	=>	$id_datos_personales
				)
			);
				if(!empty($result))
				{	//si se agrego correctamente regresa un true
					return TRUE;
				}else{
					return FALSE;
				}

		}	

		static public function editar_proveedor($id,$nombre_comercial)
		{
			self::$connection = db_connector::get_connection();
			$sentencia = self::$connection->prepare(
			"UPDATE proveedor
			SET  
			nombre_comercial = :nombre_comercial
			WHERE id = :id
			"
		);
		$result = $sentencia->execute(
			array(
				':nombre_comercial'	=>	$nombre_comercial,
				':id'			=>	$id
			)
		);
				if(!empty($result))
				{	//si se agrego correctamente regresa un true
					return	TRUE;
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
						"SELECT * FROM proveedor 
                         INNER JOIN datos_personales ON proveedor.datos_personales = datos_personales.id_datos_personales
                         INNER JOIN tipo_de_documento ON datos_personales.id_tipo_documento = tipo_de_documento.id_tipo_de_documento
						WHERE proveedor.id = '$id'"
					);
					$sentencia->execute();
					$result = $sentencia->fetch(PDO::FETCH_ASSOC);

					return $result;
		}
	}
?>