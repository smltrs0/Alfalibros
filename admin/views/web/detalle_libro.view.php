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
 <div class="row">
  <div class="card col-12">
<?php if (!empty($libro)): ?>
      <div class="card-header mb-3">
           <div class="text-center">
                <strong><?php echo $libro['titulo']; ?></strong>
               
           </div>
            </div>
    <div class="row">
    <div class="col-sm-12 col-lg-6">
       <div class="m-1"> 
        <?php if(!is_null($libro['ruta_imagen'])): ?>
       <!-- class height-27 mantiene las imagenes siempre en 275 px -->
        <img class="" src="uploaded_files/img_books/<?php echo $libro['ruta_imagen']; ?>" alt="Card image cap"> 
        <?php else: ?>
        <img class=" height-275" src="images/no_image.png" alt="Card image cap">
        <?php endif ?>
      </div>
    </div>
    <div class=" col-sm-12 col-lg-6">
      <div class="card-body">
              <?php 

                  echo "id: ".$libro['id_libro']."</br>";
                  echo "Autor: ".$libro['autor']."</br>";
                  echo "Cantidad en existencia: ".$libro['cantidad']."</br>";
                  echo "Precio: ".$libro['precio']." </br>";
                  echo "Categoria: ".$libro['categoria']."</br>";
                  echo "Lanzamiento: ".$libro['fecha_lanzamiento']."</br>";
                  echo "Sinopsis:<p class='text-justify'> ".substr($libro['sinopsis'], 0,600)."...</p>";
 ?>

            </div>
    </div>
  </div>
  <div class="card-footer">  
      <div class="text-center">
          <a href="editar_libro.php?id=<?php echo $_GET['id'];?>" class="btn btn-primary" value="">Editar</a>
          <a class="btn btn-danger" onClick="return confirm('Seguro deseas eliminar?')" href="controller/eliminar_libro.php?id=<?php echo $_GET['id'];?>">Eliminar</a>
      </div>
  </div>
<?php else: ?>
  <div class="alert alert-warning m-3"> <strong>No se ha seleccionado ningun libro, o el libro seleccionado no existe</strong></div>
<?php endif ?>
  </div>
</div>

        </div>
        <!-- /.content -->
    </div>
    <!-- /#right-panel -->

     <script>
     </script>
<?php 
require(TEMPLATES.'scripts.php');
 ?>

</body>
</html>
