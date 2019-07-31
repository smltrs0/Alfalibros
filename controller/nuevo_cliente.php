<?php 

	require_once('../classes/cliente.php');

	$cedula = $_POST['cedula'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$direccion = $_POST['direccion'];
	$telefono = $_POST['telefono'];

	$cliente = new cliente();

	if(!empty($telefono))
	{
		$cliente->set_values_cliente($cedula,$nombre,$apellido,$direccion,$telefono);
	}
	else
	{
		$cliente->set_values_cliente($cedula,$nombre,$apellido,$direccion);
	}


?>