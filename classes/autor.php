<?php

	require_once('db_connector.php');

	class autor extends db_connector
	{
		private $autor;

		public function __construct()
		{
			$this->db_connection();
		}

		public function set_values($autor)
		{
			if(!empty($autor))
			{
				$autor = $this->input_cleaning($autor);

				$this->autor = $autor;

				return true;
			}
			else
			{
				$this->error .= 'Ingrese un autor';

				die($this->error);

				return false;
			}
		}

		public function save_on_db()
		{
			if(empty($this->error))
			{
				$sentencia = $this->connection->prepare('INSERT INTO autor
														 VALUES(NULL, :autor)');

				$sentencia->execute(array(':autor' => $this->autor));
				
			}
			else
			{
				die($this->error);
			}
		}

		public function get_all()
		{
			$sentencia = $this->connection->query('SELECT *
												   FROM autor');

			$datos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

			return $datos;
		}
	}

?>