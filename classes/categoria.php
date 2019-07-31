<?php

	require_once('db_connector.php');

	class categoria extends db_connector
	{
		private $categoria;

		public function __construct()
		{
			$this->db_connection();
		}

		public function set_values($categoria)
		{
			if(!empty($categoria))
			{
				$categoria = $this->input_cleaning($categoria);

				$this->categoria = $categoria;
			}
			else
			{
				$this->error .= 'Ingrese un categoria';

				die($this->error);
			}
		}

		public function save_on_db()
		{
			if(empty($this->error))
			{
				$sentencia = $this->connection->prepare('INSERT INTO categoria_libro
														 VALUES(NULL, :categoria)');

				$sentencia->execute(array(':categoria' => $this->categoria));
				
			}
			else
			{
				die($this->error);
			}
		}

		public function get_all()
		{
			$sentencia = $this->connection->query('SELECT *
												   FROM categoria_libro');

			$datos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

			return $datos;
		}
	}

?>