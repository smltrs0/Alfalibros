<?php 

	class venta
	{
		private $connection;

		private $cliente;
		private $libro;
		private $precio;
		private $cantidad;
		private $forma_de_pago;
		private $precio_neto;

		public function set_values($cliente, $libro, $cantidad, $forma_de_pago)
		{
			if(!empty($cliente) && !empty($libro) && !empty($cantidad) && !empty($forma_de_pago))
			{
				if(ctype_digit($cliente) && ctype_digit($libro) && ctype_digit($cantidad) && ctype_digit($forma_de_pago))
				{
					if(check::set_id('cliente',$cliente) && check::set_id('info_libro',$libro) && check::set_id('forma_de_pago',$forma_de_pago))
					{
						if(check::disponibilidad_cantidad_pedido($libro,$cantidad))
						{
							$this->cliente = cleaning::input($cliente);
							$this->libro = cleaning::input($libro);
							$this->precio = get::price_libro($libro);
							$this->cantidad = cleaning::input($cantidad);
							$this->forma_de_pago = cleaning::input($forma_de_pago);

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
						if(!check::set_id('cliente',$cliente))
						{
							die('EL CLIENTE NO EXISTE');
						}

						if(!check::set_id('info_libro',$libro))
						{
							die('EL LIBRO NO EXISTE');
						}

						if(!check::set_id('forma_de_pago',$forma_de_pago))
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
			if(!$this->connection)
			{
				$this->connection = db_connector::get_connection();
			}

			$fecha = get::today_date();

			$sentencia = $this->connection->prepare('INSERT INTO factura
													 VALUES(NULL,:cliente,:forma_de_pago,:fecha_facturacion, NULL, NULL)');

			$sentencia->execute(array(':cliente'			=> $this->cliente,
									  ':forma_de_pago'		=> $this->forma_de_pago,
									  'fecha_facturacion'	=> $fecha));

			$id_factura = get::last_id('factura');

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

			
			finanzas::save_on_db($total_factura,0);

			$cantidad_libro = get::cantidad_libro($this->libro);

			$cantidad_post_venta = $cantidad_libro - $this->cantidad;

			$sentencia = $this->connection->prepare('UPDATE info_libro
													 SET cantidad = :cantidad_post_venta
													 WHERE id_info_libro = :id_info_libro');

			$sentencia->execute(array(':cantidad_post_venta'	=> $cantidad_post_venta,
									  ':id_info_libro'			=> $this->libro));
		}
	}

?>