<?php
    // CARGANDO LAS CONSTANTES DE RUTAS
	require('../config.path.php');

	// CARGANDO LAS HERRAMIENTAS SOLO UNA VEZ PARA NO GENERAR CONFLICTOS DE CLASES DUPLICADAS O DE RUTAS
	require(TOOLS.'db_connector.php');
	require(TOOLS.'get.php');
	$id=$_POST['id'];
	$autor = get::autor($id);
	echo json_encode($autor);
  ?>