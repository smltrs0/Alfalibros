<?php 

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		// CARGANDO LAS CONSTANTES DE RUTAS
	    require($_SERVER['DOCUMENT_ROOT'].'/alfalibros-master/config/path.php');

	    // CARGANDO EL ARCHIVO DEl HELPERS SOLO UNA VEZ PARA NO GENERAR CONFLICTOS DE CLASES DUPLICADAS
	    require(TOOLS_PATH.'db_connector.php');
	    require(TOOLS_PATH.'check.php');
	    require(TOOLS_PATH.'cleaning.php');
	    require(TOOLS_PATH.'get.php');
	    
	    require(MODELS_PATH.'cliente.php');

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