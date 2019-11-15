<?php

	class delete
	{
		static private $connection;

		private function __construct(){}




		static public function cliente($id)
		{
			try {
				// Conexion a la base de datos
			self::$connection = db_connector::get_connection();
			$sentencia = self::$connection->prepare("DELETE FROM `cliente` WHERE id= '$id' LIMIT 1");
			$resultado = $sentencia->execute();
				if ($resultado) {
					return TRUE ;
				}else{
					return FALSE;
				}
			} catch (PDOException $e)
        {
            die($e->getMessage());
        }
			
		}

		static public function autor($id)
		{
			// Conexion a la base de datos
			self::$connection = db_connector::get_connection();
			$sentencia = self::$connection->query("SELECT * FROM `autor` WHERE id_autor= '$id' LIMIT 1");

					return $sentencia->fetch(PDO::FETCH_ASSOC);
		}
		static public function categoria($id)
		{
			// Conexion a la base de datos
			self::$connection = db_connector::get_connection();
			$sentencia = self::$connection->query("SELECT * FROM `categoria_libro` WHERE id_categoria= '$id' LIMIT 1");

					return $sentencia->fetch(PDO::FETCH_ASSOC);
		}


	}

?>