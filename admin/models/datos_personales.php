<?php 
	class datos_personales
	{
		static private $connection;

				static public function editar($id_datos_personales,$cod_tipo_documento,$nombre,$apellido,$documento,$direccion, $telefono)
		{
			self::$connection = db_connector::get_connection();
			$sentencia = self::$connection->prepare(
			"UPDATE datos_personales
			SET  
			nombre = :nombre,
			apellido = :apellido,
			documento = :documento,
			direccion = :direccion,
			telefono = :telefono,
			id_tipo_documento = :cod_tipo_documento
			WHERE id_datos_personales = :id
			"
		);
		$result = $sentencia->execute(
			array(
				':nombre'	=>	$nombre,
				':apellido'	=>	$apellido,
				':documento'	=>	$documento,
				':direccion'	=>	$direccion,
				':telefono'	=>	$telefono,
				':cod_tipo_documento'	=>	$cod_tipo_documento,
				':id'			=>	$id_datos_personales
			)
		);
				if(!empty($result))
				{	//si se agrego correctamente regresa un true
					return	TRUE;
				}else{
					return FALSE;
				}
			
		}

				static public function crear($cod_tipo_documento, $nombre, $apellido, $documento, $direccion, $telefono)
		{
			self::$connection = db_connector::get_connection();
			$sentencia = self::$connection->prepare("
			INSERT INTO datos_personales (id_datos_personales, nombre, apellido, id_tipo_documento, documento, telefono, direccion) 
			VALUES (NULL, :nombre , :apellido, :tipo_documento, :documento, :telefono, :direccion)
			");

			$result = $sentencia->execute(
				array(
					':nombre'	=>	$nombre,
						':apellido'	=>	$apellido,
							':documento'	=>	$documento,
								':direccion'	=>	$direccion,
									':telefono'	=>	$telefono,
										':tipo_documento'	=>	$cod_tipo_documento
				)
			);
				if(!empty($result))
				{	//si se agrego correctamente regresa un true
					return self::$connection->lastInsertId();
				}else{
					return FALSE;
				}

		}
	}

 ?>