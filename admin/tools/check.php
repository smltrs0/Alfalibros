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

				case 'user_level':

					$sentencia = self::$connection->prepare('SELECT id_user_level
															 FROM user_level
															 WHERE id_user_level = :id');

					$sentencia->execute(array(':id' => $id));

					if($sentencia->fetch())
					{
						return true;
					}

				break;

				case 'pregunta_de_seguridad':

					$sentencia = self::$connection->prepare('SELECT id
															 FROM pregunta_de_seguridad
															 WHERE id = :id');

					$sentencia->execute(array(':id' => $id));

					if($sentencia->fetch())
					{
						return true;
					}

				break;

				default:

					die('LA TABLA '.$table.' NO ESTA CONFIGURADA.');

				break;

				return false;
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

		static public function email($email)
		{
			if (filter_var($email, FILTER_VALIDATE_EMAIL))
			{
    			return true;
			}
			else
			{
				return false;
			}
		}

		static public function cleaned_input($input)
		{
			$aux = trim($input);		// "Trim" Limpia los espacios al inicio y final de los caracteres
			$aux = filter_var($aux, FILTER_SANITIZE_STRING); // LA FUNCION FILTER_VAR CON EL METODO FILTER_SANITIZE_STRING ELIMINA TODO TIPO DE ETIQUETAS HTML
			
			if($input == $aux)
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		static public function image($img)
		{
			$tipo_de_archivo = $img['type'];
			$tamaño_archivo = $img['size'];

			if(($tipo_de_archivo == 'image/jpeg') || ($tipo_de_archivo == 'image/png'))
			{
				if(!($tamaño_archivo > 4000000))
				{
					return true;
				}
			}

			return false;
		}
	}

?>