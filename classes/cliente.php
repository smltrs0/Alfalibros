<?php 

	require_once('db_connector.php');

	class cliente extends db_connector
	{
		private $cedula;
		private $nombre;
		private $apellido;
		private $direccion;
		private $telefono = NULL;

		public function __construct()
		{
			$this->db_connection();
		}

		public function set_values_cliente($cedula, $nombre, $apellido, $direccion, $telefono = false)
		{
			if(!empty($cedula) && !empty($nombre) && !empty($apellido) && !empty($direccion))
			{

				if(ctype_digit($cedula))
				{
					if($telefono)
					{
						$cedula = $this->input_cleaning($cedula);
						$nombre = $this->input_cleaning($nombre);
						$apellido = $this->input_cleaning($apellido);
						$direccion = $this->input_cleaning($direccion);
					}
					else
					{
						$cedula = $this->input_cleaning($cedula);
						$nombre = $this->input_cleaning($nombre);
						$apellido = $this->input_cleaning($apellido);
						$direccion = $this->input_cleaning($direccion);

						$this->cedula = $cedula;
						$this->nombre = $nombre;
						$this->apellido = $apellido;
						$this->direccion = $direccion;
					}

				}
				else
				{
					$this->error .= 'La cedula solo puede albergar valores numericos.';
					die($this->error);
				}

			}
			else
			{
				$this->error .= 'No pueden haber campos vacios.';
				die($this->error);
			}
		}
	}

?>