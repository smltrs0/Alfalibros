<!doctype html>
<html lang="es-ve">
<head>
    <!--meta-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="es">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="description" content="Somos una Libreria y papeleria localizada en Ciudad Bolívar con la finalidad de llevar la lectura a toda Venezuela!"/>
    <meta name="keywords" content="Libros para leer en bolivar, Selecciones editoriales, Alfa Libros"/>
    <meta name="robots" content="index, follow"/>
    <meta property="og:locale" content="es_ES" />
    <meta property="og:type" content="website"/>
    <meta property="og:site_name" content="AlfaLibros"/>
    <meta name="Author" content="© AlfaLibros"/>
    <meta name="Email" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--con la verificación de google se consigue un mejor posicionamiento de la web-->
    <meta name="google-site-verification" content="**********" />
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
                    <a href="acerca" class="dn_btn"> <i class="fa fa-map-marker-alt"></i>Mira donde estamos ubicados</a>
                    <?php
                    // Si existe una session activa muestra un boton para entrar al sistema administrativo 
                        session_start();
                        if (isset($_SESSION['username'])) {
                          echo "<div class='badge badge-primary'>
                        <a href='admin/' class='text-white'> <i class='fa fa-tachometer-alt'></i> Regresar al panel administrativo</a>
                    </div>";
                        }
                      ?>
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
                        <img id='logo' src="img/logo.png" alt="logo alfalibros"></a>
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
    <!--Banner principal-->
<div class="">
    <div id="principal" class="banner-area carousel slide" data-ride="carousel">
  <!-- Indicadores -->
    <ul class="carousel-indicators">
        <li data-target="#principal" data-slide-to="0" class="active"></li>
        <li data-target="#principal" data-slide-to="1"></li>
        <li data-target="#principal" data-slide-to="2"></li>
    </ul>
  <!-- Carousel -->
  <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="img/banner/home-banner.jpg" alt="Los Angeles" width="100%" height="500">
        </div>
        <div class="carousel-item">
            <img src="img/banner/banner2.jpg" alt="Chicago" width="100%" height="500">
        </div>
        <div class="carousel-item">
            <img src="img/banner/banner3.jpg" alt="New York" width="100%" height="500">
        </div>
  </div>
  <div class="container">
         <!--<div class="ml-3 mr-3 shadow-lg text-white " style=" padding-top: 2rem; padding: 1rem; background-color: rgb(0,0,0,0.5); border-radius: 7px ;position: absolute;
            top: 50px;
            ">
            <p style="text-shadow:5px 5px 10px black; font-family: sans-serif;">Somos una Libreria y papeleria localizada en Ciudad Bolívar<br> con la finalidad de llevar la lectura a toda Venezuela.</p>
        </div>
  </div>-->
</div>
    
</div>
    <!--Final del Baner principal-->
    <!--Servicios-->      
    <section class="feature-section">
            <div class="container">
                 <div class="area-heading row">
                <div class="col-md-5 col-xl-4">
                    <div class="h3">Nuestros servicios</div>
                </div>
                <div class="col-md-7 col-xl-8">
                  
                </div>
            </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-feature text-center text-lg-left shadow">

                            <h3 class="card-feature__title"><span class="card-feature__icon">
                               <i class="fas fa-concierge-bell"></i>
                            </span>Libros a pedido?</h3>
                            <p class="card-feature__subtitle">Puedes sugerirnos un libro que te gustaria ver en nuestra tienda. </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-feature text-center text-lg-left shadow">

                            <div class="card-feature__title"><span class="card-feature__icon">
                             <i class="fas fa-atlas"></i>
                            </span>Amplio Repertorio</div>
                            <p class="card-feature__subtitle">Contamos con un amplio repertorio de textos,con mas de ### libros disponibles para tu disfrute.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-feature text-center text-lg-left shadow">

                            <h5 class="card-feature__title"><span class="card-feature__icon">
                               <i class="fas fa-headset"></i>
                            </span>Atención al cliente</h5>
                            <p class="card-feature__subtitle">Tenemos un un personal amable que te ayudara en todo lo que necesites durante tu estadía, aparte tenemos telefonos a los que puedes consultar cualquier duda.</p>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!--Final  Servicios-->  

    <!--3 mas vendidos-->  
    <div class="service-area area-padding-top">
        <div class="container">
            <div class="area-heading row">
                <div class="col-md-5 col-xl-4">
                    <div class="h3">Libros mas vendidos</div>
                </div>
                <div class="col-md-7 col-xl-8">
                  
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="book_more_sell text-justify text-lg-left mb-4 mb-lg-0">
                        <div class="zoom">
                             <img src="img/books/3.jpg">
                        </div>
                      
                        <div class="book_more_sell__title h3">Manual del perfecto idiota</div>
                        <p class="book_more_sell__subtitle"> El título despierta sensaciones encontradas: interesa, pero incomoda. Antes de haber leído la primera línea, y siendo latinoamericanos, nos preguntamos, explicablemente inquietos, si quedaremos incluidos entre los destinatarios de este “Manual”...</p>
                        <a class="book_more_sell__link" href="#">Ver mas</a>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="book_more_sell text-justify text-lg-left mb-4 mb-lg-0">
                        <div class="zoom">
                            <img src="img/books/1.jpg">
                        </div>
                        
                        <div class="book_more_sell__title h3">La reina roja</div>
                        <p class="book_more_sell__subtitle">El mundo de Mare Barrow esta dividido por sangre, aquellos con roja y aquellos con plateada. Mare y su familia son humildes Rojos, destinados a servir a la elite Plateada cuyas habilidades sobrenaturales los hacen casi dioses...</p>
                        <a class="book_more_sell__link" href="#">Ver mas</a>
                    </div>
                </div>
<style type="text/css">
    .new{
        background-color: #09f;
        margin: auto;
        z-index: 99;
        color: #fff;
        font-family: arial;
        position: absolute;
        width: 30%;
        box-shadow: 1px 1px 5px #000;
        -moz-box-shadow: 1px 1px 5px #000;
        -webkit-box-shadow: 1px 1px 5px #000;
        margin-top: 15px;
        border-radius:0px 25px 25px 0px;
    }

</style>
                <div class="col-md-6 col-lg-4" style="z-index: 70">
                     
                    
                        <div class="new">
                        <p class="font-weight-bold pl-5"> Nuevo</p>
                    </div>
                    <div class="book_more_sell text-justify text-lg-left mb-4 mb-lg-0">
                         <div class="zoom">
                        <img src="img/books/2.jpg">
                    </div>
                        <div class="book_more_sell__title h3">Pablo Escobar 'Mi padre'</div>
                        <p class="book_more_sell__subtitle">Pasaron más de veinte años de silencio mientras recomponía mi vida en el exilio. Para cada cosa hay un tiempo y este libro, al igual que su autor, necesitaban un proceso de maduración, autocrítica y humildad. Solo así estaría listo para sentarme a escribir historias que aún hoy para la sociedad colombiana siguen siendo un interrogante...</p>
                        <a class="book_more_sell__link" href="#">Ver mas</a>
                    </div>
                </div>

            </div>
        </div>
    </div>    
    <!--Final mas vendidos-->      

    <!-- Seccion de comentarios -->    
    <section class="testimonial">
        <div class="container">
            <div class="testi_slider owl-carousel owl-theme">
                <div class="item">
                    <div class="testi_item">
                        <div class="testimonial_image">
                            <img src="img/elements/jenny.jpg" alt="">
                        </div>
                        <div class="testi_item_content">
                            <p>
                                “ ¡¡Amo este lugar!!, el mejor sitio para encontrar muy buena lectura o solicitarla📚❤️, la atención es muy agradable, que haya un lugar como este en la ciudad me encanta”
                            </p>
                            <div class="h4">- Jenny Tabare  -</div>       
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testi_item">
                        <div class="testimonial_image">
                            <img src="img/elements/buceina.jpg" alt="">
                        </div>
                        <div class="testi_item_content">
                            <p>
                                “ Excelente!! Un pequeño rincón en Ciudad Bolívar lleno de Cultura y Sabiduría. La lectura no solamente educa; ayuda al crecimiento personal y la comprensión del mundo. Gracias alfa libros.”
                            </p>
                            <div class="h4">- Buceina Abud  -</div>         
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="testi_item">
                        <div class="testimonial_image">
                            <img src="img/elements/gina.jpg" alt="">
                        </div>
                        <div class="testi_item_content">
                            <p>
                                “ Excelente tienda para los amantes de la lectura, variedad de libros desde el romanticismo hasta el suspenso pasando por la tecnología que nos ayuda a incursionar en la lectura de una manera fácil y sencilla. No te quedes sin tu libro hay también para los más pequeños de la casa. Te invito a visitarla y te garantizo que volverás por otro.”
                            </p>
                            <div class="h4">- Gina Perniciaro  -</div>       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Final Seccion de comentarios -->    

    <!-- Horario de atencion -->
    <section class="hotline-area text-center area-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Numero de contacto</h2>
                    <span>(+58) –  0285 632 7125</span>
                    <p class="pt-3">Horario de atencion los 7 dias de la semana de 8:00 a 17:00.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Final Horario de atencion -->  

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
    width="350"
    height="400"
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
<script type="text/javascript" src="js/script_logo.js"></script>
<script type="text/javascript">
</script>

</body>
</html>