<?php

	class finanzas
	{
		static private $connection;

		private function __construct(){}

		static public function save_on_db($entrada,$salida)
		{
			if(!self::$connection)
			{
				self::$connection = db_connector::get_connection();
			}

			$fecha = get::today_date();

			$activos = get::total_activos();

			$sentencia = self::$connection->prepare('INSERT INTO finanzas
													 VALUES(NULL,:entrada,:salida,:activos,:fecha)');


			$sentencia->execute(array(':entrada'	=> $entrada,
									  ':salida'		=> $salida,
									  ':activos'	=> $activos + $entrada - $salida,
									  ':fecha'		=> $fecha));
		}
	}

?>