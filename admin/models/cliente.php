<?php

	class cliente
	{
		static private $connection;
		static private $tipo_de_documento;
		static private $cedula;
		static private $nombre;
		static private $apellido;
		static private $direccion;
		static private $telefono = NULL;

		static public function crear($id_datos_personales)
		{
			if(!self::$connection)
			{
				self::$connection = db_connector::get_connection();
			}

			$sentencia = self::$connection->prepare('INSERT INTO cliente (datos_personales ) 
												     VALUES( :id_datos_personales)');

			$resultado = $sentencia->execute(array(
									  ':id_datos_personales'			=> $id_datos_personales));
			return $resultado;
		}

		static public function editar($id, $tipo_de_documento, $cedula, $nombre, $apellido, $direccion, $telefono)
		{
			self::$connection = db_connector::get_connection();
			$sentencia = self::$connection->prepare(
			"UPDATE cliente
			SET 
			id_tipo_de_documento = :id_tipo_de_documento,
			documento = :documento,
			nombre = :nombre,
			apellido = :apellido,
			direccion = :direccion,
			telefono = :telefono
			WHERE id = :id
			"
		);

		try{
			$result = $sentencia->execute(array(':id_tipo_de_documento'	=>	$tipo_de_documento,
												':documento' => $cedula,
												':nombre' => $nombre,
												':apellido'=> $apellido,
												':direccion' => $direccion,
												':telefono' => $telefono,
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
	}

?>