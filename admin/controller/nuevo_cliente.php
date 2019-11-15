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
	    
	    require(MODELS.'cliente.php');

		$tipo_de_documento = $_POST['tipo_de_documento'];
		$cedula = $_POST['cedula'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$direccion = $_POST['direccion'];
		$telefono = $_POST['telefono'];

		$cliente = new cliente();

		if($cliente->set_values($tipo_de_documento,$cedula,$nombre,$apellido,$direccion,$telefono))
		{
			$cliente->save_on_db();
		}
		else
		{
			die('ERROR AL CARGAR EL OBJETO');
		}

		header('location: ../clientes.php');
	}
	else
	{
		die('NO SE HAN RECIBIDO DATOS');
	}
	
?>