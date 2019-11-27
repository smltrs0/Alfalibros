<?php 
  require (TEMPLATES.'head.php');
    if ($cargo=='1') {
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
          

<div class="container">
    <div class="card">
        <div class="card-body">
            <form >
                <div class="form-group">
                    <label>Selecciona el libro a abastecer</label>
                    <select class="form-control" name="libro" id="libro" required>
              <option value="">Seleccione un libro:</option>
              <?php foreach ($libros as $key): ?>
                <option value="<?php echo $key['id']; ?>"><?php echo " ".$key['titulo']; ?></option>
              <?php endforeach ?>
              <!-- ESTE LUEGO SE TRATARA CON JS PARA AGREGAR OTRO INPUT PARA AÑADIR EL NUEVO AUTOR -->
            </select>
                </div>
                <div class="form-group">
                    <label>Introduce la cantidad</label>
                    <input type="number" class="form-control" min="1" name="">
                </div>
               <div class="form-group">
                <label>Selecciona un proveedor</label>
                    <select class="form-control" name="proveedor" id="proveedor" required>
              <option value="">Seleccione un proveedor:</option>
              <?php foreach ($proveedor as $key): ?>
                <option value="<?php echo $key['id']; ?>"><?php echo "Nombre: ".$key['nombre']." ".$key['apellido']." DNI: ".$key['documento']; ?></option>
              <?php endforeach ?>
              <!-- ESTE LUEGO SE TRATARA CON JS PARA AGREGAR OTRO INPUT PARA AÑADIR EL NUEVO AUTOR -->
            </select>
               </div>
               <input type="submit" class="btn btn-primary" value="Abastecer">
            </form>
        </div>
    </div>
</div>
            


        </div>
        <!-- /.content -->
    </div>
    <!-- /#right-panel -->
  <script type="text/javascript">
    $(document).ready(function() {
      $('#libro').select2();
    $('#proveedor').select2();
});

  </script>
<?php 
require (TEMPLATES.'scripts.php');
}else{
  echo '<script>
    alert("No tienes permiso para entrar a esta zona");
    history.back(1);
  </script>';
}
 ?>

</body>
</html>