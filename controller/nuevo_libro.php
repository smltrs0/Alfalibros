<?php
	require_once('../classes/libro.php');

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$titulo = $_POST['titulo'];
		$autor = $_POST['autor'];
		$categoria = $_POST['categoria'];
		$fecha_lanzamiento = $_POST['fecha_lanzamiento'];
		$cantidad = $_POST['cantidad'];
		$precio = $_POST['precio'];
		$sinopsis = $_POST['sinopsis'];

		$info_libro = new libro();

		$info_libro->set_values_libro($titulo,$autor,$categoria,$fecha_lanzamiento,$sinopsis);

		if(empty($_FILES['img']))
		{
			$info_libro->set_values_info($cantidad,$precio);
		}
		else
		{
			$info_libro->set_values_info($cantidad,$precio,$_FILES['img']);
		}

		$info_libro->save_on_db();

		header('location: ../agregar libro.php');


	}
	else
	{
		die('ERROR.');
	}

?>