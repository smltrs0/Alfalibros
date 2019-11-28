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
 <form action="controller/editar_libro.php" method="POST" id="form_editar_libro">
  <div class="form-group">
    <label>Titulo</label>
    <input class="form-control" type="text" name="titulo" value="<?php echo $libro['titulo'] ?>">
  </div>
   <input class="form-control" type="text" name="id_info_libro" value="<?php echo $libro['id_info_libro'] ?>" hidden>
    <input class="form-control" type="text" name="id_libro" value="<?php echo $libro['id_libro'] ?>" hidden>
  <div class="form-group">
                        <label>Autor</label>
                        <select class="form-control" name="autor" id="autor" require>
                            <!-- ESTE OPTION ES UN SIMPLE PLACEHOLDER PARA QUE NO SE MUESTRE EL NOMBRE DEL PRIMER AUTOR Y ENVIA UN VALOR VACIO PARA QUE LUEGO SE PUEDA VERIFICAR Y RETORNAR ERROR EN EL CASO DE QUE EL USUARIO LO ENVIE COMO AUTOR -->
                            <option value="<?php echo $libro['id_autor'] ?>"><?php echo $libro['autor'] ?></option>
                            <?php foreach ($autores as $key): ?>
                                <option value="<?php echo $key['id_autor']; ?>"><?php echo $key['autor']; ?></option>
                            <?php endforeach ?>
                            <!-- ESTE LUEGO SE TRATARA CON JS PARA AGREGAR OTRO INPUT PARA AÑADIR EL NUEVO AUTOR -->
                            <option value="nuevo_autor">Otro autor</option>
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
                        <select class="form-control" name="categoria" id="categoria" required>
                            <!-- ESTE OPTION ES UN SIMPLE PLACEHOLDER PARA QUE NO SE MUESTRE EL NOMBRE DEL PRIMER AUTOR Y ENVIA UN VALOR VACIO PARA QUE LUEGO SE PUEDA VERIFICAR Y RETORNAR ERROR EN EL CASO DE QUE EL USUARIO LO ENVIE COMO AUTOR -->
                            <option value="<?php echo $libro['id_categoria'] ?>"><?php echo $libro['categoria'] ?></option>
                            <?php foreach ($categorias as $key): ?>
                                <option value="<?php echo $key['id_categoria']; ?>"><?php echo $key['categoria']; ?></option>
                            <?php endforeach ?>
                            <!-- ESTE LUEGO SE TRATARA CON JS PARA AGREGAR OTRO INPUT PARA AÑADIR EL NUEVO AUTOR -->
                            <option value="nuevo_autor">Otra categoria</option>
                        </select>
                    </div>
  <div class="form-group">
    Fecha de lanzamiento
    <input class="form-control" type="date" name="fecha_lanzamiento" value="<?php echo $libro['fecha_lanzamiento'] ?>">
  </div>
  <textarea class="form-control" name="sinopsis"><?php echo $libro['sinopsis'] ?></textarea>
   


            </div>
    </div>
  </div>
  <div class="card-footer">  
      <div class="text-center">
          <input class="btn btn-primary" type="submit" name="" value="Guardar">
      </div>
       </form>
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
      $('#categoria').select2();
      $('#autor').select2();
        $(document).on('submit', '#form_editar_libro', function(event)
    { 
      event.preventDefault();
      $.ajax({
        url: 'controller/editar_libro.php',
        type: 'POST',
        contentType:false,
        processData:false,
        data:new FormData(this),
      })
      .done(function(data) {
        alert('El libro se ha editado correctamente.')
        console.log("success"+data);
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
      


    });


     </script>
<?php 
require(TEMPLATES.'scripts.php');
 ?>
</body>
</html>
