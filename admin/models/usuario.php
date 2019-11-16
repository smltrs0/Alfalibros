<?php 

	class usuario
	{
		static private $connection;
		static private $id;
		static private $nombre;
		static private $apellido;
		static private $cedula;
		static private $email;
		static private $username;
		static private $nivel;
		static private $clave;
		static private $pregunta;
		static private $respuesta;
		static private $image = NULL;

		static public function crear($nombre, $apellido, $cedula, $username, $email, $clave, $cargo, $pregunta, $respuesta, $image)
		{
			self::$connection = db_connector::get_connection();
			$sentencia = self::$connection->prepare("
			INSERT INTO usuarios (id, nombre, apellido, cedula, username, email, clave, cargo, pregunta, respuesta, image) 
			VALUES (NULL, :nombre, :apellido, :cedula, :username, :email, MD5(:clave) , :cargo, :pregunta, :respuesta, :image)
			");

			$result = $sentencia->execute(
				array(
					':nombre'	=>	$nombre,
					':apellido'	=>	$apellido,
					':cedula'	=>	$cedula,
					':username'	=>	$username,
					':email'	=>	$email,
					':clave'	=>	$clave,
					':cargo'	=>	$cargo,
					':pregunta'	=> $pregunta,
					':respuesta'	=>	$respuesta,
					':image'		=>	$image
				)
			);
				if(!empty($result))
				{	//si se agrego correctamente regresa un true
					return TRUE;
				}else{
					return FALSE;
				}

		}	

		static public function editar($id, $nombre, $apellido, $cedula, $username, $email, $clave, $cargo, $pregunta, $respuesta, $image)
		{
			self::$connection = db_connector::get_connection();
			$sentencia = self::$connection->prepare(
			"UPDATE usuarios 
			SET 
			username = :username,
			nombre = :nombre,
			apellido = :apellido, 
			cedula = :cedula, 
			email = :email,
			cargo=:cargo, 
			clave = MD5(:clave), 
			pregunta = :p_seguridad, 
			respuesta=:respuesta, 
			image = :image  
			WHERE id = :id
			"
		);
		$result = $sentencia->execute(
			array(
				':username'	=>	$username,
				':nombre'	=>	$nombre,
				':apellido'	=>	$apellido,
				':cedula'	=>	$cedula,
				':email'	=>	$email,
				':cargo'	=>	$cargo,
				':clave'	=>	$clave,
				':p_seguridad'	=>	$pregunta,
				':respuesta'	=>	$respuesta,
				':image'		=>	$image,
				':id'			=>	$id
			)
		);
				if(!empty($result))
				{	//si se agrego correctamente regresa un true
					return TRUE;
				}else{
					return FALSE;
				}
			
		}


	}
?>