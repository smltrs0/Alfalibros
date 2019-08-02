<?php


abstract class db_connector
	{
		private static $db_host = 'localhost';
		private static $db_name = 'alfalibros';
		private static $db_user = 'root';
		private static $db_pass = '25695517.';
		private static $character = 'SET CHARACTER SET utf8';
		protected $error = '';
		protected $connection;

		protected function db_connection()
		{
			try
			{
				$this->connection = new PDO('mysql:host='.self::$db_host.';dbname='.self::$db_name,self::$db_user,self::$db_pass);
				$this->connection -> exec(self::$character);
				
			}
			catch (PDOException $e)
			{
				die('ERROR: '.$e->getMessage());
			}
		}

		// abstract public function save_on_db();
		// abstract function del_from_db();
		// abstract function get_from_db();

		protected function input_cleaning($input)
		{
			$input = trim($input);		// "Trim" Limpia los espacios al inicio y final de los caracteres
			$input = filter_var($input, FILTER_SANITIZE_STRING); // LA FUNCION FILTER_VAR CON EL METODO FILTER_SANITIZE_STRING ELIMINA TODO TIPO DE ETIQUETAS HTML
			return $input;
		}
		protected function check_set_id($table,$id)
		{
			switch($table)
			{
				case 'autor':

					$sentencia = $this->connection->prepare('SELECT id_autor
															 FROM autor
															 WHERE id_autor = :id');

					$sentencia->execute(array(':id' => $id));

					if($sentencia->fetch())
					{
						return true;
					}
					

				break;

				case 'categoria':

					$sentencia = $this->connection->prepare('SELECT id_categoria
															 FROM categoria_libro
															 WHERE id_categoria = :id');

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

			return false;

		}

		protected function check_date($input)
		{
			$values = explode('-', $input);	// LA FUNCION EXPLODE() DESCOMPONE UNA VARIABLE EN VARIAS PARTES DEVOLVIENDO UN ARRAY, RECIBE 2 PARAMETROS, EL CARACTER QUE SEPERARA CADA ELEMENTO DEL ARRAY Y LA VARIABLE QUE SERA DESCOMPUESTA

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
		//ESTA FUNCION RETORNA UNA CADENA ALEATORIA DE CARACTERES NUMERICOS O LETRAS Y RECIBE DE PARAMETRO LA EXTENSION DE ESTA CADENA
		protected function random_string($length)
		{
		    $key = ''; 
		    $keys = array_merge(range(0, 9), range('a', 'z')); 
		    for ($i = 0; $i < $length; $i++)
		    { 
		     $key .= $keys[array_rand($keys)]; 
	    	} 
		    return $key; 
		}
	}

?>