<!-- Header-->
        <header id="header" class="header shadow">
            <div class="top-left">
                <div class="navbar-header">
                        <a class="navbar-brand" href="./"><img src="images/logo.png" height="60px" alt="Logo"></a>
                    <!--  <img src="images/logo.png" alt="">  -->
                    
                    
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars fa-2x"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <button class="search-trigger mr-5"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Buscar" aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-times"></i></button>
                            </form>
                        </div>
                    </div>
                     <div class="header-left" >
                        <li class="menu-item-has-children dropdown" id="boton-carrito">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-shopping-cart"> </i><span class="badge badge-success"> <div id="cantidad">0</div></span></a>
                       
                        <ul class="sub-menu children dropdown-menu">
                        <div id="lista-carrito"></div>
<p class="text-right" id="total_carrito"></p>
                        </ul>
                    </li>
                         
                    </div>
 
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="perfil.php"><i class="fas fa-user"></i>Mi Perfil</a>
                            <a class="nav-link" href="#"><i class="fas fa-cog"></i>Configuracion</a>
                            <a class="nav-link" href="#"><i class="fa fa-power-off"></i>Salir</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- /#header -->

