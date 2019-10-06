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

            <!-- Animated test -->
            <div class="row">
              <div class="card shadow-blue"> 
                <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 <i class="fa fa-plus"></i> Agregar cliente
</button>
              <?php require(VIEWS_MODAL.'agregar_cliente.modal.php'); ?>
              </div>
            </div>
            <div class="row animated bounceInDown">
              
             <div class="card p-3 col-12">
                <table id="Tabla" class="display">
    <thead>
        <tr>
            <th>Nombre y apellido</th>
            <th>Cedula</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tbody>

      <?php if ($clientes): ?>

        <?php foreach ($clientes as $key): ?> 
          <tr>
              <td><?php echo $key['nombre'].' '.$key['apellido']; ?></td>
              <td><?php echo $key['documento']; ?></td>
              <th>iconos de mod</th>
          </tr>
        <?php endforeach ?>

      <?php else: ?>

          <tr>
              <td>NO EXISTEN CLIENTES</td>
          </tr>
        
      <?php endif ?>

       
    </tbody>
</table>
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
