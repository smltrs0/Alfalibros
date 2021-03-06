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

					$sentencia = self::$connection->query('SELECT MAX(id_factura)
												   		   FROM factura');

					$id_finanzas = $sentencia->fetch();

					return $id_finanzas['MAX(id_factura)'];

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
													 FROM libro
													 INNER JOIN autor
													 ON libro.id_autor = autor.id_autor
													 INNER JOIN categoria_libro
													 ON libro.id_categoria = categoria_libro.id_categoria
													 WHERE libro.id_libro = :id');

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

					$sentencia = self::$connection->query('SELECT * FROM libro
                                                           INNER JOIN autor
                                                           ON libro.id_autor = autor.id_autor
                                                           INNER JOIN categoria_libro
                                                           ON libro.id_categoria = categoria_libro.id_categoria');
			  
					$datos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

					return $datos;
					
				break;

				case 'autor':

					$sentencia = self::$connection->query('SELECT *
												           FROM autor');

					$datos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

					return $datos;

				break;

				case 'categoria':

					$sentencia = self::$connection->query('SELECT *
												           FROM categoria_libro');

					$datos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

					return $datos;

				break;

				case 'cliente':

					$sentencia = self::$connection->query('SELECT * FROM cliente INNER JOIN datos_personales ON cliente.datos_personales = datos_personales.id_datos_personales');

					return $sentencia->fetchAll(PDO::FETCH_ASSOC);

				break;

				case 'tipo_de_documento':

					$sentencia = self::$connection->query('SELECT *
												           FROM tipo_de_documento');

					$datos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

					return $datos;

				break;

				case 'factura':

					$sentencia = self::$connection->query('SELECT *
                                                           FROM factura
                                                           INNER JOIN cliente
                                                           ON factura.id_cliente = cliente.id
                                                           INNER JOIN datos_personales ON cliente.datos_personales = datos_personales.id_datos_personales
                                                           INNER JOIN forma_de_pago
                                                           ON factura.cod_formapago = forma_de_pago.id_formapago');

					$datos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

					return $datos;

				break;

				case 'forma_de_pago':

					$sentencia = self::$connection->query('SELECT *
													       FROM forma_de_pago');

					return $sentencia->fetchAll(PDO::FETCH_ASSOC);

				break;

				case 'user_level':

					$sentencia = self::$connection->query('SELECT *
													       FROM user_level');

					return $sentencia->fetchAll(PDO::FETCH_ASSOC);

				break;

				case 'pregunta_de_seguridad':

					$sentencia = self::$connection->query('SELECT *
													       FROM pregunta_de_seguridad');

					return $sentencia->fetchAll(PDO::FETCH_ASSOC);

				break;

				case 'proveedor':

					$sentencia = self::$connection->query('SELECT *
													       FROM proveedor');

					return $sentencia->fetchAll(PDO::FETCH_ASSOC);

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
											               FROM libro');

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
											   FROM libro
											   WHERE id_libro = :id ');

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

			$sentencia = self::$connection->prepare('SELECT total_factura
													 FROM factura
													 WHERE id_factura = :last_id');

			$sentencia->execute(array(':last_id' => $last_id));

			$datos = $sentencia->fetch();

			return $datos['total_factura'];
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
					
					$sentencia = self::$connection->query('SELECT MAX(fecha_facturacion)
														     FROM factura');

					$fecha = $sentencia->fetch();

					return $fecha['MAX(fecha_facturacion)'];

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

						$sentencia = self::$connection->prepare('SELECT SUM(total_factura) FROM factura WHERE fecha_facturacion BETWEEN CAST(:inicio_mes AS DATE) AND CAST(:fin_mes AS DATE)');

						$sentencia->execute(array(':inicio_mes'	=> $inicio_mes,
												  ':fin_mes'	=> $fin_mes));

						$sumatoria_por_mes = $sentencia->fetch();

						$values[$i] = round($sumatoria_por_mes['SUM(total_factura)'], 2);

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
		static public function buscador_cliente($id)
		{
			// Conexion a la base de datos
			self::$connection = db_connector::get_connection();
			$sentencia = self::$connection->query("SELECT * FROM `cliente` 
				INNER JOIN datos_personales ON cliente.datos_personales = datos_personales.id_datos_personales WHERE datos_personales.nombre LIKE '%$id%' OR datos_personales.apellido LIKE '%$id%' OR datos_personales.documento LIKE '%$id%' LIMIT 10");

					return $sentencia->fetchAll(PDO::FETCH_ASSOC);
		}


		static public function cliente($id)
		{
			// Conexion a la base de datos
			self::$connection = db_connector::get_connection();
			$sentencia = self::$connection->query("SELECT * FROM `cliente` 
				INNER JOIN datos_personales ON cliente.datos_personales = datos_personales.id_datos_personales  WHERE id= '$id' LIMIT 1");

					return $sentencia->fetch(PDO::FETCH_ASSOC);
		}

		static public function autor($id)
		{
			// Conexion a la base de datos
			self::$connection = db_connector::get_connection();
			$sentencia = self::$connection->query("SELECT * FROM `autor` WHERE id_autor= '$id' LIMIT 1");

					return $sentencia->fetch(PDO::FETCH_ASSOC);
		}
		static public function categoria($id)
		{
			// Conexion a la base de datos
			self::$connection = db_connector::get_connection();
			$sentencia = self::$connection->query("SELECT * FROM `categoria_libro` WHERE id_categoria= '$id' LIMIT 1");

					return $sentencia->fetch(PDO::FETCH_ASSOC);
		}
		static public function get_all_usuarios()
		{
			if(!self::$connection)
			{
				self::$connection = db_connector::get_connection();
			}
			$query = "SELECT * FROM usuarios ";
			$statement = self::$connection->prepare($query);
			$statement->execute();
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			return $result;
		}


		static public function get_user($username,$clave)
		{
			if(!self::$connection)
			{
				self::$connection = db_connector::get_connection();
			}

			$input = trim($clave);		// "Trim" Limpia los espacios al inicio y final de los caracteres
			$input = filter_var($input, FILTER_SANITIZE_STRING);
			$inputmd5= md5($input);

			$sentencia = self::$connection->prepare("SELECT * FROM usuarios WHERE (username=:username or email=:username) AND clave=:clave");
			$sentencia->bindParam("username",$username, PDO::PARAM_STR);
			$sentencia->bindParam("clave",$inputmd5, PDO::PARAM_STR);
			$sentencia->execute();
			$count = $sentencia->rowCount();
			if ($count) {
				$sentencia = $sentencia->fetch(PDO::FETCH_ASSOC);
			if (!empty($sentencia)) {
				return $sentencia;
			}
			else {
				return FALSE;
			}
			}else{
				return FALSE ;
			}
			
		}

		static public function all_proveedores()
		{
			// Conexion a la base de datos
			self::$connection = db_connector::get_connection();
			$sentencia = self::$connection->query("SELECT * FROM proveedor 
                         INNER JOIN datos_personales ON proveedor.datos_personales = datos_personales.id_datos_personales
                         INNER JOIN tipo_de_documento ON datos_personales.id_tipo_documento = tipo_de_documento.id_tipo_de_documento");

					return $sentencia->fetchAll(PDO::FETCH_ASSOC);
		}
	static public function get_factura($id)
	{		

							// Conexion a la base de datos
			self::$connection = db_connector::get_connection();
			$sentencia = self::$connection->query("SELECT f.fecha_facturacion, f.IVA, df.cantidad,  
                    df.precio, dp.documento , dp.nombre ,dp.apellido ,
                    dp.direccion, dp.telefono, l.titulo, a.autor
                    FROM factura AS f
                    INNER JOIN detalles_factura AS df ON f.id_factura = df.id_factura
                    INNER JOIN cliente AS c ON f.id_cliente = c.id
                   INNER JOIN datos_personales AS dp ON c.datos_personales = dp.id_datos_personales
                    INNER JOIN libro AS l ON df.id_producto = l.id_libro 
                    INNER JOIN autor AS a on l.id_autor = a.id_autor WHERE f.id_factura= $id");

					return $sentencia->fetch(PDO::FETCH_ASSOC);
	}

	static	public function fecha_rango($fecha_inicio,$fecha_final)
	{
		self::$connection = db_connector::get_connection();
		$sql = "SELECT * FROM factura 
		INNER JOIN detalles_factura
		ON factura.id_factura = detalles_factura.id_factura 
		WHERE fecha_facturacion BETWEEN '2011-03-20' AND '2016-03-20'";

		$sentencia = self::$connection->query($sql);
		return $sentencia->fetchAll(PDO::FETCH_ASSOC);
	}


}

?>