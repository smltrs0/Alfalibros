<?php

	    // CARGANDO LAS CONSTANTES DE RUTAS
	    require('../config.path.php');

	    // CARGANDO LAS HERRAMIENTAS SOLO UNA VEZ PARA NO GENERAR CONFLICTOS DE CLASES DUPLICADAS O DE RUTAS
	    require(TOOLS.'db_connector.php');
	    require(TOOLS.'check.php');
	    require(TOOLS.'cleaning.php');
	    require(TOOLS.'get.php');

	    require(MODELS.'usuario.php');


		// $nombre = $_POST['nombre'];
		// $apellido = $_POST['apellido'];
		// $cedula = $_POST['cedula'];
		// $email = $_POST['email'];
		// $username = $_POST['username'];
		// $user_level = $_POST['user_level'];
		// $pass = $_POST['clave'];
		// $rep_pass = $_POST['rep_clave'];
		// $pregunta = $_POST['p_seguridad'];
		// $respuesta = $_POST['respuesta'];
		// $img = $_FILES['user_image'];

		$usuario = new usuario();

		if(!empty($img['name']))
		{
			if($usuario->set_values($nombre,$apellido,$cedula,$email,$username,$user_level,$pass,$rep_pass,$pregunta,$respuesta,$img))
			{
				die('todo en orden');
			}
			else
			{
				die('hubo un error con img');
			}
		}
		else
		{ 
			if($usuario->set_values($nombre,$apellido,$cedula,$email,$username,$user_level,$pass,$rep_pass,$pregunta,$respuesta))
			{
				die('todo en orden');
			}
			else
			{
				die('hubo un error sin img');
			}
		}

?>