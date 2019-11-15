<?php 

	class usuario
	{
		private $connection;
		private $id;
		private $nombre;
		private $apellido;
		private $cedula;
		private $email;
		private $username;
		private $nivel;
		private $clave;
		private $pregunta;
		private $respuesta;
		private $image = NULL;

		public function crear($nombre, $apellido, $cedula, $username, $email, $clave, $cargo, $pregunta, $respuesta, $image)
		{
			// Aqui hay que usar la nueva conexion y estara listo!
			$sentencia = $connection->prepare("
			INSERT INTO usuarios (id, nombre, apellido, cedula, username, email, clave, cargo, pregunta, respuesta, image) 
			VALUES (NULL, :nombre, :apellido, :cedula, :username, :email, :clave, :cargo, :pregunta, :respuesta, :image)
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

		public function editar($id, $nombre, $apellido, $cedula, $username, $email, $clave, $cargo, $pregunta, $respuesta, $image)
		{
			$sentencia = $connection->prepare(
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