<?php

	require_once('../classes/autor.php');

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$autor_post = $_POST['autor'];

		$autor = new autor();

		$autor->set_values($autor_post);

		$autor->save_on_db();

		header('location: ../autores.php');
	}
	else
	{
		die('NO SE HA RECIBIDO NINGUN DATO');
	}

?>