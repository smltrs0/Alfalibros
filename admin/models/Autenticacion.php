<?php

	//
	//Esta es la funcion que validara a los usuarios al loguearse
	//
	require_once('db_connector.php');

	class Autenticacion extends db_connector
	{

		public function get_usuario($clave,$username)
		{
			// Podremos entrar con el username del usuario o el correo y la contraseña
			$sentencia = $this->connection->prepare('SELECT * FROM usuarios WHERE email = :username OR username = :username AND clave = MD5(:clave)');
			$sentencia->execute(array(':clave' => $clave, ':username' => $username));
			$sentencia = $sentencia->fetch();
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