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
// de esta manera verificamos la existencia del producto
   // $id_request = $_POST['product_code'];
   // $cantidad = $_POST['cantidad'];

    $libro = get::libro_by_id(1);
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

	else
		{
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
echo "***************Esto es lo que esta almacenado en la sesion*********************</br>";
print_r($_SESSION["carrito"]);
//session_destroy();

//Eliminamos el id seleccionado del array
//unset($_SESSION["carrito"][md5($libro["id_libro"])]); 



echo "***************Esto es lo que imprimiria los productos agregados al carrito *********************</br>";

$sum=0;
foreach($_SESSION["carrito"] as $keys => $values){

echo "ID: ".$values["item_id"]."<br>";
echo "Precio: ".$values["item_price"]."<br>"; 
$sum += $values["item_price"];

}


echo "Subtotal: ".$sum."<br>";
echo "IVA: ".($iva=(12 / 100) * $sum)."<br>";
$total=($iva+$sum);
echo "Neto a pagar: ".$total;
?>