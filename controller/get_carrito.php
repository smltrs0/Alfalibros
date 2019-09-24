<?php 
session_start();
          if (isset($_SESSION["carrito"])) 
         {

         	 
         //Listando los productos agregados al carrito
         foreach($_SESSION["carrito"] as $keys => $values)
         {
         echo " <li class='list-group-item'>".$values["item_name"]." <span class='badge badge-primary badge-pill'>".$values["item_loot"]."</span><button type='button' class='close' aria-label='Eliminar'><span aria-hidden='true'>&times;</span></button></li>";
         }

             }else{
         echo "<li class='list-group-item'>Tu carrito de compra esta vació</li>";
         }


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

