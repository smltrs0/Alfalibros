<?php 

    require_once('classes/venta.php');

    $registro_ventas = new venta();
    $registro_ventas = $registro_ventas->get_all();




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
              <div class="card shadow-blue"> 
              <?php include 'modal/agregar_venta.php'; ?>
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
include 'include/scripts.php';
 ?>

</body>
</html>
