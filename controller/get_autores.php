<?php

    require_once('../classes/autor.php');
    $autores = new autor();
    $autores = $autores->get_all();
    echo json_encode($autores);
