<?php

	//
	//Esta es la funcion que validara a los usuarios al loguearse
	//
	require_once('db_connector.php');

	class Autenticacion extends db_connector
	{

		public function __construct()
		{
			$this->db_connection();
			//$connection = parent::db_connection()
		}

		public function limpiar($value)
		{
			// Esta funcion tendria que ir en db_connector para poder usarla siempre que sea necesario
			return strip_tags($value);
		}

		 # Escapa los caracteres especiales de un string para evitar las inyecciones sql
        public function salvar($string)
        {
          /*
            mysqli_real_escape_string: Escapa los caracteres especiales de una cadena
            para usarla en una sentencia SQL, tomando en cuenta el conjunto de
            caracteres actual de la conexión.
            por lo que estaba viendo en pdo se usa PDO::quote() en lugar de real_escape_string()
          */
          $string = $this->connection->real_escape_string($string);

          return $string;
        }


		public function get_usuario($clave,$username)
		{
			// Podremos entrar con el username del usuario o el correo y la contraseña
			$sentencia = $this->connection->prepare('SELECT * FROM usuarios WHERE email = :username OR username = :username AND clave = MD5(:clave)');
			$sentencia->execute(array(':clave' => $clave, ':username' => $username));
			$sentencia = $sentencia->fetch(PDO::FETCH_ASSOC);
			if (!empty($sentencia)) {
				return $sentencia;
			}
			
			else {
				return FALSE;
			}
		}

		public function desconectar()
		{
			session_start();
			session_destroy();
			header("location:../login.php");	
		}
	}
 
   



?>