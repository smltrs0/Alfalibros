<?php 

include_once '../models/factura.php';

$id=$_GET['id'];
$usuario = new factura();
$result = $usuario->get_factura($id);

echo json_encode($result);