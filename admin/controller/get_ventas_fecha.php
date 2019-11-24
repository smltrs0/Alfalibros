<?php 
	 // CARGANDO LAS CONSTANTES DE RUTAS
    require('../config.path.php');
$fecha_inicio = $_POST['fecha_inicio'];
$fecha_final = $_POST['fecha_final'];
    require(TOOLS.'db_connector.php');
    require(TOOLS.'get.php');

    $values = get::fecha_rango('2','2');

  echo json_encode($values);
 ?>