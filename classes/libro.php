<?php

	// 
	// 
	// NO
	// MUEVAS
	// LAS 
	// PUTAS
	// FUNCIONES
	// QUE
	// YA
	// FUNCIONAAAN
	// 
	// NI
	// LAS
	// TABLAS
	// DE LA BD
	// PORQUE
	// DESPUES
	// TODO
	// SE
	// VA
	// A
	// LA
	// VERGA
	// MMGV
	// 
	// 


	require_once('db_connector.php');

	class libro extends db_connector{
		protected $titulo;
		protected $autor;
		protected $categoria;
		protected $fecha_lanzamiento;
		protected $sinopsis = NULL;
		protected $cantidad;
		protected $precio;
		protected $ruta_imagen = NULL;
		protected $temp_file;

		public function __construct()
		{
			$this->db_connection();
			//llamamos a la coneccion en el contructor para poder hacer uso de ella atravez de  $this->connection
		}

		public function set_values($titulo, $autor, $categoria, $fecha_lanzamiento, $cantidad, $precio, $sinopsis, $file = false)
		{
			if(!empty($titulo) && !empty($autor) && !empty($categoria) && !empty($fecha_lanzamiento) && !empty($cantidad) && !empty($precio))
			{
				if(ctype_digit($autor) && ctype_digit($categoria) && $this->check_date($fecha_lanzamiento) && ctype_digit($cantidad) && is_numeric($precio))
				{
					if($this->check_set_id('autor',$autor) && $this->check_set_id('categoria', $categoria))
					{
						$this->titulo = $this->input_cleaning($titulo);
						$this->autor = $autor;
						$this->categoria = $categoria;
						$this->fecha_lanzamiento = $fecha_lanzamiento;
						$this->cantidad = $cantidad;
						$this->precio = $precio;

						if(!empty($sinopsis))
						{
							$this->sinopsis = $this->input_cleaning($sinopsis);
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
									$nombre_archivo = $this->random_string(20).'.'.$tipo_de_archivo[1];
									$this->ruta_imagen = 'uploaded_files/img_books/'.$nombre_archivo;
								}
								else
								{
									$this->error .= 'El archivo supera los 4mb.';
									die($this->error);

									return false;
									// PARA PROXIMAS DEPURACIONES ES MEJOR TRABAJAR CON UN RETURN FALSE QUE CON UN DIE QUE CORTA POR COMPLETO LA PAGINA
								}
							}
							else
							{
								$this->error .= 'Archivo no soportado.';
								die($this->error);

								return false;
							}
						}

						return true;

					}
					else
					{
						if(!$this->check_set_id('autor', $autor))
						{
							echo 'el autor no existe';
						}

						if(!$this->check_set_id('categoria', $categoria))
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

		public function get_all()
		{
			$sentencia = $this->connection->query('SELECT *
												   FROM info_libro
												   INNER JOIN libro
												   ON info_libro.id_libro = libro.id_libro
												   INNER JOIN autor
												   ON libro.id_autor = autor.id_autor
												   INNER JOIN categoria_libro
												   ON libro.id_categoria = categoria_libro.id_categoria');
			
			$datos = $sentencia->fetchAll();

			return $datos;
		}

		public function get_cantidad_inventario()
		{
			// $cantidad = 0;
			// $sentencia = $this->connection->query('SELECT cantidad
			// 									   FROM info_libro');
			// $datos = $sentencia->fetch(PDO::FETCH_ASSOC);
			// if($datos){
			// 	foreach ($datos as $key){
			// 		$cantidad += $key['cantidad'];
			// 							}
			// 			}
			// 			return $cantidad;

			$sentencia = $this->connection->query('SELECT SUM(cantidad)
												   FROM info_libro');

			$cantidad = $sentencia->fetch();

			return $cantidad['SUM(cantidad)'];

			// IZI PIZI
		}

		public function id_libro($id)
		{

			$sentencia = $this->connection->prepare('SELECT *
													 FROM info_libro
													 INNER JOIN libro
													 ON info_libro.id_libro = libro.id_libro
													 INNER JOIN autor
													 ON libro.id_autor = autor.id_autor
													 INNER JOIN categoria_libro
													 ON libro.id_categoria = categoria_libro.id_categoria
													 WHERE info_libro.id_info_libro = :id');

			$sentencia->execute(array(':id' => $id));

			$libro = $sentencia->fetch();

			return $libro;
		}
	}
?>