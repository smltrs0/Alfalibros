<?php 
  require (TEMPLATES.'head.php');
?>
<body>
  <?php
    require (TEMPLATES.'menu.php');
   ?>

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <?php 
        require (TEMPLATES.'header.php');
         ?>
        <!-- Content -->
        <div class="content">
<?php 
require (TEMPLATES.'breadcrumb.php');
 ?>

            
<div class="row">
                <div class="card p-3 col-5 mr-3">
                    <div class="card-header">Cambiar foto de perfil</div>
<img class="card-img-top" src="uploaded_files/users/<?php echo  $_SESSION['image'];?>">
                <input type="file" name="" class="mt-4">
             </div>
             <div class="card p-3 col-6">
                <div class="card-header mb-4">Modificar información del perfil</div>

                <form>
                    <div class="form-group">
                        <input type="text" name="id" value="<?php echo  $_SESSION['id'];?>" hidden>
                        <label>Nombre</label>
                        <input type="" name="" class="form-control" value="<?php echo  $_SESSION['nombre'];?>">
                    </div>
                    <div class="form-group">
                        <label>Apellido</label>
                        <input type="" name="" class="form-control" value="<?php echo  $_SESSION['apellido'];?>">
                    </div>
                    <div class="form-group">
                        <label>Nombre de usuario</label>
                        <input type="" name="" class="form-control" value="<?php echo  $_SESSION['username'];?>">
                    </div>
                    <div class="form-group">
                        <label>Correo Electrónico</label>
                        <input type="" name="" class="form-control" value="<?php echo  $_SESSION['email'];?>">
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
require (TEMPLATES.'scripts.php');
 ?>

</body>
</html>