<?php 

    require_once('classes/libro.php');

    $cant_inventario = new libro();

    $cant_inventario = $cant_inventario->get_cantidad_inventario();

?>


<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js" lang="es"> 
<!--<![endif]-->
<?php 
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
                <div class="row mb-3 animated bounceInRight ">
                    <div class="col-sm-4">
                        <div class="page-header float-left shadow">
                            <div class="page-title">
                                <h1> <i class="pe-7s-home fa-2x degra_home">
                                </i>   Dashboard</h1>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Animated test -->
            <div class="animated bounceInUp">
                <!-- Widgets  -->
                <div class="row">
                    
                    <div class="col-lg-4 col-md-6">
                        <div class="card degra">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib text-white">
                                        <i class="pe-7s-cash"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib"> 
                                            <div class="stat-heading text-white">Total Neto</div>
                                             <div class="stat-text text-white">$<span class="count">23569</span></div>
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="card bluesum">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon dib text-white">
                                        <i class="pe-7s-cart"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="text-left dib">
                                            <div class="stat-heading text-white">Ventas</div>
                                            <div class="stat-text text-white"><span class="count">3435</span></div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6">
                        <div class="card young_grass">
                            <div class="card-body">
                                <div class="stat-widget-five">
                                    <div class="stat-icon text-white">
                                        <i class="pe-7s-display1"></i>
                                    </div>
                                    <div class="stat-content">
                                        <div class="stat-heading text-white">Inventario</div>
                                        <div class="text-left dib">
                                            <div class="stat-text text-white"><span class="count"><?php echo $cant_inventario; ?></span></div>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- -->
            </div>
            <!-- .animated testing -->
            <div class="mb-3 card animated bounceInLeft">
                    <div class="card-header-tab card-header">
                        <div class="card-header-title">
                            <i class="header-icon lnr-rocket icon-gradient bg-tempting-azure"> </i>
                           Reporte de ventas
                        </div>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade active show">
                            <div class="h-25">
                                <canvas id="myChart" style="width: 350px"></canvas>
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
        datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
</script>
                                <div class="widget-chart-content text-center mt-5">
                                    <div class="widget-description mt-0 text-success">
                                        <i class="fa fa-arrow-up"></i>
                                        <span class="pl-1">46%</span>
                                        <span class="text-muted opacity-8 pl-1">Inclemento de ventas</span>
                                    </div>
                                </div>
                            </div>
                        </div>
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
