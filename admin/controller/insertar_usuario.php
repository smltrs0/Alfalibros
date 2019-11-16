<?php

	    require('../config.path.php');
	    // CARGANDO EL ARCHIVO DEl HELPERS SOLO UNA VEZ PARA NO GENERAR CONFLICTOS DE CLASES DUPLICADAS
	    require(TOOLS.'db_connector.php');
		require(MODELS.'usuario.php');


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
	if (isset($_POST["user_id"])) {
		$id = $_POST["user_id"];
	}
	$nombre = $_POST["nombre"];
	$apellido = $_POST["apellido"];
	$cedula = $_POST["cedula"];
	$username = $_POST["username"];
	$email = $_POST["email"];
	$clave = $_POST["clave"];
	$cargo = $_POST["user_level"];
	$pregunta = $_POST["p_seguridad"];
	$respuesta = $_POST["respuesta"];


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
		
		$result = usuario::crear($nombre, $apellido, $cedula, $username, $email, $clave, $cargo, $pregunta, $respuesta, $image);
		
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

		$usuario = usuario::editar($id, $nombre, $apellido, $cedula, $username, $email, $clave, $cargo, $pregunta, $respuesta, $image);

		if(!empty($usuario))
		{	//si se agrego correctamente regresa un true
			echo true;
		}

	}

}

?>