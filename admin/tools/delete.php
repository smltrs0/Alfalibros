<?php

	class delete
	{
		static private $connection;

		private function __construct(){}




		static public function eliminar($id,$tabla)
		{
			try {
				// Conexion a la base de datos
			self::$connection = db_connector::get_connection();
			$sentencia = self::$connection->prepare("DELETE FROM `$tabla` WHERE id= '$id' LIMIT 1");
			$sentencia->execute();
			$cuenta = $sentencia->rowCount();
				if ($cuenta > 0) {
					return TRUE ;
				}else{
					return FALSE;
				}
			} catch (PDOException $e)
        {
            die($e->getMessage());
        }
			
		}




	}

?>