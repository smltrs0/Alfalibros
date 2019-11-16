<?php 

    // CARGANDO LAS CONSTANTES DE RUTAS
    require('config.path.php');

    // CARGANDO EL ARCHIVO DEl HELPERS SOLO UNA VEZ PARA NO GENERAR CONFLICTOS DE CLASES DUPLICADAS
    require(TOOLS.'db_connector.php');
    require(TOOLS.'get.php');
    $tipos_de_documento    = get::all_items('tipo_de_documento');

    require(VIEWS_WEB.'proveedores.view.php');
