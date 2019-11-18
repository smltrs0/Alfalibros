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
            <div class="row mb-3 animated bounceInRight ">
                <div class="col-sm-4">
                    <div class="page-header float-left shadow">
                        <div class="page-title">
                            <h1>
                            <i class="pe-7s-home fa-2x degra_home"></i>Dashboard
                            </h1>
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
                                            <div class="stat-heading text-white">
                                                Total Neto
                                            </div>
                                            <div class="stat-text text-white">
                                                Bs.<span class="count"><?php echo $activos; ?></span>
                                            </div>
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
                                            <div class="stat-text text-white"><span class="count"><?php echo $cant_ventas; ?></span></div>
                                            
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
                            <div class="widget-chart-content text-center mt-5">
                                <div class="widget-description mt-0 text-success">
                                    <i class="fa fa-arrow-up"></i>
                                    <span class="pl-1">46%</span>
                                    <span class="text-muted opacity-8 pb-3 pl-1">Incremento de ventas</span>
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
    require (TEMPLATES.'scripts.php');
    ?>
    <script src="scripts/js/graphics/reporte_ventas.js"></script>
</body>
</html>