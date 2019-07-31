<?php 

    require_once('classes/info_libro.php');

    $libros = new info_libro();
    $libros = $libros->get_all_info_libro();
    
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
            <div class=" animated bounceInDown">
            <form>
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Buscar libro">
                  <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="button">Buscar</button>
                </div>
              </div>  
            </form>
            </div>
            <div class="container">
    <div class="card-deck">

        <?php if ($libros): ?>

            <?php foreach ($libros as $key): ?>
                
                <div class="card mb-2">

                    <?php if(!is_null($key['ruta_imagen'])): ?>
                        <!-- LE AGREGUE UNA CLASE PARA QUE ESTOS IMG SIEMPRE SEAN DE 200PX -->
                        <img class="card-img-top img-fluid height-275" src="<?php echo $key['ruta_imagen']; ?>" alt="Card image cap"> 
                    <?php else: ?>
                         <img class="card-img-top img-fluid height-275" src="images/no_image.png" alt="Card image cap">
                    <?php endif ?>

                        <div class="card-body">
                            <h4 class="card-title"><?php echo $key['titulo']; ?></h4>
                            <p class="card-text">Precio: <?php echo $key['precio']; ?> BsS</p>

                            <?php if ($key['cantidad'] > 0): ?>

                                <p class="text-success">DISPONIBLE</p>

                            <?php else: ?>

                                <p class="text-danger">NO DISPONIBLE</p>
                                
                            <?php endif ?>

                            <p class="card-text"><small class="text-dark"><?php echo $key['autor'] ?></small></p>
                        </div>
                </div>

            <?php endforeach ?>
            

        <?php else: ?>

           <!--Ve que no es necesario las mayusculas para resaltar algo :P -->
     <div class="col-12">
               <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                    <strong>No existen libros que mostrar!</strong> 
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
     </div>


        <?php endif ?>



        


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
