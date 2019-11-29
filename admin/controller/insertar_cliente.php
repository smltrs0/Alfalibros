<?php 
	
if($_SERVER['REQUEST_METHOD'] == 'POST')
{		
		require('../config.path.php');
	   	require(TOOLS.'db_connector.php');
		require(MODELS.'cliente.php');
		require (MODELS.'datos_personales.php');

		$datos_personales = new datos_personales();
		$cliente= new cliente();

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
		$id_datos_personales = $datos_personales->crear($tipo_de_documento, $nombre, $apellido, $cedula, $direccion, $telefono);
		// 
		if ($id_datos_personales) {
			$res = $cliente->crear($id_datos_personales);
		echo $res;
		}


	}

	if($_POST["operation"] == "Edit")
	{
		//id del cliente
		$id= $_POST['id'];
		// id de los datos personales del cliente
		$id_datos_personales = $_POST['id_datos_personales'];
		$result = $datos_personales->editar($id_datos_personales,$tipo_de_documento,$nombre,$apellido,$cedula,$direccion, $telefono);
				
				if ($result) {
					echo TRUE;
				}else{
					echo false;
				}
	}
		

		




	}
	else
	{
		die('NO SE HA RECIBIDO NINGUN DATO');
	}

}

?>