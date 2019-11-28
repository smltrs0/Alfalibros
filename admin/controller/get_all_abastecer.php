<?php 
    
    // CARGANDO LAS CONSTANTES DE RUTAS
    require('../config.path.php');

    // CARGANDO LAS HERRAMIENTAS SOLO UNA VEZ PARA NO GENERAR CONFLICTOS DE CLASES DUPLICADAS O DE RUTAS
    require(TOOLS.'db_connector.php');
    require(MODELS.'abastecer.php');

    $result = abastecer::get_all();
    
foreach($result as $row)
{

	$sub_array = array();
	$sub_array['id_libro'] = $row["id_libro"];
	$sub_array['precio'] = $row["precio"];
	$sub_array['cantidad'] = $row["cantidad"];
	$sub_array['fecha_entrada'] = $row["fecha_entrada"];
	$sub_array['titulo'] = $row["titulo"];
	$sub_array['id_proveedor'] = $row["id_proveedor"];
	$sub_array['nombre_comercial'] = $row["nombre_comercial"];
	$sub_array['nombre'] = $row["nombre"];
	$sub_array['apellido'] = $row["apellido"];
	$sub_array['telefono'] = $row["telefono"];


	$sub_array['edit'] = '<button type="button" name="update" id="'.$row["id_abastecer"].'" class="text-white btn btn-warning btn-sm update">Actualizar</button>';
	$sub_array['delete'] = '<button type="button" name="delete" id="'.$row["id_abastecer"].'" class="btn btn-danger btn-sm delete">Eliminar</button>';
	$data[] = $sub_array;
}
// Aqui convertimos el array en un objeto para poder procesarlo con datatable
$output = array(
	"data"	=>	$data
);
echo json_encode($output);





?>
