<?php
require('../config.path.php');
require(TOOLS.'db_connector.php');
require(MODELS.'proveedor.php');
$proveedor = new proveedor();

	if (isset($_POST["id"])) {
		$id = $_POST["id"];
	}
	$cod_tipo_documento = $_POST["cod_tipo_documento"];
	$nombre   = $_POST["nombre"];
	$apellido = $_POST["apellido"];
	$documento   = $_POST["documento"];
	$nombre_comercial = $_POST["nombre_comercial"];
	$direccion    = $_POST["direccion"];
	$telefono    = $_POST["telefono"];

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		
		$result = $proveedor->crear($cod_tipo_documento, $nombre, $apellido, $documento, $nombre_comercial, $direccion, $telefono);
		
		if(!empty($result))
		{
			echo true;
		}else{
			echo false;
		}
	}
	elseif($_POST["operation"] == "Edit")
	{

		$result = $proveedor->editar($id, $cod_tipo_documento, $nombre, $apellido, $documento, $nombre_comercial, $direccion, $telefono);

		if(!empty($result))
		{	
			echo true;
		}else{
			echo false;
		}
	}
	
}

?>