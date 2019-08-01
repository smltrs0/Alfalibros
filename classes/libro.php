<?php
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

		public function __construct(){
			$this->db_connection();
			//llamamos a la coneccion en el contructor para poder hacer uso de ella atravez de  $this->connection
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
						if($sinopsis){
							$sinopsis = $this->input_cleaning($sinopsis);
							$this->sinopsis = $sinopsis;
										}
					}else{
						if(!($this->check_set_id('autor', $autor))){
							$this->error .= 'El ID del autor no existe.<br>';
																	}
						if(!($this->check_set_id('categoria', $categoria))){
							$this->error .= 'El ID de la categoria no existe.';
						}
						die($this->error);
					}
				}
				else{
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
			else{
				$this->error .= 'Ningun campo debe estar vacio.';
				die($this->error);
			}
		}
		
		public function get_all_libro(){
			$sentencia = $this->connection->query('SELECT *
												   FROM libro
												   INNER JOIN autor
												   ON libro.id_autor = autor.id_autor
												   INNER JOIN categoria
												   ON libro.id_categoria = categoria.id_categoria');
			$datos = $sentencia->fetchAll();
			return $datos;
										}

		public function set_values_info($cantidad, $precio, $file){
			if(!empty($cantidad) && !empty($precio)){
				if(ctype_digit($cantidad) && is_numeric($precio)){
					if(($cantidad > 0) && ($precio > 0)){
						$this->cantidad = $cantidad;
						$this->precio = $precio;
					}else{
						$this->error .= 'La cantidad y el precio deben ser mayores a 0.';
						die($this->error);
						 }
				}else{
					$this->error .= 'La cantidad o el precio son invalidos.';
					die($this->error);
					  }
			}else{
				$this->error .= 'Ningun campo debe estar vacio.';
				die($this->error);
				}
			if(!empty($file['name'])){
				$tipo_de_archivo = $file['type'];
				$this->temp_file = $file['tmp_name'];
				$tamaño_archivo = $file['size'];
				if(($tipo_de_archivo == 'image/jpeg') || ($tipo_de_archivo == 'image/png')){
					if(!($tamaño_archivo > 4000000)){

						// SE ADAPTA LA RUTA Y EL NOMBRE DEL ARCHIVO
						$tipo = explode('/', $tipo_de_archivo);
						$nombre_archivo = $this->random_string(20).'.'.$tipo[1];
						$this->ruta_imagen = 'uploaded_files/img_books/'.$nombre_archivo;
					}
					else{
						$this->error .= 'El archivo supera los 4mb.';
						die($this->error);
						}
				}
				else{
					$this->error .= 'Archivo no soportado.';
					die($this->error);
					}
			}
																	}
		public function save_on_db(){
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
			if(!(is_null($this->ruta_imagen))){
				move_uploaded_file($this->temp_file, '../'.$this->ruta_imagen);
											}					
									}

		public function get_all_info_libro(){
			$sentencia = $this->connection->query('SELECT * FROM libro
					INNER JOIN info_libro ON libro.id_libro = info_libro.id_libro
					INNER JOIN autor ON libro.id_autor = autor.id_autor
					INNER JOIN categoria_libro ON libro.id_categoria = categoria_libro.id');
			
			$datos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
			return $datos;
											}
		public function get_cantidad_inventario(){
			$cantidad = 0;
			$sentencia = $this->connection->query('SELECT cantidad
												   FROM info_libro');
			$datos = $sentencia->fetchAll(PDO::FETCH_ASSOC);
			if($datos){
				foreach ($datos as $key){
					$cantidad += $key['cantidad'];
										}
						}
						return $cantidad;
												}

		public function id_libro($id){
			$sql='SELECT * FROM libro 
			INNER JOIN info_libro ON libro.id_libro = info_libro.id_libro 
			INNER JOIN autor ON libro.id_autor = autor.id_autor
			INNER JOIN categoria_libro ON  libro.id_categoria =categoria_libro.id
			WHERE info_libro.id_libro = :id';
			$stmt = $this->connection->prepare($sql);
			$stmt->execute(['id' => $id]);
			$libro = $stmt->fetch();
			return $libro;
										}
	}

?>