<?php


	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
	    require('../config.path.php');
	    require(TOOLS.'db_connector.php');
	    require(MODELS.'libro.php');

		$libro = new libro(); 
		function upload_img_books()
		{
			if(isset( $_FILES['img']))
			{
				$extension = explode('.',  $_FILES['img']['name']);
				$new_name = rand() . '.' . $extension[1];
				$destination = '../uploaded_files/img_books/' . $new_name;
				move_uploaded_file( $_FILES['img']['tmp_name'], $destination);
				return $new_name;
			}
		}

		$titulo = $_POST['titulo'];
		$autor = $_POST['autor'];
		$categoria = $_POST['categoria'];
		$fecha_lanzamiento = $_POST['fecha_lanzamiento'];
		$cantidad = 0;
		$isbn = $_POST['isbn'];
		$precio = $_POST['precio'];
		$sinopsis = $_POST['sinopsis'];

		$image = NULL;
		if( $_FILES['img']["name"] != '')
		{
			$image = upload_img_books();
		}
			$resultado = $libro->crear($titulo, $autor, $categoria, $fecha_lanzamiento, $cantidad, $precio, $sinopsis,$image,$isbn);
			if ($resultado) {
				echo "completado";
			}else{
				echo $resultado;
			}

	}
	else
	{
		die('ERROR. No se resivieron datos');
	}

?>