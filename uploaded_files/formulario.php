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
                <div class="row mb-3 animated bounceInRight ">
                    <div class="col-sm-4">
                        <div class="page-header float-left shadow">
                            <div class="page-title">
                                <h1> <i class="fa fa-user fa-2x degra_home">
                                </i>   Usuario</h1>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Animated test -->

            <div class="row animated bounceInUp">
                <div class="card col-xl-12">
                    <div class="card-header text-center">
                        Agregar usuario
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label>Nombre</label>
                                <input class="form-control" type="text" name="">
                            </div>
                            <div class="form-group">
                                <label>Apellido</label>
                                <input class="form-control" type="text" name="">
                            </div>
                            <div class="form-group">
                                <label>Correo electronico</label>
                                <input class="form-control" type="email" name="">
                            </div>
                            <div class="form-group">
                                <label>Contraseña</label>
                                <input class="form-control" type="password" name="">
                            </div>
                            <div class="form-group">
                                <label>Repetir contraseña</label>
                                <input class="form-control" type="password" name="">
                            </div>
                            <input class="btn btn-success" type="submit">

                        </form>
                    </div>
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
