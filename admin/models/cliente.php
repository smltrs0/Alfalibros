<?php

	class cliente
	{
		private $connection;

		private $tipo_de_documento;
		private $cedula;
		private $nombre;
		private $apellido;
		private $direccion;
		private $telefono = NULL;

		public function set_values($tipo_de_documento, $cedula, $nombre, $apellido, $direccion, $telefono)
		{
			if(!empty($tipo_de_documento) && !empty($cedula) && !empty($nombre) && !empty($apellido) && !empty($direccion))
			{

				if(ctype_digit($tipo_de_documento) && ctype_digit($cedula))
				{
					if(!empty($telefono))
					{
						$this->tipo_de_documento = cleaning::input($tipo_de_documento);
						$this->cedula = cleaning::input($cedula);
						$this->nombre = cleaning::input($nombre);
						$this->apellido = cleaning::input($apellido);
						$this->direccion = cleaning::input($direccion);
						$this->telefono = cleaning::input($telefono);
					}
					else
					{
						$this->tipo_de_documento = cleaning::input($tipo_de_documento);
						$this->cedula = cleaning::input($cedula);
						$this->nombre = cleaning::input($nombre);
						$this->apellido = cleaning::input($apellido);
						$this->direccion = cleaning::input($direccion);
					}

					return true;

				}
				else
				{
					return false;
				}

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

			$sentencia = $this->connection->prepare('INSERT INTO cliente
												     VALUES(NULL, :tipo_de_documento, :cedula, :nombre, :apellido, :direccion, :telefono)');

			$sentencia->execute(array(':tipo_de_documento'	=> $this->tipo_de_documento,
									  ':cedula'			 	=> $this->cedula,
									  ':nombre'				=> $this->nombre,
									  ':apellido'			=> $this->apellido,
									  ':direccion'			=> $this->direccion,
									  ':telefono'			=> $this->telefono));
		}
	}

?>