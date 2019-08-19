<?php


	class autor
	{
		private $connection;

		private $autor;

		public function set_values($autor)
		{
			if(!empty($autor))
			{
				$autor = cleaning::input($autor);

				$this->autor = $autor;

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

			$sentencia = $this->connection->prepare('INSERT INTO autor
													 VALUES(NULL, :autor)');

			$sentencia->execute(array(':autor' => $this->autor));
		}
	}

?>