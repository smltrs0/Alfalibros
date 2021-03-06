<?php 

	//{
		// CARGANDO LAS CONSTANTES DE RUTAS
	    require('../config.path.php');

	    // CARGANDO EL ARCHIVO DEl HELPERS SOLO UNA VEZ PARA NO GENERAR CONFLICTOS DE CLASES DUPLICADAS
	    require(TOOLS.'db_connector.php');
	    require(TOOLS.'check.php');
	    require(TOOLS.'cleaning.php');
	    require(TOOLS.'get.php');
	    require(TOOLS.'finanzas.php');
	    require(MODELS.'venta.php');
	    	$venta = new venta();
	    // Estos datos seran insertados en la tabla factura la cual guardara esa informacion, aparte tiene que hacer una return de el id de la factura que se creo, la funcion se llama lastInsertId() , ya que sera la llave foranea de detalle factura.

session_start();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
					if (isset($_POST['cliente']) && !empty($_POST['cliente']) && isset($_POST['method']) && !empty($_POST['method'])) {
						$cliente = $_POST['cliente'];
						$forma_de_pago = $_POST['method'];
					$total=0;
		foreach ($_SESSION['carrito'] as $key => $items) {
			 $total += $items['item_price'] * $items['item_loot'];
		}


				    	$id_factura = $venta->registrar_factura($cliente,$forma_de_pago,$total);
				    	 print($id_factura);
				    	 // Si se insertan los datos en la tabla factura 
				    	 	if ($id_factura==0)
				    	 	{
								echo "No se insertaron los datos de la factura, algun campo esta vacio o ocurrio un error interno.";
							}else{
								// Preparando el array con los datos necesarios 
	$total=0;
		foreach ($_SESSION['carrito'] as $key => $items) {
			// Creamos un array con solo los datos que vamos a insertar en la tabla detalle venta
			$arrayName [] = ['id_producto' => $items['item_id'],
								'cantidad' =>$items['item_loot'],
								'precio'=>$items['item_price'], 
								'id_factura'=> $id_factura];
								 $total += $items['item_price'] * $items['item_loot'];
		}
		



								// Insertamos los detalles de la factura
							$res = $venta->registrar_detalles_factura($arrayName);
							if ($res == TRUE) 
							{
															// Este foreach es para actualizar la cantidad actuali del inventario
							foreach ($_SESSION['carrito'] as $key => $items) 
							{
								// Creamos un array con solo los datos que vamos a insertar en la tabla detalle venta
								 $cantidadlibro= get::cantidad_libro($items['item_id']);// tomamos la cantidad actual para restarle los que se compraron
								 if ($cantidadlibro <= 0) {
								 	die('error libro inexistente');
								 }else{

									$actualizacion[] = array(
									'idlibro'   => $items['item_id'],
									'cantidad'   => ($cantidadlibro - $items['item_loot'])
													  );
								 }

							}	
										$venta->actualizar_cantidad($actualizacion); // Actualizamos la cantidad de los libros

								// Se insertaron los datos en la base correctamente asi que eliminamos el carrito de compra
								unset($_SESSION['carrito']);
								echo "COMPLETE";
							}
								}
				
					}else {
						// echo 'No pueden existir campos vacíos o sin definir';
						echo 'Error=2';
					}
	}


?>