<?php 
    
    // CARGANDO LAS CONSTANTES DE RUTAS
    require('config.path.php');

    // CARGANDO LAS HERRAMIENTAS SOLO UNA VEZ PARA NO GENERAR CONFLICTOS DE CLASES DUPLICADAS O DE RUTAS
    require(TOOLS.'db_connector.php');
    require(TOOLS.'get.php');

    $autores    = get::all_items('autor');
    $categorias = get::all_items('categoria');
    

    // CARGANDO EL VIEW DEL DOCUMENTO
    require(VIEWS_WEB.'agregar_libro.view.php');


?>