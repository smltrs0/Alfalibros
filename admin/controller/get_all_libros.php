<?php 
    require(TOOLS.'db_connector.php');
    require(TOOLS.'get.php');


    $libros = get::all_items('info_libro');
    echo json_encode($libros);
 ?>