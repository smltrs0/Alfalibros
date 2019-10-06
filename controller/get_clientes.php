<?php 

	    require('../config.path.php');
	    require(TOOLS.'db_connector.php');
	    require(TOOLS.'get.php');
$get = get::get_cliente();
echo json_encode($get);

 ?>