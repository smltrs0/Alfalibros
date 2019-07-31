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
                <div class="card p-3 col-5 mr-3">
                    <div class="card-header">Cambiar foto de perfil</div>
<img src="http://placehold.it/400x400">
                <input type="file" name="" class="mt-4">
             </div>
             <div class="card p-3 col-6">
                <div class="card-header mb-4">Modificar información del perfil</div>

                <form>
                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="" name="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Apellido</label>
                        <input type="" name="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Correo Electrónico</label>
                        <input type="" name="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Contraseña</label>
                        <input type="" name="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Repetir contraseña</label>
                        <input type="" name="" class="form-control">
                    </div>
                    <input type="submit">
                </form>
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
