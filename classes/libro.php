<?php

	require_once('db_connector.php');

	class libro extends db_connector
	{
		protected $titulo;
		protected $autor;
		protected $categoria;
		protected $fecha_lanzamiento;
		protected $sinopsis = NULL;

		public function __construct()
		{
			$this->db_connection();
		}

		public function set_values_libro($titulo, $autor, $categoria, $fecha_lanzamiento, $sinopsis = false)
		{
			if(!empty($titulo) && !empty($autor) && !empty($categoria) && !empty($fecha_lanzamiento))
			{

				if($this->check_date($fecha_lanzamiento) && ctype_digit($autor) && ctype_digit($categoria))
				{
					if($this->check_set_id('autor', $autor) && $this->check_set_id('categoria', $categoria))
					{
						$titulo = $this->input_cleaning($titulo);

						$this->titulo = $titulo;
						$this->autor = $autor;
						$this->categoria = $categoria;
						$this->fecha_lanzamiento = $fecha_lanzamiento;

						if($sinopsis)
						{
							$sinopsis = $this->input_cleaning($sinopsis);

							$this->sinopsis = $sinopsis;
						}
					}
					else
					{
						if(!($this->check_set_id('autor', $autor)))
						{
							$this->error .= 'El ID del autor no existe.<br>';
						}

						if(!($this->check_set_id('categoria', $categoria)))
						{
							$this->error .= 'El ID de la categoria no existe.';
						}

						die($this->error);
					}
				}
				else
				{
					if($this->check_date($fecha_lanzamiento))
					{
						$this->error .= 'La fecha es invalida.<br>';
					}
					if(ctype_digit($autor))
					{
						$this->error .= 'El id del autor es invalido.<br>';
					}
					if(ctype_digit($categoria))
					{
						$this->error .= 'El id de la categoria es invalido.<br>';
					}

					die($this->error);
				}

			}
			else
			{
				$this->error .= 'Ningun campo debe estar vacio.';
				die($this->error);
			}
		}

		public function get_all_libro()
		{
			$sentencia = $this->connection->query('SELECT *
												   FROM libro
												   INNER JOIN autor
												   ON libro.id_autor = autor.id_autor
												   INNER JOIN categoria
												   ON libro.id_categoria = categoria.id_categoria');

			$datos = $sentencia->fetchAll();

			return $datos;
		}


	}

?>