<?php 

	require_once('db_connector.php');

	class forma_de_pago extends db_connector
	{
		public function __construct()
		{
			$this->db_connection();
		}

		public function get_all()
		{
			$sentencia = $this->connection->query('SELECT *
													 FROM forma_de_pago');

			return $sentencia->fetchAll();
		}
	}

?>