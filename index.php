<?php 
    
    // CARGANDO LAS CONSTANTES DE RUTAS
    require('config.path.php');

    // CARGANDO LAS HERRAMIENTAS SOLO UNA VEZ PARA NO GENERAR CONFLICTOS DE CLASES DUPLICADAS O DE RUTAS
    require(TOOLS.'db_connector.php');
    require(TOOLS.'check.php');
    require(TOOLS.'cleaning.php');
    require(TOOLS.'get.php');

    $cant_inventario    = get::total_items('info_libro');
    $cant_ventas        = get::total_items('factura');
    $activos            = get::total_activos();

    // CARGANDO EL VIEW DEL DOCUMENTO
    require(VIEWS_WEB.'index.view.php');


?>