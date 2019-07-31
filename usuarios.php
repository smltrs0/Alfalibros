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

            <!-- Animated test -->
            <div class="row animated bounceInDown">
               <table class="table table-hover bg-white shadow">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido</th>
      <th scope="col">Correo</th>
      <th scope="col">Estado</th>
      <th scope="col">Tipo de usuario</th>
       <th scope="col">Acción</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>Otto</td>
      <td></td>
      <td><a href="" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a> <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash-alt"></i></a></td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
       <td>Otto</td>
      <td>@mdo</td><td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td colspan="2">Larry the Bird</td>
      <td>@twitter</td>
      <td>Otto</td>
      <td>@mdo</td><td>@mdo</td>
    </tr>
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
