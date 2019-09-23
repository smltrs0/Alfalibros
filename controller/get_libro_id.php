<?php 
session_start();

     // CARGANDO LAS CONSTANTES DE RUTAS
    require('../config.path.php');

    // CARGANDO LAS HERRAMIENTAS SOLO UNA VEZ PARA NO GENERAR CONFLICTOS DE CLASES DUPLICADAS O DE RUTAS
    require(TOOLS.'db_connector.php');
    require(TOOLS.'check.php');
    require(TOOLS.'cleaning.php');
    require(TOOLS.'get.php');

// como la consulta la vamos a hacer usando ajax... 
   // $id_request = $_POST['product_code'];

    $libro = get::libro_by_id(4);
echo "<pre>";
print_r($libro);
echo "<pre>";




if(isset($libro) && !empty($libro))
{

	if(isset($_SESSION["carrito"]))
	{

		$item_array_id = array_column($_SESSION["carrito"], "item_id");
		// con in_array()lo que hacemos es comprobar si un valor existe en el array
		if(!in_array($libro["id_libro"], $item_array_id))

		{
			$count = count($_SESSION["carrito"]);
			$item_array = array(
			'item_id' => $libro["id_libro"],
			'item_name' => $libro["titulo"],
			'item_price' => $libro["precio"]
			);

			$_SESSION["carrito"][md5($libro["id_libro"])] = $item_array;

		}else
			{
				// Aqui se tendria que actualizar la cantidad
				echo '<script>alert("El producto ya se encuentra agregado");
				</script>';
			}

	}

	else{
			$item_array = array(
			'item_id' => $libro["id_libro"],
			'item_name' => $libro["titulo"],
			'item_price' => $libro["precio"]
			);

			$_SESSION["carrito"][md5($libro["id_libro"])] = $item_array;
		}

}
else 
{
	echo '<script>alert("El producto No existe");
				</script>';
}

print_r($_SESSION["carrito"]);
//session_destroy();


?>