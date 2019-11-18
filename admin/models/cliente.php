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

		static public function crear($tipo_de_documento, $cedula, $nombre, $apellido, $direccion, $telefono)
		{
			if(!self::$connection)
			{
				self::$connection = db_connector::get_connection();
			}

			$sentencia = self::$connection->prepare('INSERT INTO cliente (id, tipo_de_documento, documento, nombre, apellido, direccion, telefono ) 
												     VALUES(NULL, :tipo_de_documento, :cedula, :nombre, :apellido, :direccion, :telefono)');

			$resultado = $sentencia->execute(array(
									':tipo_de_documento'	=> $tipo_de_documento,
									  ':cedula'			 	=> $cedula,
									  ':nombre'				=> $nombre,
									  ':apellido'			=> $apellido,
									  ':direccion'			=> $direccion,
									  ':telefono'			=> $telefono));
			return $resultado;
		}
	}

?>