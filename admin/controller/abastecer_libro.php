<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    require('../config.path.php');
    require(TOOLS.'db_connector.php');
    require(TOOLS.'get.php');
    require(MODELS.'libro.php');
    require(MODELS.'abastecer.php');
	$libro = new libro();
	$libro_id = $_POST['libro'];
	$cantidad = $_POST['cantidad'];
	$proveedor = $_POST['proveedor'];
	// Consultamos la cantidad actual, usamos :: para acceder a una función de una clase que no necesita estar instanciada
    $libro_info = get::libro_by_id($libro_id);

	// Sumamos la cantidad actual con la cantidad que se va a suministrar
 	$cantidad_total= ($libro_info['cantidad']+$cantidad);




	// Agregamos la información del abastecimiento a la tabla abastecer
	$res = abastecer::agregar($libro_id, $cantidad, $proveedor);
if ($res) {
	// Actualizamos la cantidad total solo si se agrego a la tabla abastecer, en el else se tendría que capturar la id de la ultima transacción para eliminar la consulta de abastecer::agregar() si no se introdujo la información a actualizar cantidad, esto es para solucionar algún fallo que pueda ocurrir durante la inserción...
	$result = $libro->actualizar_cantidad($libro_id, $cantidad_total);
	if ($result) {
		echo "Se agregaron correctamente $cantidad, la cantidad total actual es:  $cantidad_total.";
	}else{
		echo "No se pudo actualizar la cantidad de libros.";
	}
}else{
	echo "No se pudo agregar en abastecer libros.";
}
	

}else{
	echo "No se recibieron datos.";
}

			


 ?>