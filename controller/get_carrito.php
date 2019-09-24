<?php 
session_start();

echo json_encode($_SESSION['carrito']);
/*

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
*/

