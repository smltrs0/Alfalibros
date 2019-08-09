<?php 

	require_once('../classes/venta.php');

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$cliente = $_POST['cliente'];
		$libro = $_POST['libro'];
		$cantidad = $_POST['cantidad'];
		$forma_de_pago = $_POST['forma_de_pago'];

		$venta = new venta();

		if($venta->set_values($cliente,$libro,$cantidad,$forma_de_pago))
		{
			$venta->save_on_db();
			echo 'todo en orden';
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