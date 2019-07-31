<?php

	require_once('../classes/categoria.php');

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$categoria_post = $_POST['categoria'];

		$categoria = new categoria();

		$categoria->set_values($categoria_post);

		$categoria->save_on_db();

		header('location: ../categorias.php');
	}
	else
	{
		die('NO SE HA RECIBIDO NINGUN DATO');
	}

?>