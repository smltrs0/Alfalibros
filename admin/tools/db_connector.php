<?php 

	class db_connector
	{
		static private $connection;

		private function __construct(){}

		static private function connection()
		{
			$db_config = require(CONFIG.'database.php');

			try
			{
				self::$connection = new PDO($db_config['driver'].':host='.$db_config['host'].';dbname='.$db_config['dbname'],$db_config['user'],$db_config['password']);
				self::$connection -> exec($db_config['character']);
				// DESABILITAR CUANDO EL SISTEMA ESTE EN PRODUCCION. ACTIVAR SOLO PARA DEPURAR
				self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			} 
			catch (PDOException $e)
			{
				die('ERROR: '.$e->getMessage());
			}

		}

		static public function get_connection()
		{
			if(!self::$connection)
			{
				self::connection();
			}

			return self::$connection;
		}
	}

?>