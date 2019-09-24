<?php 
session_start();
echo session_id();

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
   // $cantidad = $_POST['cantidad'];

    $libro = get::libro_by_id($id_request);
echo "<pre>";
print_r($libro);




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
				console.log("El producto ya existe");
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
$total_items = count($_SESSION["carrito"]);
echo $total_items; // Indicador de cantidad de objetos en el carrito
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
foreach($_SESSION["carrito"] as $keys => $values)
{
	echo "Nombre: ".$values["item_name"]."<br>";
	echo sprintf("%01.2f",($values["item_price"] * 1))."<br>";// Con sprintf lo que hacemos es agregarle .00 para que sea mas agradable a la vista
	$subtotal = ($values["item_price"] * 1);
	$sum += $subtotal;
}

echo "Subtotal: ".$sum."<br>";
echo "IVA 12% :".($iva=(12 / 100) * $sum)."<br>";
$total=($iva+$sum);
echo "Total Neto: ".$total;


// Esto se encargara de mostrar y actualizar los elementos del carrito
if(isset($_POST["load_cart"]) && $_POST["load_cart"]==1)
{

	if(isset($_SESSION["products"]) && count($_SESSION["products"])>0){ //if we have session variable
		$cart_box = '<ul class="cart-products-loaded">';
		$total = 0;
		foreach($_SESSION["products"] as $product){ //loop though items and prepare html content
			
			//set variables to use them in HTML content below
			$product_name = $product["product_name"]; 
			$product_price = $product["product_price"];
			$product_code = $product["product_code"];
			$product_cantidad = $product["product_cantidad"];
			
			$cart_box .=  "<li> $product_name (Cantidad : $product_cantidad  |  ) &mdash; $currency ".sprintf("%01.2f", ($product_price * $product_cantidad)). " <a href=\"#\" class=\"remove-item\" data-code=\"$product_code\">&times;</a></li>";
			$subtotal = ($product_price * $product_cantidad);
			$total = ($total + $subtotal);
		}
		$cart_box .= "</ul>";
		$cart_box .= '<div class="cart-products-total">Total : '.$currency.sprintf("%01.2f",$total).' <u><a href="pagar_carrito.php" title="Ver los itens y Procesar la compra">Terminar Compra</a></u></div>';
		die($cart_box); //exit and output content
	}else{
		die("Tu carrito esta vacio"); //we have empty cart
	}
}
