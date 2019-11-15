<?php 
session_start();
$id=$_POST['id'];
echo $id;

unset($_SESSION["carrito"][md5($id)]);

//con esto soluciono un error simple :3 ya que si el carrito no tiene ningun elemento eliminamos el carrito en si...
$contador = count($_SESSION["carrito"]);
if ($contador==0) {
	unset($_SESSION["carrito"]);
	echo "<script>location.reload();</script>";
}
 ?>