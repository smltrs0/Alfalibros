<?php 

	require_once('db_connector.php');

	class tipo_de_documento extends db_connector
	{
		public function __construct()
		{
			$this->db_connection();
		}

		public function get_all()
		{
			$sentencia = $this->connection->query('SELECT *
												   FROM tipo_de_documento');

			$datos = $sentencia->fetchAll();

			return $datos;
		}
	}

?>