<?php
    require_once('../classes/categoria.php');

    $categorias = new categoria();

    $categorias = $categorias->get_all();



            



        echo json_encode($categorias);
