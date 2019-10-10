<?php 


// Si se ejecuta este codigo se elimina todo lo que esta contenido en el carrito de compra

session_start();
unset($_SESSION["carrito"]);
echo "Carrito vacio";
 ?>