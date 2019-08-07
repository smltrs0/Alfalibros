<?php
$username = 'root';
$password = '';
$connection = new PDO( 'mysql:host=localhost;dbname=alfalibros', $username, $password );

function upload_image()
{
	if(isset($_FILES["user_image"]))
	{
		$extension = explode('.', $_FILES['user_image']['name']);
		$new_name = rand() . '.' . $extension[1];
		$destination = '../uploaded_files/users/' . $new_name;
		move_uploaded_file($_FILES['user_image']['tmp_name'], $destination);
		return $new_name;
	}
}

if(isset($_POST["operation"]))
{
	// leemos el value de la variable operacion para saber que vamos a hacer si agregaremos o
	// actualizaremos, lo vi en el codigo tuyo y lo aplique con jquey, menos codigo,  bueno solo un poco menos
	if($_POST["operation"] == "Add")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}
		// Use MD5 para mayor rapidez pero lo ideal es usar un encriptado con algoritmo de encriptado para
		// mayor seguridad
		$statement = $connection->prepare("
			INSERT INTO usuarios (username, nombre, apellido, cedula, email, usuario_tipo, clave, pregunta, respuesta, image) 
			VALUES (:username, :nombre, :apellido, :cedula, :email, :cargo, MD5(:clave),:pregunta, :respuesta, :image)
		");
		$result = $statement->execute(
			array(
				':username'	=>	$_POST["username"],
				':nombre'	=>	$_POST["nombre"],
				':apellido'	=>	$_POST["apellido"],
				':cedula'	=>	$_POST["cedula"],
				':email'	=>	$_POST["email"],
				':cargo'	=>	$_POST["cargo"],
				':clave'	=>	$_POST["clave"],
				':pregunta'	=>	$_POST["p_seguridad"],
				':respuesta'	=>	$_POST["respuesta"],
				':image'		=>	$image
			)
		);
		if(!empty($result))
		{	//si se agrego correctamente regresa un true
			echo true;
		}
	}
	if($_POST["operation"] == "Edit")
	{
		$image = '';
		if($_FILES["user_image"]["name"] != '')
		{
			$image = upload_image();
		}
		else
		{
			$image = $_POST["hidden_user_image"];
		}
		$statement = $connection->prepare(
			"UPDATE usuarios 
			SET username = :username,
			nombre = :nombre,
			apellido = :apellido, 
			cedula = :cedula, 
			email = :email,
			usuario_tipo=:cargo, 
			clave = MD5(:clave), 
			pregunta = :p_seguridad, 
			respuesta=:respuesta, 
			image = :image  
			WHERE id = :id
			"
		);
		$result = $statement->execute(
			array(
				':username'	=>	$_POST["username"],
				':nombre'	=>	$_POST["nombre"],
				':apellido'	=>	$_POST["apellido"],
				':cedula'	=>	$_POST["cedula"],
				':email'	=>	$_POST["email"],
				':cargo'	=>	$_POST["cargo"],
				':clave'	=>	$_POST["clave"],
				':p_seguridad'	=>	$_POST["p_seguridad"],
				':respuesta'	=>	$_POST["respuesta"],
				':image'		=>	$image,
				':id'			=>	$_POST["user_id"]
			)
		);
		if(!empty($result))
		{
			echo true;
		}
	}
	// ahora el peo es como pasamos esto a programacion orientada a objetos?
	// ya se 2 funciones con self::...
}

?>