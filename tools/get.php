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

			$libro = $sentencia->fetch(PDO::FETCH_ASSOC);

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

					die('LA TABLA'.$table.' NO ESTA CONFIGURADA.');

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

		static public function split_month($date)
		{
			$month = explode('-', $date);

			return $month[1];
		}

		static public function split_year($date)
		{
			$year = explode('-', $date);

			return $year[0];
		}

		static public function last_date_from($table)
		{
			if(!self::$connection)
			{
				self::$connection = db_connector::get_connection();
			}

			switch($table)
			{
				case 'finanzas':
					
					$sentencia = self::$connection->query('SELECT MAX(fecha)
														     FROM finanzas');

					$fecha = $sentencia->fetch();

					return $fecha['MAX(fecha)'];

				break;
				
				default:
					
					die('LA TABLA'.$table.' NO ESTA CONFIGURADA.');

				break;
			}
		}

		static public function month_lenght($date)
		{
			return date('t', strtotime($date));
		}

		static public function values_dashboard_graphic()
		{
			$año_actual = self::split_year(self::today_date());
			$año_ultima_venta = self::split_year(self::last_date_from('finanzas'));

			if($año_actual == $año_ultima_venta)
			{
				$fecha_actual = self::today_date();
				$fecha_ultima_venta = self::last_date_from('finanzas');

				if(self::split_month($fecha_actual) >= self::split_month($fecha_ultima_venta))
				{
					if(!self::$connection)
					{
						self::$connection = db_connector::get_connection();
					}

					for ($i= 1; $i <= self::split_month($fecha_ultima_venta); $i++)
					{
						if($i == self::split_month($fecha_ultima_venta))
						{
							$fin_mes = $fecha_ultima_venta;
						}
						else
						{
							$fin_mes = $año_ultima_venta.'-'.$i.'-'.self::month_lenght($año_ultima_venta.'-'.$i.'-1');
						}

						$inicio_mes = $año_ultima_venta.'-'.$i.'-1';

						$sentencia = self::$connection->prepare('SELECT SUM(activos)
																 FROM finanzas
																 WHERE fecha BETWEEN CAST(:inicio_mes AS DATE) AND CAST(:fin_mes AS DATE)');

						$sentencia->execute(array(':inicio_mes'	=> $inicio_mes,
												  ':fin_mes'	=> $fin_mes));

						$sumatoria_por_mes = $sentencia->fetch();

						$values[$i] = round($sumatoria_por_mes['SUM(activos)'], 2);

					}

					// BUCLE SIMPLEMENTE PARA COMPLETAR EL ARREGLO A LOS 12 MESES DEL AÑO SI ESTE NO CULMINA PARA EVITAR PROBLEMAS PROXIMOS
					if(count($values) < 12)
					{
						for($i = self::split_month($fecha_ultima_venta); $i <= 12; $i++)
						{
							$values[$i] = NULL;
						}

					}

					return $values;
				}
				else
				{
					return $values = array(1,1,1,1,1,1,1,1,1,1,1,1,1);
					// die('NO PUEDE EXISTIR UNA VENTA CON UN MES SUPERIOR AL MES ACTUAL.');
				}


			}
			else
			{
				if($año_actual > $año_ultima_venta)
				{
					return $values= array(2,2,2,2,2,2,2,2,2,2,2,2,2);
					// die('NO SE HAN REALIZADO VENTAS ESTE AÑO.');
				}
				else
				{
					return $values= array(3,3,3,3,3,3,3,3,3,3,3,3,3);
					// die('NO PUEDE EXISTIR UNA VENTA CON UN AÑO SUPERIOR A LA FECHA ACTUAL.');
				}
			}


			

		}
		static public function get_cliente($id)
		{
			// Conexion a la base de datos
			self::$connection = db_connector::get_connection();
			$sentencia = self::$connection->query("SELECT * FROM `cliente` WHERE nombre LIKE '%$id%' OR apellido LIKE '%$id%' OR documento LIKE '%$id%' LIMIT 10");

					return $sentencia->fetchAll(PDO::FETCH_ASSOC);
		}
	}

?>