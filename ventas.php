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
              <?php include 'modal/agregar_venta.php'; ?>
              </div>
            </div>

            <!-- Animated test -->
            <div class="row">
                <div class="card p-3 col-12">

                <table id="Tabla" class="display">
    <thead>
        <tr>
            <th>Column 1</th>
            <th>Column 2</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Row 1 Data 1</td>
            <td>Row 1 Data 2</td>
        </tr>
        <tr>
            <td>Row 2 Data 1</td>
            <td>Row 2 Data 2</td>
        </tr>
    </tbody>
</table>
             </div>
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
