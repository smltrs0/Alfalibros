<?php

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
	    // CARGANDO LAS CONSTANTES DE RUTAS
	    require('../config.path.php');

	    // CARGANDO LAS HERRAMIENTAS SOLO UNA VEZ PARA NO GENERAR CONFLICTOS DE CLASES DUPLICADAS O DE RUTAS
	    require(TOOLS.'db_connector.php');
	    require(TOOLS.'cleaning.php');
	    require(MODELS.'autor.php');

		$autor_post = $_POST['autor'];

		$autor = new autor();

		if($autor->set_values($autor_post))
		{
			$autor->save_on_db();
		}
		else
		{
			die('ERROR AL CARGAR EL AUTOR');
		}

		

		header('location: ../autores.php');
	}
	else
	{
		die('NO SE HA RECIBIDO NINGUN DATO');
	}

?>