<?php 
// Este algoritmo solo esta pensado para un select dinamico no para mostar todos los clientes
	    require('../config.path.php');
	    require(TOOLS.'db_connector.php');
	    require(TOOLS.'get.php');
		$get = get::get_cliente();



$json = [];
foreach ($get as $row) {
	 $json[] = ['id'=>$row['id'], 'text'=>$row['nombre']." ".$row['apellido']." C.I: ".$row['documento']];
}
echo json_encode($json);


 ?>