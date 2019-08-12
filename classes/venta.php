<?php 

	require_once('db_connector.php');
	require_once('libro.php');
	require_once('finanzas.php');

	class venta extends db_connector
	{
		private $cliente;
		private $libro;
		private $precio;
		private $cantidad;
		private $forma_de_pago;
		private $precio_neto;

		public function __construct()
		{
			$this->db_connection();
		}

		public function set_values($cliente, $libro, $cantidad, $forma_de_pago)
		{
			if(!empty($cliente) && !empty($libro) && !empty($cantidad) && !empty($forma_de_pago))
			{
				if(ctype_digit($cliente) && ctype_digit($libro) && ctype_digit($cantidad) && ctype_digit($forma_de_pago))
				{
					if($this->check_set_id('cliente',$cliente) && $this->check_set_id('info_libro',$libro) && $this->check_set_id('forma_de_pago',$forma_de_pago))
					{
						// ESTA FUE LA UNICA MALVADA SOLUCION QUE ENCONTRE NO ES ESTETICO PERO FUNCIONA XD
						$aux_object_libro = new libro();

						if($aux_object_libro->check_available_book($libro,$cantidad))
						{
							$this->cliente = $this->input_cleaning($cliente);
							$this->libro = $this->input_cleaning($libro);
							$this->precio = $aux_object_libro->get_price($libro);
							$this->cantidad = $this->input_cleaning($cantidad);
							$this->forma_de_pago = $this->input_cleaning($forma_de_pago);

							$this->precio_neto = $this->precio * $this->cantidad;

							return true;
						}
						else
						{
							die('NO HAY LIBROS DISPONIBLES');

							// return false;
						}

					}
					else
					{
						if(!$this->check_set_id('cliente',$cliente))
						{
							die('EL CLIENTE NO EXISTE');
						}

						if(!$this->check_set_id('info_libro',$libro))
						{
							die('EL LIBRO NO EXISTE');
						}

						if(!$this->check_set_id('forma_de_pago',$forma_de_pago))
						{
							die('LA FORMA DE PAGO NO EXISTE');
						}
					}					

				}
				else
				{
					die('LOS VALORES NO SON NUMERICOS');
					// return false;
				}
			}
			else
			{
				die('NO PUEDEN EXISTIR CAMPOS VACIOS');
				// return false;
			}
		}

		public function save_on_db()
		{
			$fecha = $this->get_today_date();

			$sentencia = $this->connection->prepare('INSERT INTO factura
													 VALUES(NULL,:cliente,:forma_de_pago,:fecha_facturacion, NULL, NULL)');

			$sentencia->execute(array(':cliente'			=> $this->cliente,
									  ':forma_de_pago'		=> $this->forma_de_pago,
									  'fecha_facturacion'	=> $fecha));

			$id_factura = $this->get_last_id('factura');

			// echo $id_factura;

			$sentencia = $this->connection->prepare('INSERT INTO venta
													 VALUES(:id_factura,:id_info_libro,:cantidad,:total)');

			$sentencia->execute(array(':id_factura'		=> $id_factura,
									  ':id_info_libro'	=> $this->libro,
									  ':cantidad'		=> $this->cantidad,
									  ':total'			=> $this->precio_neto));

			$iva = $this->precio_neto * 0.12;

			$sentencia = $this->connection->prepare('UPDATE factura
													 SET IVA 			= :iva,
													 	 total_factura	= :total_factura
													 WHERE id_factura 	= :id_factura ');

			$total_factura = $iva + $this->precio_neto;

			$sentencia->execute(array(':iva'			=> $iva,
									  ':total_factura'	=> $total_factura,
									  ':id_factura'		=> $id_factura));

			// NO ES ESTETICO PERO FUNCIONA XD
			$aux_object_finanzas = new finanzas();
			$aux_object_finanzas->save_on_db($total_factura,0);

			$aux_object_libro = new libro();
			$cantidad_libro = $aux_object_libro->get_cantidad_libro($this->libro);

			$cantidad_post_venta = $cantidad_libro - $this->cantidad;

			$sentencia = $this->connection->prepare('UPDATE info_libro
													 SET cantidad = :cantidad_post_venta
													 WHERE id_info_libro = :id_info_libro');

			$sentencia->execute(array(':cantidad_post_venta'	=> $cantidad_post_venta,
									  ':id_info_libro'			=> $this->libro));
		}

		public function get_all()
		{
			$sentencia = $this->connection->query('SELECT *
												   FROM factura
												   INNER JOIN venta
												   ON factura.id_factura = venta.id_factura
												   INNER JOIN cliente
												   ON factura.id_cliente = cliente.id
												   INNER JOIN forma_de_pago
												   ON factura.cod_formapago = forma_de_pago.id_formapago');

			$datos = $sentencia->fetchAll();

			return $datos;
		}

		public function get_cantidad_inventario()
		{
			$sentencia = $this->connection->query('SELECT COUNT(*)
													 FROM factura');

			$datos = $sentencia->fetch();

			return $datos['COUNT(*)'];
		}
	}

?>