<?php     
require(TEMPLATES.'head.php');
 ?>

<body>
  <?php
require(TEMPLATES.'menu.php');
   ?>

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <?php 
        require(TEMPLATES.'header.php');
         ?>
        <!-- Content -->
        <div class="content">
<?php 
require(TEMPLATES.'breadcrumb.php');
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
                <a href="detalle_libro?id=<?php echo $key['id_info_libro']?>" class="card mb-2">
                  <!--Aqui tendira que ir ?id=id para procesarlo por get-->
                    <?php if(!is_null($key['ruta_imagen'])): ?>
                        <!-- class height-27 mantiene las imagenes siempre en 275 px -->
                        <img class="card-img-top img-fluid height-275" src="<?php echo $key['ruta_imagen']; ?>" alt="Card image cap"> 
                    <?php else: ?>
                         <img class="card-img-top img-fluid height-275" src="images/no_image.png" alt="Card image cap">
                    <?php endif ?>
                        <div class="card-body">
                            <h4 class="card-title"><?php echo $key['titulo']; ?></h4>
                            <p class="card-text">Precio: <?php echo $key['precio']; ?> BsS</p>

                            <?php if ($key['cantidad'] > 0): ?>

                                <strong class="text-success">DISPONIBLE</strong>

                            <?php else: ?>

                                <p class="text-danger">NO DISPONIBLE</p>
                                
                            <?php endif ?>

                            <p class="card-text"><small class="text-dark"><?php echo $key['autor'] ?></small></p>
                        </div>
                </a>
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
require(TEMPLATES.'scripts.php');
 ?>

</body>
</html>
