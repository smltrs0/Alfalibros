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
    <div class="row">
    <div class="col-sm-12 col-lg-6">
       <div class="m-1"> 
        <?php if(!is_null($libro['ruta_imagen'])): ?>
       <!-- class height-27 mantiene las imagenes siempre en 275 px -->
        <img class="" src="<?php echo $libro['ruta_imagen']; ?>" alt="Card image cap"> 
        <?php else: ?>
        <img class=" height-275" src="images/no_image.png" alt="Card image cap">
        <?php endif ?>
      </div>
    </div>
    <div class=" col-sm-12 col-lg-6">
      <div class="card-body">
 <form method="POST">
  <div class="form-group">
    <label>Titulo</label>
    <input class="form-control" type="text" name="titulo" value="<?php echo $libro['titulo'] ?>">
  </div>
   <input class="form-control" type="text" name="id" value="<?php echo $libro['id_libro'] ?>" hidden>
  <div class="form-group">
    <label>Autor</label>
   <select>
     <option></option>
   </select>
  </div>
  <div class="form-group">
    <label>Cantidad</label>
    <input class="form-control" type="text" name="cantidad" value="<?php echo $libro['cantidad'] ?>">
  </div>
  <div class="form-group">
    Precio
    <input class="form-control" type="text" name="precio" value="<?php echo $libro['precio'] ?>">
  </div>
  <div class="form-group">
    <label>Categoria</label>
   <select>
     <option></option>
   </select>
  </div>
  <div class="form-group">
    Fecha de lanzamiento
    <input class="form-control" type="date" name="fecha_lanzamiento" value="<?php echo $libro['fecha_lanzamiento'] ?>">
  </div>
  <textarea class="form-control" name="sinopsis"><?php echo $libro['sinopsis'] ?></textarea>
   
 </form>

            </div>
    </div>
  </div>
  <div class="card-footer">  
      <div class="text-center">
          <input class="btn btn-primary" type="submit" name="" value="Guardar">
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
