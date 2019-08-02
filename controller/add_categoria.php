<?php

	require_once('../classes/categoria.php');

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
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