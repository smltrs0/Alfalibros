<?php

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
	    require('../config.path.php');
	    require(TOOLS.'db_connector.php');
		require(MODELS.'autor.php');
		$autor_obj = new autor();

if(isset($_POST["operation"]))
{
	if($_POST["operation"] == "Add")
	{
		$autor = $_POST['autor'];
		$res = $autor_obj->crear($autor);
		echo $res;
	}

	if($_POST["operation"] == "Edit")
	{
		$id = $_POST['id'];
		$autor = $_POST['autor'];

		$res = $autor_obj->editar($id, $autor);

		echo $res;


	}
		

		




	}
	else
	{
		die('NO SE HA RECIBIDO NINGUN DATO');
	}

}
?>