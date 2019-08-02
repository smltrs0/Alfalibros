<?php 
  include 'include/head.php';
  require_once('classes/cliente.php');

  $clientes = new cliente();

  $clientes = $clientes->get_all();

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
            <div class="row">
              <div class="card shadow-blue"> 
              <?php include 'modal/agregar_cliente.php'; ?>
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
include 'include/scripts.php';
 ?>

</body>
</html>
