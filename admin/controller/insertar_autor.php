<?php

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
	  
	    require('../config.path.php');
	    require(TOOLS.'db_connector.php');
		require(MODELS.'autor.php');

		$autor = $_POST['autor'];

		$autor = new autor();
		$res = $autor->crear($autor);
		echo $res;
	}
	else
	{
		die('NO SE HA RECIBIDO NINGUN DATO');
	}

?>