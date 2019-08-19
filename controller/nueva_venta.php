<?php 

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		// CARGANDO LAS CONSTANTES DE RUTAS
	    require('../config.path.php');

	    // CARGANDO EL ARCHIVO DEl HELPERS SOLO UNA VEZ PARA NO GENERAR CONFLICTOS DE CLASES DUPLICADAS
	    require(TOOLS.'db_connector.php');
	    require(TOOLS.'check.php');
	    require(TOOLS.'cleaning.php');
	    require(TOOLS.'get.php');
	    require(TOOLS.'finanzas.php');

	    require(MODELS.'venta.php');

		$cliente = $_POST['cliente'];
		$libro = $_POST['libro'];
		$cantidad = $_POST['cantidad'];
		$forma_de_pago = $_POST['forma_de_pago'];

		$venta = new venta();

		if($venta->set_values($cliente,$libro,$cantidad,$forma_de_pago))
		{
			$venta->save_on_db();
		}
		else
		{
			die('ERROR AL CARGAR EL OBJETO');
		}
		

		header('location: ../ventas.php');
	}
	else
	{
		die('NO SE HA RECIBIDO NINGUN DATO');
	}


?>