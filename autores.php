<?php

    require_once('classes/autor.php');

    $autores = new autor();

    $autores = $autores->get_all();

?>



<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js" lang="es"> 
<!--<![endif]-->
<?php 
include 'include/head.php';
 ?>

<body>
  <?php
include'include/menu.php';
   ?>

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <?php 
        include 'include/header.php';
         ?>
        <!-- Content -->
        <div class="content">
<?php 
include 'include/breadcrumb.php';
 ?>
 <div class="row">
              <div class="card shadow-blue"> 
              <?php include 'modal/agregar_autor.php'; ?>
              </div>
            </div>

            <!-- Animated test -->
            <div class="card p-3 col-12">

                <table id="Tabla" class="">
    <thead>
        <tr>
            <th>Column 1</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tbody>
        
        <?php if ($autores): ?>

            <?php foreach ($autores as $key): ?>

                <tr>
                    <td><?php echo $key['autor']; ?></td>
                    <td>edit</td>
                </tr>
            
            <?php endforeach ?>
            
        <?php else: ?>

            <tr>
                <td>NO SE HAN ENCONTRADO ITEMS</td>
            </tr>

        <?php endif ?>
        
    </tbody>
</table>
             </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /#right-panel -->
<?php 
include 'include/scripts.php';
 ?>

</body>
</html>
