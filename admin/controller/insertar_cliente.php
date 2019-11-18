<?php 
	
if($_SERVER['REQUEST_METHOD'] == 'POST')
{		
		require('../config.path.php');
	   	require(TOOLS.'db_connector.php');
		require(MODELS.'cliente.php');

		$tipo_de_documento = $_POST['tipo_de_documento'];
		$cedula = $_POST['cedula'];
		$nombre = $_POST['nombre'];
		$apellido = $_POST['apellido'];
		$direccion = $_POST['direccion'];
		$telefono = $_POST['telefono'];

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$res = cliente::crear($tipo_de_documento, $cedula, $nombre, $apellido, $direccion, $telefono);
		echo $res;


	}

	if($_POST["operation"] == "Edit")
	{
		$id= $_POST['id'];

		$res = cliente::editar($id, $tipo_de_documento, $cedula, $nombre, $apellido, $direccion, $telefono);
		echo $res;
	}
		

		




	}
	else
	{
		die('NO SE HA RECIBIDO NINGUN DATO');
	}

}

?>