<?php

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		// CARGANDO LAS CONSTANTES DE RUTAS
	    require('../config.path.php');
	    // CARGANDO LAS HERRAMIENTAS SOLO UNA VEZ PARA NO GENERAR CONFLICTOS DE CLASES DUPLICADAS O DE RUTAS
	    require(TOOLS.'db_connector.php');
	    require(TOOLS.'check.php');
	    require(TOOLS.'cleaning.php');
	    require(TOOLS.'get.php');

	    require(MODELS.'libro.php');
	    $id_libro = $_POST['id_libro'];
	    $id_info_libro = $_POST['id_info_libro'];
		$titulo = $_POST['titulo'];
		$autor = $_POST['autor'];
		$categoria = $_POST['categoria'];
		$fecha_lanzamiento = $_POST['fecha_lanzamiento'];
		$cantidad = $_POST['cantidad'];
		$precio = $_POST['precio'];
		$sinopsis = $_POST['sinopsis'];
		$libro = new libro();


		if (!empty($id_libro) && !empty($id_info_libro) && !empty($titulo) && !empty($autor) && !empty($categoria) && !empty($fecha_lanzamiento) && !empty($cantidad) && !empty($precio))  {

			$res= $libro->editar($id_libro,$id_info_libro,$titulo,$autor,$categoria,$fecha_lanzamiento,$cantidad,$precio,$sinopsis);
			if ($res) {
				echo "done";
			}
		}else{
			die('No pueden existir campos vacios');
		}

}
?>