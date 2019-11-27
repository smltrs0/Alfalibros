<?php 

    // CARGANDO LAS CONSTANTES DE RUTAS
    require('config.path.php');

    // CARGANDO EL ARCHIVO DEl HELPERS SOLO UNA VEZ PARA NO GENERAR CONFLICTOS DE CLASES DUPLICADAS
    require(TOOLS.'db_connector.php');
    require(TOOLS.'check.php');
    require(TOOLS.'cleaning.php');
    require(TOOLS.'get.php');

    $proveedor = get::all_items('proveedor');

    $libros = get::all_items('info_libro');


    // CARGANDO EL VIEW DEL DOCUMENTO
    require(VIEWS_WEB.'abastecer.view.php');

?>