<!-- Header-->
        <header id="header" class="header shadow">
            <div class="top-left">
                <div class="navbar-header">
                        <a class="navbar-brand" href="inicio"><img src="images/logo.png" height="60px" alt="Logo"></a>
                    <!--  <img src="images/logo.png" alt="">  -->
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars fa-2x"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    
                     <div class="header-left mt-3">
                        <li class="menu-item-has-children dropdown" id="boton-carrito">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-shopping-cart"> </i><span class="badge badge-success"> <div id="cantidad">0</div></span></a>
                        <ul class="sub-menu children dropdown-menu pt-2">
                        <div id="lista-carrito"></div>
<p class="text-right" id="total_carrito"></p>
                        </ul>
                    </li>
                         
                    </div>
 
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="uploaded_files/users/<?php echo  $_SESSION['image'];?>" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="perfil.php"><i class="fas fa-user"></i>Mi Perfil</a>
                            <a class="nav-link" href="controller/desconectar.php"><i class="fa fa-power-off"></i>Salir</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- /#header -->


