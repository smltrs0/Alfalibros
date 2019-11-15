<?php 

	class usuario
	{
		private $connection;

		private $nombre;
		private $apellido;
		private $cedula;
		private $email;
		private $username;
		private $nivel;
		private $clave;
		private $pregunta;
		private $respuesta;
		private $image = NULL;

		public function set_values($nombre, $apellido, $cedula, $email, $username, $nivel, $clave, $clave_rep, $pregunta, $respuesta, $image = false)
		{
			if(!empty($nombre) && !empty($apellido) && !empty($cedula) && !empty($email) && !empty($username) && !empty($nivel) && !empty($clave) && !empty($pregunta) && !empty($respuesta))
			{
				if(ctype_digit($cedula) && check::email($email) && ctype_digit($nivel) && ctype_digit($pregunta) && check::cleaned_input($clave) && check::cleaned_input($respuesta) && ($clave == $clave_rep))
				{
					if(check::set_id('user_level',$nivel) && check::set_id('pregunta_de_seguridad',$pregunta))
					{
						$this->nombre = cleaning::input($nombre);
						$this->apellido = cleaning::input($apellido);
						$this->cedula = $cedula;
						$this->email = cleaning::input($email);
						$this->username = cleaning::input($username);
						$this->nivel = $nivel;
						$this->clave = $clave;
						$this->pregunta = $pregunta;
						$this->respuesta = $respuesta;

						if($image)
						{
							if(check::image($image))
							{
								$this->image = get::new_file_path('usuario',$image);
							}
							else
							{
								return false;
							}
						}
					}
					else
					{
						return false;
					}

					return true;
				}
			}

			return false;
		}

		public function save_on_db()
		{

		}
	}

?>