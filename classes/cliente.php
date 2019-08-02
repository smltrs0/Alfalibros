<?php 

	require_once('db_connector.php');

	class cliente extends db_connector
	{
		private $tipo_de_documento;
		private $cedula;
		private $nombre;
		private $apellido;
		private $direccion;
		private $telefono = NULL;

		public function __construct()
		{
			$this->db_connection();
		}

		public function set_values($tipo_de_documento, $cedula, $nombre, $apellido, $direccion, $telefono)
		{
			if(!empty($tipo_de_documento) && !empty($cedula) && !empty($nombre) && !empty($apellido) && !empty($direccion))
			{

				if(ctype_digit($tipo_de_documento) && ctype_digit($cedula))
				{
					if(!empty($telefono))
					{
						$this->tipo_de_documento = $this->input_cleaning($tipo_de_documento);
						$this->cedula = $this->input_cleaning($cedula);
						$this->nombre = $this->input_cleaning($nombre);
						$this->apellido = $this->input_cleaning($apellido);
						$this->direccion = $this->input_cleaning($direccion);
						$this->telefono = $this->input_cleaning($telefono);
					}
					else
					{
						$this->tipo_de_documento = $this->input_cleaning($tipo_de_documento);
						$this->cedula = $this->input_cleaning($cedula);
						$this->nombre = $this->input_cleaning($nombre);
						$this->apellido = $this->input_cleaning($apellido);
						$this->direccion = $this->input_cleaning($direccion);
					}

					return true;

				}
				else
				{
					$this->error .= 'La cedula o el tipo de documento es invalido';
					die($this->error);

					return false;
				}

			}
			else
			{
				$this->error .= 'No pueden haber campos vacios.';
				die($this->error);

				return false;
			}
		}

		public function get_all()
		{
			$sentencia = $this->connection->query('SELECT *
												   FROM cliente');

			return $sentencia->fetchAll();
		}

		public function save_on_db()
		{
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