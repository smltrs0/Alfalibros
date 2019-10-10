<?php

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
	    // CARGANDO LAS CONSTANTES DE RUTAS
	    require('config.path.php');

	    // CARGANDO LAS HERRAMIENTAS SOLO UNA VEZ PARA NO GENERAR CONFLICTOS DE CLASES DUPLICADAS O DE RUTAS
	    require(TOOLS.'db_connector.php');
	    require(TOOLS.'cleaning.php');

	    require(MODELS.'categoria.php');

		$categoria_post = $_POST['categoria'];

		$categoria = new categoria();

		if($categoria->set_values($categoria_post))
		{
			$categoria->save_on_db();
		}
		else
		{
			die('ERROR AL CARGAR LA CATEGORIA');
		}

		

		header('location: ../categorias.php');
	}
	else
	{
		die('NO SE HA RECIBIDO NINGUN DATO');
	}

?>