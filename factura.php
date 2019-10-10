<?php 

    // CARGANDO LAS CONSTANTES DE RUTAS
    require('config.path.php');

    // CARGANDO EL ARCHIVO DEl HELPERS SOLO UNA VEZ PARA NO GENERAR CONFLICTOS DE CLASES DUPLICADAS
    require(TOOLS.'db_connector.php');
  
    require(TOOLS.'cleaning.php');
  

    // CARGANDO EL VIEW DEL DOCUMENTO
    require(VIEWS_WEB.'factura.view.php');

?>