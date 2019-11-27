
  <!--Menu principal izquierdo-->
    <aside id="left-panel" class="left-panel pt-3">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav" id="mimenu">
                        <li class="menu-title">Inicio</li>
                    <li class="<?php 
  if ($paginaActual=="autores")
  echo " class='current'";
?>">
                        <a href="inicio"><i class="menu-icon fas fa-home home "></i>Inicio </a>
                    </li>
                    <li>
                        <a href="clientes"> <i class="menu-icon fa fa-user"></i>Clientes </a>
                    </li>
                    <li>
                        <a href="ventas"> <i class="menu-icon fa fa-dollar-sign"></i>Facturas </a>
                    </li>
                     <li class="menu-title">Libros</li>
                        <li>
                           <a href="agregar_libro.php"> <i class="menu-icon fa fa-plus"></i> Agregar libro</a>
                        </li>
                        <li>
                            <a href="libros"><i class="menu-icon fa fa-book"></i> Libros </a>
                        </li>
                        <li>
                            <a href="autores"><i class="menu-icon fa fa-feather-alt"></i> Autores </a>
                        </li>
                        <li><a href="categorias"><i class="menu-icon fa fa-tasks"></i>Categorías </a></li>
                    <?php if ($cargo =='1'): ?>
                        <li class="menu-title">Administrador</li>
                    <li>
                        <a href="usuarios"> <i class="menu-icon fa fa-users"></i>Usuarios </a>
                    </li>
                    <li>
                        <a href="abastecer"> <i class="menu-icon fa fa-truck-loading"></i>Abastecer </a>
                    </li>
                    <li>
                        <a href="proveedores"> <i class="menu-icon fa fa-truck"></i>Proveedores </a>
                    </li>
                    <li>
                        <a href="reportes"> <i class="menu-icon fa fa-file-pdf"></i>Reportes </a>
                    </li>
                    <li>
                        <a href="database"> <i class="menu-icon fa fa-database"></i>Base de datos </a>
                    </li>
                    <?php endif ?>
                  
                </ul>
            </div>
        </nav>
    </aside>
    <!-- /Final del menu principal izquierdo -->