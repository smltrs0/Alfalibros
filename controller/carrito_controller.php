<?php 
session_start();
     // CARGANDO LAS CONSTANTES DE RUTAS
    require_once('../config.path.php');
    // CARGANDO LAS HERRAMIENTAS SOLO UNA VEZ PARA NO GENERAR CONFLICTOS DE CLASES DUPLICADAS O DE RUTAS
    require_once(TOOLS.'db_connector.php');
    require_once(TOOLS.'check.php');
    require_once(TOOLS.'cleaning.php');
    require_once(TOOLS.'get.php');

// como la consulta la vamos a hacer usando ajax... 
// de esta manera verificamos la existencia del producto
   $id_request = $_POST['product_code'];
   $cantidad = $_POST['product_cantidad'];

    $libro = get::libro_by_id($id_request);
//echo "<pre>";
//print_r($libro);
//echo "/<pre>";




if(isset($libro) && !empty($libro))
{
	if(isset($_SESSION["carrito"]))
	{
		$item_array_id = array_column($_SESSION["carrito"], "item_id");
		// con in_array()lo que hacemos es comprobar si un valor existe en el array
		if(!in_array($libro["id_libro"], $item_array_id))
		{
			$item_array = array(
			'item_id' => $libro["id_libro"],
			'item_name' => $libro["titulo"],
			'item_price' => $libro["precio"],
			'item_loot'=> $cantidad
			);

			$_SESSION["carrito"][md5($libro["id_libro"])] = $item_array;

		}else
			{
				echo "actualizado";
			}
	}

	else
		{
			$item_array = array(
			'item_id' => $libro["id_libro"],
			'item_name' => $libro["titulo"],
			'item_price' => $libro["precio"],
			'item_loot'=> $cantidad
			);
			$_SESSION["carrito"][md5($libro["id_libro"])] = $item_array;
		}

//echo json_encode($_SESSION["carrito"], JSON_FORCE_OBJECT);

}
else 
	{
		echo '<script>alert("El producto No existe");
				</script>';
	}
	//echo "<pre>";
//print_r($_SESSION["carrito"]);


//session_destroy();
//Eliminamos el id seleccionado del array
//unset($_SESSION["carrito"][md5($libro["id_libro"])]); 


echo "***************Esto es lo que imprimiria los productos agregados al carrito *********************</br>";

$sum=0;
foreach($_SESSION["carrito"] as $keys => $values)
{
	echo "Nombre: ".$values["item_name"]."(".$values["item_loot"].")"."<br>";
	echo sprintf("%01.2f",($values["item_price"] * 1))."<br>";// Con sprintf lo que hacemos es agregarle .00 para que sea mas agradable a la vista

	$subtotal = ($values["item_price"] * $values["item_loot"]);
	$sum += $subtotal;
}

echo "Subtotal: ".$sum."<br>";
echo "IVA 12% :".($iva=(12 / 100) * $sum)."<br>";
$total=($iva+$sum);
echo "Total Neto: ".$total;


// Esto se encargara de mostrar y actualizar los elementos del carrito
if(isset($_POST["load_cart"]))
{

}


