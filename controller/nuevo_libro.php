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

		$libro = new libro();

		if(empty($_FILES['img']['name']))
		{
			if($libro->set_values($titulo, $autor, $categoria, $fecha_lanzamiento, $cantidad, $precio, $sinopsis))
			{
				$libro->save_on_db();
			}
			else
			{
				die('ERROR AL CARGAR EL LIBRO');
			}
			
		}
		else
		{
			if($libro->set_values($titulo, $autor, $categoria, $fecha_lanzamiento, $cantidad, $precio, $sinopsis, $_FILES['img']))
			{
				$libro->save_on_db();
			}
			else
			{
				die('ERROR AL CARGAR EL LIBRO');
			}
			
		}

		header('location: ../agregar libro.php');


	}
	else
	{
		die('ERROR.');
	}

?>