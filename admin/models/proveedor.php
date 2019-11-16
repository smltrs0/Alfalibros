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


		static public function crear($cod_tipo_documento, $nombre, $apellido, $documento, $nombre_comercial, $direccion, $telefono)
		{
			self::$connection = db_connector::get_connection();
			$sentencia = self::$connection->prepare("
			INSERT INTO proveedor (id, cod_tipo_documento, nombre, apellido, documento, nombre_comercial, direccion, telefono) 
			VALUES (NULL, :cod_tipo_documento, :nombre, :apellido, :documento, :nombre_comercial, :direccion, :telefono)
			");

			$result = $sentencia->execute(
				array(
					':cod_tipo_documento'	=>	$cod_tipo_documento,
					':nombre'	=>	$nombre,
					':apellido'	=>	$apellido,
					':documento'	=>	$documento,
					':nombre_comercial'	=>	$nombre_comercial,
					':direccion'	=>	$direccion,
					':telefono'	=>	$telefono
				)
			);
				if(!empty($result))
				{	//si se agrego correctamente regresa un true
					return TRUE;
				}else{
					return FALSE;
				}

		}	

		static public function editar($id, $cod_tipo_documento, $nombre, $apellido, $documento, $nombre_comercial, $direccion, $telefono)
		{
			self::$connection = db_connector::get_connection();
			$sentencia = self::$connection->prepare(
			"UPDATE proveedor 
			SET 
			cod_tipo_documento = :cod_tipo_documento,
			nombre = :nombre,
			apellido = :apellido, 
			documento = :documento, 
			nombre_comercial = :nombre_comercial,
			direccion = :direccion,
			telefono=:telefono, 
			WHERE id = :id
			"
		);
		$result = $sentencia->execute(
			array(
				':cod_tipo_documento'	=>	$cod_tipo_documento,
				':nombre'	=>	$nombre,
				':apellido'	=>	$apellido,
				':documento'	=>	$documento,
				':nombre_comercial' => $nombre_comercial,
				':direccion'	=>	$direccion,
				':telefono'	=>	$telefono,
				':id'			=>	$id
			)
		);
				if(!empty($result))
				{	//si se agrego correctamente regresa un true
					return TRUE;
				}else{
					return FALSE;
				}
				echo "editar model";
			
		}


		static public function id($id)
		{
			if(!self::$connection)
			{
				self::$connection = db_connector::get_connection();
			}
				
				$sentencia = self::$connection->prepare(
						"SELECT * FROM proveedor 
						WHERE id = '$id' 
						LIMIT 1"
					);
					$sentencia->execute();
					$result = $sentencia->fetch(PDO::FETCH_ASSOC);

					return $result;
		}
	}
?>