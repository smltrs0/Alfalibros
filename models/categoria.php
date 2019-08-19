<?php

	class categoria
	{
		private $connection;

		private $categoria;

		public function set_values($categoria)
		{
			if(!empty($categoria))
			{
				$categoria = $this->input_cleaning($categoria);

				$this->categoria = $categoria;

				return true;
			}
			else
			{
				return false;
			}
		}

		public function save_on_db()
		{
			if(!$this->connection)
			{
				$this->connection = db_connector::get_connection();
			}
			
			$sentencia = $this->connection->prepare('INSERT INTO categoria_libro
													 VALUES(NULL, :categoria)');

			$sentencia->execute(array(':categoria' => $this->categoria));

		}
	}

?>