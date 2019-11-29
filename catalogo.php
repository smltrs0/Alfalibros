<!doctype html>
<html lang="es-ve">
<head>
    <!--meta-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="es">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--Links-->
    <link rel="icon" href="img/favicon.png" type="image/png">
    <title>Alfalibros C.A - La mejor libreria en Venezuela</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="vendors/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
    <!--Animaciones-->
    <link rel="stylesheet" href="vendors/animate-css/animate.css">
    <!-- stilos custon -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>
<body>
    <!--Menu-->
    <header class="header_area">
        <div class="top_menu row ">
            <div class="container">
                <div class="float-left">
                    <a class="dn_btn" href="mailto:alfalibros@gmail.com"><i class="fa fa-at"></i>alfalibros@gmail.com</a>
                    <a href="#" class="dn_btn"> <i class="fa fa-map-marker-alt"></i>Mira donde estamos ubicados</a>
                </div>
                <div class="float-right">
                    <ul class="list header_social">
                        <li><a href="https://www.facebook.com/alfalibros" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="https://www.instagram.com/alfalibros/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                    </ul>	
                </div>
            </div>	
        </div>
        <div class="main_menu">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <!-- Logotipo principal -->
                    <a class="navbar-brand logo_h" href="#">
                        <img id='logo' src="img/logo.png" alt="logo alfalibros" style="margin-top:5px; width: 90px; height:90px;"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                        <ul class="nav navbar-nav menu_nav ml-auto">
                            <li class="nav-item"><a class="nav-link" href="index.php">Inicio</a></li> 
                            <li class="nav-item"><a class="nav-link" href="catalogo">Libros</a></li> 
                            <li class="nav-item"><a class="nav-link" href="acerca">Acerca de nosotros</a></li> 
                            <li class="nav-item"><a class="nav-link" href="#">Contactanos</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!--Final del Menu-->
<div id="principal" class="banner-area carousel slide" data-ride="carousel">
  <!-- Carousel -->
  <div class="carousel-inner" style="-webkit-filter: brightness(50%);
filter: brightness(50%);">
        <div class="carousel-item active">
            <img src="img/banner/books.jpg" alt="Libreria" width="100%" height="200">
        </div>
  </div>
  <div class="container">
         <div class="ml-3 mr-3  " style=" padding: 2rem;position: absolute; top: 50px;
            ">
            <div class="area-heading row">
                        <h1 class="text-white">Nuestro repertorio de libros</h1>
                   
            </div>
        </div>
  </div>
</div>
    
</div>
    <!--3 mas vendidos-->  
    <div class="service-area mt-5">
        <div class="container">
            <div class="row mb-4">
                
                <div class="container">
                   <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Que libro te gustaria buscar?" aria-label="Recipient's username" aria-describedby="button-addon2">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Buscar</button>
  </div>
</div>
                </div>
                <div class="col-md-12 col-lg-12">
                    <?php
                        // CARGANDO LAS CONSTANTES DE RUTAS
    require('admin/config.path.php');
    // CARGANDO LAS HERRAMIENTAS SOLO UNA VEZ PARA NO GENERAR CONFLICTOS DE CLASES DUPLICADAS O DE RUTAS
    require(TOOLS.'db_connector.php');
    require(TOOLS.'get.php');


    $libros = get::all_items('info_libro');

                      ?>
                          <div class="card-deck">
        <?php if ($libros): ?>
            <?php foreach ($libros as $key): ?>
              <div class="card mb-5">
                <form class="form-item">
                  <a href="detalle_libro?id=<?php echo $key['id_libro']?>">
                    <!--Aqui tendira que ir ?id=id para procesarlo por get-->
                      <?php if(!is_null($key['ruta_imagen'])): ?>
                          <!-- class height-27 mantiene las imagenes siempre en 275 px -->
                          <img class="card-img-top img-fluid height-275 " src="admin/uploaded_files/img_books/<?php echo $key['ruta_imagen']; ?>" alt="Card image cap"> 
                      <?php else: ?>
                           <img class="card-img-top img-fluid height-275" src="admin/images/no_image.png" alt="Card image cap">
                      <?php endif ?>
                       </a>
                          <div class="card-body">
                                <input name="product_code" type="hidden" value="<?php echo $key['id_info_libro']; ?>">
                              <h4 class="card-title"><?php echo $key['titulo']; ?></h4>
                              <p class="text-dark"><strong>Precio:</strong> <?php echo $key['precio']; ?> BsS</p>
                              <p class="card-text"><small class="text-dark"><?php echo $key['autor'] ?></small></p>

                              <?php if ($key['cantidad'] > 0): ?>

                                  <strong class="text-success">DISPONIBLE</strong>
                              <?php else: ?>

                                  <p class="text-danger">NO DISPONIBLE</p>
                                  
                              <?php endif ?>
                          </div>
                </form>
               
              </div>
            <?php endforeach ?>

        <?php else: ?>

           <!--Ve que no es necesario las mayusculas para resaltar algo :P -->
     <div class="col-12">
               <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                    <strong>No existen libros que mostrar!</strong> 
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
     </div>

        <?php endif ?>
        

    </div>
                </div>
            </div>
        </div>
    </div>    
    <!--Final mas vendidos-->      

   

   <!-- Area de editoriales-->
    <section class="brands-area background_one">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="owl-carousel brand-carousel">
                        <!-- single-brand -->
                        <div class="single-brand-item d-table">
                            <div class="d-table-cell">
                                <img src="img/brand/1.png" alt="">
                            </div>
                        </div>
                        <!-- single-brand -->
                        <div class="single-brand-item d-table">
                            <div class="d-table-cell">
                                <img src="img/brand/2.png" alt="">
                            </div>
                        </div>
                        <!-- single-brand -->
                        <div class="single-brand-item d-table">
                            <div class="d-table-cell">
                                <img src="img/brand/3.png" alt="">
                            </div>
                        </div>
                        <!-- single-brand -->
                        <div class="single-brand-item d-table">
                            <div class="d-table-cell">
                                <img src="img/brand/4.png" alt="">
                            </div>
                        </div>
                        <!-- single-brand -->
                        <div class="single-brand-item d-table">
                            <div class="d-table-cell">
                                <img src="img/brand/5.png" alt="">
                            </div>
                        </div>
                        <!-- single-brand -->
                        <div class="single-brand-item d-table">
                            <div class="d-table-cell">
                                <img src="img/brand/3.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!--Final area de editoriales-->
    <!-- Inicio del Footer -->
    <footer class="footer-area area-padding-top">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-6 col-sm-6 single-footer-widget">
                    <div class="h4">Categorías recomendadas</div>
                    <ul>
                        <li><a href="#">► Ficción</a></li>
                        <li><a href="#">► Drama</a></li>
                        <li><a href="#">► Novelas</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 col-md-6 ml-auto single-footer-widget">
                    <div class="h4">Buscar en Alfalibros.net</div>  
                    <div class="form-wrap" id="mc_embed_signup">
                       <script async src="https://cse.google.com/cse.js?cx=008749550354594164595:q2cuqj-f72e"></script>
<div class="gcse-search"></div>

        <!--Inicio del Footer-->
                
            </div>
            
        </footer>
        <!-- Final del footer -->

    <!--Inicio chat bot-->
                <div class="">
                    
<button class="open-button" onclick="openChat()"><i class="boton fas fa-comment-alt"></i> Chat</button>

<div class="chat-popup" id="chat">
  
    <button type="button" class="btn close-chat" onclick="closeChat()"><i class="fa fa-times"></i></button>
                 <iframe style="width: 100%; height: all;" 
    allow="microphone;"
    src="https://console.dialogflow.com/api-client/demo/embedded/973b9dda-a53e-4dbe-8a7a-daa4e4a42ca5">
</iframe>
                </div>
                              

</div>
<!--Final chat bot-->
<hr style="box-shadow: 2px 2px 11px 0 rgba(0,0,0,.3)">
<div class="footer mt-5">
      <div class="container text-center">
         <p class="col-lg-12 col-sm-12 footer-text ">
        Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados</ps>
        <div class="social" >
                     <div class="text-center">
                            <a href="https://www.facebook.com/alfalibros" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="https://www.instagram.com/alfalibros/" target="_blank"><i class="fab fa-instagram"></i></a>
                     </div>
                    </div>
      </div>
    </div>
<script>
function openChat() {
  document.getElementById("chat").style.display = "block";
  $('#open-button').fadeIn(500)
}

function closeChat() {
  document.getElementById("chat").style.display = "none";
}

</script>

<!-- Jquery -->
<script src="js/jquery-2.2.4.min.js"></script>
<!--Bootstrap-->
<script src="js/bootstrap.min.js"></script>
<!--Animacion para el background "Stellar.js"-->
<script src="js/stellar.js"></script>
<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
<!--Tema personalizado-->
<script src="js/theme.js"></script>
<script type="text/javascript">
</script>

</body>
</html>