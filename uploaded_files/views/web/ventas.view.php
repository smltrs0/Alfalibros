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
              <div class="card shadow-blue"> 
              <?php require(VIEWS_MODAL.'agregar_venta.modal.php'); ?>
              </div>
            </div>

            <!-- Animated test -->
            <div class="row">
                <div class="card p-3 col-12">

    <?php if ($registro_ventas): ?>
    <table id="Tabla" class="display">

        <thead>
            <tr>
                <th>N° Factura</th>
                <th>Cliente</th>
                <th>Total</th>
            </tr>
        </thead>

        <tbody>

            <?php foreach ($registro_ventas as $key): ?>
                    
                <tr>
                    <td><?php echo $key['id_factura']; ?></td>
                    <td><?php echo $key['nombre']; ?></td>
                    <td><?php echo $key['total_factura']; ?></td>
                </tr>

            <?php endforeach ?>

        </tbody>

    </table>

    <?php else: ?>

        <!-- HAZ TU MAGIA AQUI CON UN ALERT BIEN CHIDORI -->
        NO HAY VENTAS QUE MOSTRAR

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
