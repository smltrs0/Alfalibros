<?php 
    
    // CARGANDO LAS CONSTANTES DE RUTAS
    require('config.path.php');

    // CARGANDO EL ARCHIVO DEl HELPERS SOLO UNA VEZ PARA NO GENERAR CONFLICTOS DE CLASES DUPLICADAS
    require(TOOLS.'db_connector.php');
    require(TOOLS.'check.php');
    require(TOOLS.'cleaning.php');
    require(TOOLS.'get.php');

    $registro_ventas = get::all_items('factura');
    $clientes = get::all_items('cliente');
    $libros = get::all_items('info_libro');
    $forma_de_pago = get::all_items('forma_de_pago');
    
    // CARGANDO EL VIEW DEL DOCUMENTO
    require(VIEWS_WEB.'procesar_compra.view.php');


?>