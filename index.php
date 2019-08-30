<?php 
    
    // CARGANDO LAS CONSTANTES DE RUTAS
    require('config.path.php');

    // CARGANDO LAS HERRAMIENTAS SOLO UNA VEZ PARA NO GENERAR CONFLICTOS DE CLASES DUPLICADAS O DE RUTAS
    
    require_once(TOOLS.'db_connector.php');
    require_once(TOOLS.'check.php');
    require_once(TOOLS.'cleaning.php');
    require_once(TOOLS.'get.php');

    $cant_inventario    = get::total_items('info_libro');
    $cant_ventas        = get::total_items('factura');
    $activos            = get::total_activos();

    // CARGANDO EL VIEW DEL DOCUMENTO
    require(VIEWS_WEB.'index.view.php');


?>