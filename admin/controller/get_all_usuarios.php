<?php
    // CARGANDO LAS CONSTANTES DE RUTAS
	require('../config.path.php');

	// CARGANDO LAS HERRAMIENTAS SOLO UNA VEZ PARA NO GENERAR CONFLICTOS DE CLASES DUPLICADAS O DE RUTAS
	require(TOOLS.'db_connector.php');
	require(TOOLS.'get.php');

$result = get::get_all_usuarios();
$output = array();
$data = array();

foreach($result as $row)
{
	$image = '';
	if($row["image"] != '')
	{
		$image = '<img src="uploaded_files/users/'.$row["image"].'" class="img-thumbnail" width="50" height="50" />';
	}
	else
	{
		// Aqui va la imagen de perfil default
		$image = '';
	}
if ($row['cargo']==1) {
	$tipo='<span class="badge badge-primary">Admin</span>';
}elseif ($row['cargo']==2) {
	$tipo='<span class="text-white badge badge-warning">Usuario</span>';
}
else {
	$tipo='<span class="badge badge-secondary">Deshabilitado</span>';
}
	$sub_array = array();
	$sub_array['image'] = $image;
	$sub_array['nombre'] = $row["nombre"];
	$sub_array['apellido'] = $row["apellido"];
	$sub_array['email'] = $row["email"];
	$sub_array['tipo'] =  $tipo;
	$sub_array['edit'] = '<button type="button" name="update" id="'.$row["id"].'" class="text-white btn btn-warning btn-sm update">Actualizar</button>';
	$sub_array['delete'] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-sm delete">Eliminar</button>';
	$data[] = $sub_array;
}
// Aqui convertimos el array en un objeto para poder procesarlo con datatable
$output = array(
	"data"	=>	$data
);
echo json_encode($output);

?>