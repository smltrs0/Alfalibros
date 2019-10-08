<?php 
session_start();

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		// CARGANDO LAS CONSTANTES DE RUTAS
	    require('../config.path.php');

	    // CARGANDO EL ARCHIVO DEl HELPERS SOLO UNA VEZ PARA NO GENERAR CONFLICTOS DE CLASES DUPLICADAS
	    require(TOOLS.'db_connector.php');
	    require(TOOLS.'check.php');
	    require(TOOLS.'cleaning.php');
	    require(TOOLS.'get.php');
	    require(TOOLS.'finanzas.php');
	    require(MODELS.'venta.php');

	    // Estos datos seran insertados en la tabla factura la cual guardara esa informacion, aparte tiene que hacer una return de el id de la factura que se creo, la funcion se llama lastInsertId() , ya que sera la llave foranea de detalle factura.
		$cliente = $_POST['cliente'];
		$forma_de_pago = $_POST['forma_de_pago'];





		/*esta funcion tiene que validar que se ejecute la funcion anterior*/

		// Esto hay que convertirlo en un objeto que almacene el id del libro y la cantidad 
		// ya que no solo se registrara la venta de un solo item
		//  hay que descomponer esos 2 datos de la variable $_SESSION['carrito'] y despues de insertarlos en la base de datos hacer unset()  a ella.
		$cantidad = $_POST['cantidad'];
		$libro = $_POST['libro']; 

		// un if que valide que los 2 procesos se realizaron correctamente y haga un return en base a ello, es para mostrar un alerta :v



		/*
		$venta = new venta();
		if($venta->set_values($cliente,$libro,$cantidad,$forma_de_pago))
		{
			$venta->save_on_db();
		}
		else
		{
			die('ERROR AL CARGAR EL OBJETO');
		}
		

		header('location: ../ventas.php');
		*/
	}
	else
	{
		echo ('NO SE HA RECIBIDO NINGUN DATO');


		// Preparando el array con los datos necesarios 
		echo "<pre>";
		foreach ($_SESSION['carrito'] as $key => $items) {
			// Creamos un array con solo los datos que vamos a insertar en la tabla detalle venta
			$arrayName [] = ['id_producto' => $items['item_id'],'cantidad' =>$items['item_loot'],'precio'=>$items['item_price'], 'id_factura'=> "id de la factura"];
		}
		print_r($arrayName);


	}


?>