<?php

	class get
	{
		static private $connection;

		private function __construct(){}

		static public function today_date()
		{
			$fecha = getdate();
			$fecha = $fecha['year'].'-'.$fecha['mon'].'-'.$fecha['mday'];
			return $fecha;
		}

		static public function last_id($table)
		{
			if(!self::$connection)
			{
				self::$connection = db_connector::get_connection();
			}

			switch($table)
			{
				case 'libro':

					$sentencia = self::$connection->query('SELECT MAX(id_libro)
												   		   FROM libro');

					$id_libro = $sentencia->fetch();

					return $id_libro['MAX(id_libro)'];

				break;

				case 'factura':

					$sentencia = self::$connection->query('SELECT MAX(id_factura)
												   		   FROM factura');

					$id_factura = $sentencia->fetch();

					return $id_factura['MAX(id_factura)'];

				break;

				case 'finanzas':

					$sentencia = self::$connection->query('SELECT MAX(id_finanzas)
												   		   FROM finanzas');

					$id_finanzas = $sentencia->fetch();

					return $id_finanzas['MAX(id_finanzas)'];

				break;

				default:

					die('LA TABLA NO EXISTE O NO ESTA CONFIGURADA');

				break;
			}
		}

		static public function random_string($length)
		{
			$key = ''; 
		    $keys = array_merge(range(0, 9), range('a', 'z'));

		    for ($i = 0; $i < $length; $i++)
		    { 
		    	$key .= $keys[array_rand($keys)]; 
	    	} 

		    return $key;
		}

		static public function libro_by_id($id)
		{
			if(!self::$connection)
			{
				self::$connection = db_connector::get_connection();
			}

			$sentencia = self::$connection->prepare('SELECT *
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

		static public function all_items($table)
		{
			if(!self::$connection)
			{
				self::$connection = db_connector::get_connection();
			}

			switch ($table)
			{
				case 'info_libro':

					$sentencia = self::$connection->query('SELECT *
												           FROM info_libro
												           INNER JOIN libro
												           ON info_libro.id_libro = libro.id_libro
												           INNER JOIN autor
												           ON libro.id_autor = autor.id_autor
												           INNER JOIN categoria_libro
												           ON libro.id_categoria = categoria_libro.id_categoria');
			  
					$datos = $sentencia->fetchAll();

					return $datos;
					
				break;

				case 'autor':

					$sentencia = self::$connection->query('SELECT *
												           FROM autor');

					$datos = $sentencia->fetchAll();

					return $datos;

				break;

				case 'categoria':

					$sentencia = self::$connection->query('SELECT *
												           FROM categoria_libro');

					$datos = $sentencia->fetchAll();

					return $datos;

				break;

				case 'cliente':

					$sentencia = self::$connection->query('SELECT *
												           FROM cliente');

					return $sentencia->fetchAll();

				break;

				case 'tipo_de_documento':

					$sentencia = self::$connection->query('SELECT *
												           FROM tipo_de_documento');

					$datos = $sentencia->fetchAll();

					return $datos;

				break;

				case 'factura':

					$sentencia = self::$connection->query('SELECT *
												   		   FROM factura
														   INNER JOIN venta
														   ON factura.id_factura = venta.id_factura
														   INNER JOIN cliente
														   ON factura.id_cliente = cliente.id
														   INNER JOIN forma_de_pago
														   ON factura.cod_formapago = forma_de_pago.id_formapago');

					$datos = $sentencia->fetchAll();

					return $datos;

				break;

				case 'forma_de_pago':

					$sentencia = self::$connection->query('SELECT *
													       FROM forma_de_pago');

					return $sentencia->fetchAll();

				break;

				case 'user_level':

					$sentencia = self::$connection->query('SELECT *
													       FROM user_level');

					return $sentencia->fetchAll();

				break;

				case 'pregunta_de_seguridad':

					$sentencia = self::$connection->query('SELECT *
													       FROM pregunta_de_seguridad');

					return $sentencia->fetchAll();

				break;

				
				default:
					die('tabla '.$table.' no configurada o inexistente');
				break;
			}
		}

		static public function total_items($table)
		{
			if(!self::$connection)
			{
				self::$connection = db_connector::get_connection();
			}

			switch($table)
			{
				case 'info_libro':
					
					$sentencia = self::$connection->query('SELECT SUM(cantidad)
											               FROM info_libro');

					$cantidad = $sentencia->fetch();

					return $cantidad['SUM(cantidad)'];

				break;

				case 'factura':

					$sentencia = self::$connection->query('SELECT COUNT(*)
												     FROM factura');

					$cantidad = $sentencia->fetch();

					return $cantidad['COUNT(*)'];

				break;
				
				default:
					# code...
				break;
			}
		}

		static public function cantidad_libro($id)
		{
			if(!self::$connection)
			{
				self::$connection = db_connector::get_connection();
			}

			$sentencia = self::$connection->prepare('SELECT cantidad
											   FROM info_libro
											   WHERE id_info_libro = :id ');

			$sentencia->execute(array(':id' => $id));

			$cantidad = $sentencia->fetch();

			return $cantidad['cantidad'];
		}

		static public function price_libro($id)
		{
			if(!self::$connection)
			{
				self::$connection = db_connector::get_connection();
			}

			$sentencia = self::$connection->prepare('SELECT precio
											   FROM info_libro
											   WHERE id_info_libro = :id');

			$sentencia->execute(array(':id' => $id));

			$precio = $sentencia->fetch();

			return $precio['precio'];
		}

		static public function total_activos()
		{
			if(!self::$connection)
			{
				self::$connection = db_connector::get_connection();
			}

			$last_id = self::last_id('finanzas');

			$sentencia = self::$connection->prepare('SELECT activos
													 FROM finanzas
													 WHERE id_finanzas = :last_id');

			$sentencia->execute(array(':last_id' => $last_id));

			$datos = $sentencia->fetch();

			return $datos['activos'];
		}

		static public function new_file_path($table, $file)
		{
			if(!self::$connection)
			{
				self::$connection = db_connector::get_connection();
			}

			switch($table)
			{
				case 'usuario':
					
						$extension = explode('.', $file['name']);
						$new_name = self::random_string(20).'.'.$extension[1];
						$destination = USER_IMAGE . $new_name;
						return $destination;

				break;
				
				default:

					die('LA TABLA '.$table.' NO ESTA CONFIGURADA.');

				break;
			}
		}
	}

?>