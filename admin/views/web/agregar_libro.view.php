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
        <div class="card animated bounceInDown">
            <div class="card-header">
                Agregar libro
            </div>
            <div class="card-body">
                <form method="POST" action="controller/nuevo_libro.php" enctype="multipart/form-data" id="agregar_libro">
                    <div class="form-group">
                        <label>Titulo</label>
                        <input class="form-control" type="text" name="titulo" require>
                    </div>
                    <div class="form-group">
                        <label>Autor</label>
                        <select class="form-control" name="autor" require>
                            <!-- ESTE OPTION ES UN SIMPLE PLACEHOLDER PARA QUE NO SE MUESTRE EL NOMBRE DEL PRIMER AUTOR Y ENVIA UN VALOR VACIO PARA QUE LUEGO SE PUEDA VERIFICAR Y RETORNAR ERROR EN EL CASO DE QUE EL USUARIO LO ENVIE COMO AUTOR -->
                            <option value="">Seleccione un autor</option>
                            <?php foreach ($autores as $key): ?>
                                <option value="<?php echo $key['id_autor']; ?>"><?php echo $key['autor']; ?></option>
                            <?php endforeach ?>
                            <!-- ESTE LUEGO SE TRATARA CON JS PARA AGREGAR OTRO INPUT PARA AÑADIR EL NUEVO AUTOR -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Categoria</label>
                        <select class="form-control" name="categoria" required>
                            <!-- ESTE OPTION ES UN SIMPLE PLACEHOLDER PARA QUE NO SE MUESTRE EL NOMBRE DEL PRIMER AUTOR Y ENVIA UN VALOR VACIO PARA QUE LUEGO SE PUEDA VERIFICAR Y RETORNAR ERROR EN EL CASO DE QUE EL USUARIO LO ENVIE COMO AUTOR -->
                            <option value="">Seleccione una categoria</option>
                            <?php foreach ($categorias as $key): ?>
                                <option value="<?php echo $key['id_categoria']; ?>"><?php echo $key['categoria']; ?></option>
                            <?php endforeach ?>
                            <!-- ESTE LUEGO SE TRATARA CON JS PARA AGREGAR OTRO INPUT PARA AÑADIR EL NUEVO AUTOR -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Fecha de Lanzamiento</label>
                        <input class="form-control" type="date" name="fecha_lanzamiento" require>
                    </div>
                    <div class="form-group">
                        <label>Cantidad</label>
                        <input class="form-control" type="number" name="cantidad" min="1" require>
                    </div>
                    <div class="form-group">
                        <label>Precio</label>
                        <input class="form-control" type="text" name="precio" require>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" placeholder="Sinopsis" name="sinopsis"></textarea>

                            <div class="form-group">
                                <label class="form-text" >Foto</label>
                                <input class="form-control-file" type="file" name="img">
                            </div>
                    <input type="submit">
                     <div class="alert alert-danger mt-1 text-center" id="alert" style="display:none;">
              <strong id="text-alert"></strong>
            </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /#right-panel -->
<?php 
 require(TEMPLATES.'scripts.php');
?>

<script type="text/javascript">
    $(document).on('submit', '#agregar_libro', function(event)
    { 
      event.preventDefault();

      $.ajax({
        url: 'controller/nuevo_libro.php',
        type: 'POST',
        contentType:false,
        processData:false,
        data:new FormData(this),
      })
      .done(function(data) {

              if (data=='done') {
                $('#text-alert').html('Libro agregado con éxito');
                $('#agregar_libro')[0].reset();
                $('#alert').removeClass('alert-danger');
                $('#alert').addClass('alert-success');
                $('#alert').fadeIn(1000);
              setTimeout(function() 
              { 
              // Ocultamos el alerta
                 $('#alert').fadeOut(1000); 
              }, 10000);
              }else{

         $('#text-alert').html(data);
        $('#alert').fadeIn(1000);
              setTimeout(function() 
              { 
              // Ocultamos el alerta
                 $('#alert').fadeOut(1000); 
              }, 10000);
              }
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
      

    });


</script>
</body>
</html>