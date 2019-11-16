<?php 
    
    // CARGANDO LAS CONSTANTES DE RUTAS
    require('config.path.php');

    // CARGANDO LAS HERRAMIENTAS SOLO UNA VEZ PARA NO GENERAR CONFLICTOS DE CLASES DUPLICADAS O DE RUTAS
    require(TOOLS.'db_connector.php');
    require(TOOLS.'check.php');
    require(TOOLS.'cleaning.php');
    require(TOOLS.'get.php');
 $user_levels = get::all_items('user_level');
    $preguntas = get::all_items('pregunta_de_seguridad');
    // CARGANDO EL VIEW DEL DOCUMENTO
    require(VIEWS_WEB.'usuarios.view.php');


?>