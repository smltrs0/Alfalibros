<?php 

	class check
	{
		static private $connection;

		private function __construct(){}

		static public function set_id($table, $id)
		{
			if(!self::$connection)
			{
				self::$connection = db_connector::get_connection();
			}

			switch($table)
			{
				case 'info_libro':

					$sentencia = self::$connection->prepare('SELECT id_info_libro
															 FROM info_libro
															 WHERE id_info_libro = :id');

					$sentencia->execute(array(':id' => $id));

					if($sentencia->fetch())
					{
						return true;
					}

				break;

				case 'cliente':

					$sentencia = self::$connection->prepare('SELECT id
															 FROM cliente
															 WHERE id = :id');

					$sentencia->execute(array(':id' => $id));

					if($sentencia->fetch())
					{
						return true;
					}

				break;

				case 'autor':

					$sentencia = self::$connection->prepare('SELECT id_autor
															 FROM autor
															 WHERE id_autor = :id');

					$sentencia->execute(array(':id' => $id));

					if($sentencia->fetch())
					{
						return true;
					}
					

				break;

				case 'categoria':

					$sentencia = self::$connection->prepare('SELECT id_categoria
															 FROM categoria_libro
															 WHERE id_categoria = :id');

					$sentencia->execute(array(':id' => $id));

					if($sentencia->fetch())
					{
						return true;
					}

				break;

				case 'forma_de_pago':

					$sentencia = self::$connection->prepare('SELECT id_formapago
															 FROM forma_de_pago
															 WHERE id_formapago = :id');

					$sentencia->execute(array(':id' => $id));

					if($sentencia->fetch())
					{
						return true;
					}

				break;

				default:
					echo 'La tabla no existe.';

					return true;
					// SE RETORNA TRUE PORQUE EL VALOR TRUE ES CONSIDERADO COMO ERROR O COMO UN ID DUPLICADO

				break;
			}
		}

		static public function date($date)
		{
			$values = explode('-', $date);	// LA FUNCION EXPLODE() DESCOMPONE UNA VARIABLE EN VARIAS PARTES DEVOLVIENDO UN ARRAY, RECIBE 2 PARAMETROS, EL CARACTER QUE SEPERARA CADA ELEMENTO DEL ARRAY Y LA VARIABLE QUE SERA DESCOMPUESTA

			if(count($values) == 3)
			{
				foreach ($values as $key)
				{
					if(!ctype_digit($key))		// LA FUNCION CTYPE_DIGIT() VERIFICA SI TODOS LOS VALORES DE UN STRING SON DE SOLO TIPO NUMERICO SIN NINGUN TIPO DE CARACTER EXTRA
					{
						return false;
					}
				}

				return checkdate($values[1], $values[2], $values[0]);	// LA FUNCION CHECKDATE() SIRVE PARA VERIFICAR SI UNA FECHA ES VALIDA, RECIBE TRES PARAMETROS EN EL ORDEN DE MES, DIA, AÑO
			}
			else
			{
				return false;
			}
		}

		static public function disponibilidad_cantidad_pedido($id,$pedido)
		{
			if(!self::$connection)
			{
				self::$connection = db_connector::get_connection();
			}

			$sentencia = self::$connection->prepare('SELECT cantidad
												     FROM info_libro
											         WHERE id_info_libro = :id');

			$sentencia->execute(array(':id' => $id));

			$datos = $sentencia->fetch();

			if($datos['cantidad'] >= $pedido)
			{
				return true;
			}
			else
			{
				die('NO HAY SUFICIENTES EJEMPLARES');
				// return false;
			}
		}
	}

?>