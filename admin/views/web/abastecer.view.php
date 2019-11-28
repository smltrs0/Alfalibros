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
  <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="ventas-tab" data-toggle="tab" href="#ventas" role="tab" aria-controls="home" aria-selected="true">Abastecer libro</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="libros-tab" data-toggle="tab" href="#libros" role="tab" aria-controls="profile" aria-selected="false">Ver listado de abastecimiento</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="ventas" role="tabpanel" aria-labelledby="ventas-tab">
    <div class="card">
        <div class="card-body">
            <form action="controller/abastecer_libro.php" method="POST">
                <div class="form-group">
                    <label>Selecciona el libro a abastecer</label>
                    <select class="form-control" name="libro" id="libro" required>
              <option value="">Seleccione un libro:</option>
              <?php foreach ($libros as $key): ?>
                <option value="<?php echo $key['id_libro']; ?>"><?php echo " ".$key['titulo']; ?></option>
              <?php endforeach ?>
              <!-- ESTE LUEGO SE TRATARA CON JS PARA AGREGAR OTRO INPUT PARA AÑADIR EL NUEVO AUTOR -->
            </select>
                </div>
                <div class="form-group">
                    <label>Introduce la cantidad</label>
                    <input type="number" name="cantidad" class="form-control" min="1" name="">
                </div>
               <div class="form-group">
                <label>Selecciona un proveedor</label>
                    <select class="form-control" name="proveedor" id="proveedor" required>
              <option value="">Seleccione un proveedor:</option>
              <?php 
              print_r($proveedor);
               ?>
              <?php foreach ($proveedor as $key => $value): ?>
                <option value="<?php echo $value['id']; ?>"> <?php echo "Nombre: ".$value['nombre']." ".$value['apellido']." DNI: ".$value['documento']; ?></option>
              <?php endforeach ?>
              <!-- ESTE LUEGO SE TRATARA CON JS PARA AGREGAR OTRO INPUT PARA AÑADIR EL NUEVO AUTOR -->
            </select>
               </div>
               <input type="submit" class="btn btn-primary" value="Abastecer">
            </form>
        </div>
    </div>

  </div>
  <div class="tab-pane fade" id="libros" role="tabpanel" aria-labelledby="libros-tab">
    <div class="card">
      <div class="card-body">
        <table id="tablaAbastecer" class="table table-hover table-sm" width="100%">
          <thead>
            <tr>
              <th >Cantidad</th>
              <th >Fecha y hora</th>
              <th >Titulo</th>
              <th >Nombre comercial</th>
              <th >Editar</th>
              <th >Eliminar</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
</div>
        
    
</div>
            
        </div>
        <!-- /.content -->
    </div>
    <!-- /#right-panel -->
  <script type="text/javascript">
        var dataTable = $('#tablaAbastecer').DataTable( {
        "ajax": "controller/get_all_abastecer.php",
        "language": {
            "url": "scripts/js/traducciones/Spanish.json"
            },
        "columns": [
                { "data": "cantidad" },
                  { "data": "fecha_entrada" },
                    { "data": "titulo" },
                        { "data": "nombre_comercial" },
                                { "data": "edit" },
                                  { "data": "delete" }
        ]
    } );


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