<?php 

session_start();
// Siempre que se ejecute este codigo se agregara al array "carrito" los datos del libro
$carrito = $_SESSION['carrito'][]=array('id'=>'15','nombre'=>'chompa','precio' => '25bsf');
$carrito = $_SESSION['carrito'][]=array('id'=>'18','nombre'=>'Polo','precio' => '55bsf');
echo "<pre>";
print_r($_SESSION['carrito']);
echo "</pre>";


// Imprimimos lo que tenemos almacanado
echo $carrito [0] [0] [0]. "<br>";

// Eliminamos la sesion para (esto es mientras testeo como hacer lo del carrito de compra)
session_destroy();


 ?>