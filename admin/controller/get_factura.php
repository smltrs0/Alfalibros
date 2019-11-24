<?php 

include_once '../models/factura.php';
if (isset($_GET['id'])) {
$id=$_GET['id'];
$usuario = new factura();
$result = $usuario->get_factura($id);

echo json_encode($result);

}else{
	echo FALSE;
}

   