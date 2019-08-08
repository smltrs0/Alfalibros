<?php 

	require_once('../classes/cliente.php');

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



?>