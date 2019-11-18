<?php 

include_once '../models/factura.php';

$id=36 ;//$_GET['id'];
$usuario = new factura();
$result = $usuario->get_factura($id);

// Simplificamos la informacion capturada
foreach ($result as $key => $value) {

// datos de los libros 
	$documento = $value['documento'];
	$nombre =$value['nombre'];
	$apellido = $value['apellido'];
	$direccion = $value['direccion'];
	$telefono =  $value['telefono'];
	$iva =  $value['IVA'];
	  $libros[]['libros'] = $arrayName = array("titulo" =>$value['titulo'],"autor" =>$value['autor'],"cantidad" =>$value['cantidad'],"precio" =>$value['precio']);

}
$arrayName =   array ("documento" => $documento,"nombre" =>$nombre,"apellido" =>$apellido,"direccion" =>$direccion,"telefono" =>$telefono,"iva" =>$iva);

array_push($libros,$arrayName);
echo $json = json_encode($libros);

   