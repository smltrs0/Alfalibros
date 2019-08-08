<?php 

	require_once('db_connector.php');
	require_once('libro.php');

	class venta extends db_connector
	{
		private $cliente;
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

						if($aux_object_libro->check_available_book($libro))
						{
							$this->cliente = $this->input_cleaning($cliente);
							$this->precio = $aux_object_libro->get_price($libro);
							$this->cantidad = $this->input_cleaning($cantidad);
							$this->forma_de_pago = $this->input_cleaning($forma_de_pago);

							$this->precio_neto = $this->precio * $this->cantidad;

							echo 'precio neto: '.$this->precio_neto.'<br>';
						}
						else
						{
							die('NO HAY LIBROS DISPONIBLES');
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
					}					

					return true;
				}
				else
				{
					die('LOS VALORES NO SON NUMERICOS');
					// return false;
				}
			}
			else
			{
				return false;
			}
		}

		public function save_on_db()
		{
		
		}
	}

?>