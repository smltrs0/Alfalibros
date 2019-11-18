<?php 

    // CARGANDO LAS CONSTANTES DE RUTAS
    require('config.path.php');

    // CARGANDO EL ARCHIVO DEl HELPERS SOLO UNA VEZ PARA NO GENERAR CONFLICTOS DE CLASES DUPLICADAS
    require(TOOLS.'db_connector.php');
    require(TOOLS.'check.php');
    require(TOOLS.'cleaning.php');
    require(TOOLS.'get.php');

    $clientes              = get::all_items('cliente');
    $tipos_de_documento    = get::all_items('tipo_de_documento');

    // CARGANDO EL VIEW DEL DOCUMENTO
    require(VIEWS_WEB.'clientes.view.php');


?>