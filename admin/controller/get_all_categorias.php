<?php

    // CARGANDO LAS CONSTANTES DE RUTAS
	require('../config.path.php');

	// CARGANDO LAS HERRAMIENTAS SOLO UNA VEZ PARA NO GENERAR CONFLICTOS DE CLASES DUPLICADAS O DE RUTAS
	require(TOOLS.'db_connector.php');
	require(TOOLS.'get.php');

	$result = get::all_items('categoria');

    
foreach($result as $row)
{

	$sub_array = array();
	$sub_array['id'] = $row["id_categoria"];
	$sub_array['nombre'] = $row["categoria"];
	$sub_array['edit'] = '<button type="button" name="update" id="'.$row["id_categoria"].'" class="text-white btn btn-warning btn-sm update">Actualizar</button>';
	$sub_array['delete'] = '<button type="button" name="delete" id="'.$row["id_categoria"].'" class="btn btn-danger btn-sm delete">Eliminar</button>';
	$data[] = $sub_array;
}
// Aqui convertimos el array en un objeto para poder procesarlo con datatable
$output = array(
	"data"	=>	$data
);
echo json_encode($output);
?>
