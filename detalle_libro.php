<?php 

$id=$_GET['id'];
require_once 'classes/libro.php';
$libros = new libro();
$libros = $libros->id_libro($id);

// var_dump($libros);

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
  <div class="card">
<?php if (!empty($libros)): ?>
      <div class="card-header mb-3">
           <div class="text-center">
                <strong><?php echo $libros['titulo']; ?></strong>
           </div>
            </div>
    <div class="row">
    <div class=" col-sm-12 col-lg-6">
       <div class="m-1"> 
        <?php if(!is_null($libros['ruta_imagen'])): ?>
       <!-- class height-27 mantiene las imagenes siempre en 275 px -->
        <img class="" src="<?php echo $libros['ruta_imagen']; ?>" alt="Card image cap"> 
        <?php else: ?>
        <img class=" height-275" src="images/no_image.png" alt="Card image cap">
        <?php endif ?>
      </div>
    </div>
    <div class=" col-sm-12 col-lg-6">
      <div class="card-body">
              <?php 

                  echo "id: ".$libros['id_libro']."</br>";
                  echo "Autor: ".$libros['autor']."</br>";
                  echo "Cantidad en existencia: ".$libros['cantidad']."</br>";
                  echo "Precio: ".$libros['precio']." </br>";
                  echo "Categoria: ".$libros['categoria']."</br>";
                  echo "Lanzamiento: ".$libros['fecha_lanzamiento']."</br>";
                  echo "Sinopsis:<p class='text-justify'> ".$libros['sinopsis']."</p>";
 ?>

            </div>
    </div>
  </div>
  <div class="card-footer">  
      <div class="text-center">
          <input class="btn btn-primary" type="submit" name="" value="Editar">
          <input class="btn btn-danger" type="submit" name="" value="Eliminar">
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
include 'include/scripts.php';
 ?>

</body>
</html>
