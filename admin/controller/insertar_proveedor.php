<?php
require('../config.path.php');
require(TOOLS.'db_connector.php');
require(MODELS.'proveedor.php');
require (MODELS.'datos_personales.php');

$datos_personales = new datos_personales();
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

		$id_datos_personales = $datos_personales->crear($cod_tipo_documento, $nombre, $apellido, $documento, $direccion, $telefono);
		
		if ($id_datos_personales) {
			$result = $proveedor->crear_proveedor($id_datos_personales, $nombre_comercial);
			if ($result) {
				echo TRUE;
			}
		}else{
			echo FALSE;
		}
		
	}
	elseif($_POST["operation"] == "Edit")
	{

		$result = $proveedor->editar_proveedor($id,$nombre_comercial);


		if ($result) {
			$id_datos_personales = $_POST['id_datos_personales'];
			$res = $datos_personales->editar($id_datos_personales,$cod_tipo_documento,$nombre,$apellido,$documento,$direccion, $telefono);
				
				if ($result) {
					echo TRUE;
				}
		} else {
			echo false;
		}


		
	}
	
}

?>