<?php 

	require_once('db_connector.php');

	class finanzas extends db_connector
	{
		public function __construct()
		{
			$this->db_connection();
		}

		public function get_all()
		{

			$last_id = $this->get_last_id('finanzas');

			$sentencia = $this->connection->prepare('SELECT *
												   FROM finanzas
												   WHERE id_finanzas = :last_id');

			$sentencia->execute(array(':last_id' => $last_id));

			$datos = $sentencia->fetch();

			return $datos;
		}

		public function save_on_db($entrada,$salida)
		{
			$fecha = $this->get_today_date();

			$datos = $this->get_all();

			$sentencia = $this->connection->prepare('INSERT INTO finanzas
													VALUES(NULL,:entrada,:salida,:activos,:fecha)');


			$sentencia->execute(array(':entrada'	=> $entrada,
									  ':salida'		=> $salida,
									  ':activos'	=> $datos['activos'] + $entrada - $salida,
									  ':fecha'		=> $fecha));
		}

		public function get_activos()
		{
			$last_id = $this->get_last_id('finanzas');

			$sentencia = $this->connection->prepare('SELECT activos
													 FROM finanzas
													 WHERE id_finanzas = :last_id');

			$sentencia->execute(array(':last_id' => $last_id));

			$datos = $sentencia->fetch();

			return $datos['activos'];
		}
	}

?>