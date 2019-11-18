<?php 

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		 require('../config.path.php');
	    // CARGANDO EL ARCHIVO DEl HELPERS SOLO UNA VEZ PARA NO GENERAR CONFLICTOS DE CLASES DUPLICADAS
	    require(TOOLS.'db_connector.php');
		require(MODELS.'cliente.php');
	    $cliente= new cliente();
		$tipo_de_documento = $_POST['tipo_de_documento'];
		$cedula = $_POST['cedula'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$direccion = $_POST['direccion'];
		$telefono = $_POST['telefono'];

echo $res = $cliente->crear($tipo_de_documento, $cedula, $nombre, $apellido, $direccion, $telefono);
		echo $res;

	}
	else
	{
		die('NO SE HAN RECIBIDO DATOS');
	}
	
?>