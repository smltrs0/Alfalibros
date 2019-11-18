<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	    require('../config.path.php');
	    require(TOOLS.'db_connector.php');
		require(MODELS.'categoria.php');
		$categoria_obj = new categoria();

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$categoria = $_POST['categoria'];
		$res = $categoria_obj->crear($categoria);
		echo $res;
	}

	if($_POST["operation"] == "Edit")
	{
		$id = $_POST['id'];
		$categoria = $_POST['categoria'];

		$res = $categoria_obj->editar($id, $categoria);

		echo $res;


	}
		

		




	}
	else
	{
		die('NO SE HA RECIBIDO NINGUN DATO');
	}

}
?>