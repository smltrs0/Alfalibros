<?php

	class libro
	{
		private $connection;
		private $titulo;
		private $autor;
		private $categoria;
		private $fecha_lanzamiento;
		private $sinopsis = NULL;
		private $cantidad;
		private $precio;
		private $ruta_imagen = NULL;
		private $temp_file;

		public function set_values($titulo, $autor, $categoria, $fecha_lanzamiento, $cantidad, $precio, $sinopsis, $file = false)
		{
			if(!empty($titulo) && !empty($autor) && !empty($categoria) && !empty($fecha_lanzamiento) && !empty($cantidad) && !empty($precio))
			{
				if(ctype_digit($autor) && ctype_digit($categoria) && check::date($fecha_lanzamiento) && ctype_digit($cantidad) && is_numeric($precio))
				{
					if(check::set_id('autor',$autor) && check::set_id('categoria', $categoria))
					{
						$this->titulo = cleaning::input($titulo);
						$this->autor = cleaning::input($autor);
						$this->categoria = cleaning::input($categoria);
						$this->fecha_lanzamiento = cleaning::input($fecha_lanzamiento);
						$this->cantidad = cleaning::input($cantidad);
						$this->precio = cleaning::input($precio);

						if(!empty($sinopsis))
						{
							$this->sinopsis = cleaning::input($sinopsis);
						}

						if(!empty($file['name']))
						{
							$tipo_de_archivo = $file['type'];
							$this->temp_file = $file['tmp_name'];
							$tamaño_archivo = $file['size'];
							if(($tipo_de_archivo == 'image/jpeg') || ($tipo_de_archivo == 'image/png'))
							{
								if(!($tamaño_archivo > 4000000))
								{
									// SE ADAPTA LA RUTA Y EL NOMBRE DEL ARCHIVO
									$tipo_de_archivo = explode('/', $tipo_de_archivo);
									$nombre_archivo = get::random_string(20).'.'.$tipo_de_archivo[1];
									$this->ruta_imagen = 'uploaded_files/img_books/'.$nombre_archivo;
								}
								else
								{
									return false;
									// PARA PROXIMAS DEPURACIONES ES MEJOR TRABAJAR CON UN RETURN FALSE QUE CON UN DIE QUE CORTA POR COMPLETO LA PAGINA
								}
							}
							else
							{
								return false;
							}
						}

						return true;

					}
					else
					{
						if(!check::set_id('autor', $autor))
						{
							echo 'el autor no existe';
						}

						if(!check::set_id('categoria', $categoria))
						{
							echo 'la categoria no existe';
						}

						return false;
					}
				}
				else
				{
					echo 'ALGUNO DE LOS CAMPOS NO CUMPLE CON LOS PARAMETROS NUMERICOS O DE FECHA';

					return false;
				}
			}
			else
			{
				echo 'ALGUNO DE LOS CAMPOS ESTA VACIO';

				return false;
			}
		}

		public function save_on_db()
		{
			$this->connection = db_connector::get_connection();

			$sentencia = $this->connection->prepare('INSERT INTO libro
													 VALUES(NULL,:titulo,:autor,:categoria,:fecha_lanzamiento,:sinopsis)');

			$sentencia->execute(array(':titulo'				=> $this->titulo,
									  ':autor'				=> $this->autor,
									  ':categoria'			=> $this->categoria,
									  ':fecha_lanzamiento'	=> $this->fecha_lanzamiento,
									  ':sinopsis'			=> $this->sinopsis));

			$sentencia = $this->connection->query('SELECT MAX(id_libro)
												   FROM libro');
			$id_libro = $sentencia->fetch();

			// var_dump($id_libro);

			$sentencia = $this->connection->prepare('INSERT INTO info_libro
													 VALUES(NULL,:libro,:cantidad,:precio,:ruta_imagen)');

			$sentencia->execute(array(':libro'			=> $id_libro['MAX(id_libro)'],
									  ':cantidad'		=> $this->cantidad,
									  ':precio'			=> $this->precio,
									  ':ruta_imagen'	=> $this->ruta_imagen));

			if(!(is_null($this->ruta_imagen)))
			{
				move_uploaded_file($this->temp_file, '../'.$this->ruta_imagen);
			}					
		}
	}
?>