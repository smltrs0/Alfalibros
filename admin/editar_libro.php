<?php 

     // CARGANDO LAS CONSTANTES DE RUTAS
    require('config.path.php');

    // CARGANDO LAS HERRAMIENTAS SOLO UNA VEZ PARA NO GENERAR CONFLICTOS DE CLASES DUPLICADAS O DE RUTAS
    require(TOOLS.'db_connector.php');
    require(TOOLS.'check.php');
    require(TOOLS.'cleaning.php');
    require(TOOLS.'get.php');

    $id_request = $_GET['id'];
    $autores    = get::all_items('autor');
    $categorias = get::all_items('categoria');
    $libro = get::libro_by_id($id_request);


    // CARGANDO EL VIEW DEL DOCUMENTO
    require(VIEWS_WEB.'editar_libro.view.php');


?>