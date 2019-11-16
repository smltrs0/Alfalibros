<?php
	require('../config.path.php');
	require(TOOLS.'db_connector.php');
	require(MODELS.'proveedor.php');


	$id = $_POST["id"];
	$proveedor = proveedor::id($id);

	echo json_encode($proveedor);
?>