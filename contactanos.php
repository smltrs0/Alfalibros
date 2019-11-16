<!doctype html>
<html lang="es-ve">
<head>
    <!--meta-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="es">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
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

    <!--3 mas vendidos-->  
    <div class="service-area area-padding-top">
        <div class="container">
            <div class="area-heading row">
                <div class="col-md-7 col-xl-8">
                  
                </div>
            </div>
            <div class="row mb-4">
            	<h2>Envíanos un mensaje</h2>
                <div class="col-md-12 col-lg-12">
                    <form>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputNombre4">Nombre</label>
      <input type="text" class="form-control" id="inputNombre4" placeholder="Nombre">
    </div>
    <div class="form-group col-md-6">
      <label for="inputapellido">Apellido</label>
      <input type="text" class="form-control" id="inputapellido" placeholder="Apellido">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="correo">Correo</label>
      <input type="text" class="form-control" id="correo">
    </div>
    <div class="form-group col-md-6">
      <label for="inputState">Telefono</label>
      <input type="number" class="form-control" name="telefono" placeholder="Telefono">
    </div>
    <div class="form-group col-12">
        <textarea class="form-control">
            
        </textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        No soy un robot
      </label>
    </div>
  </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
                </div>
            </div>
        </div>
    </div>    
    <!--Final mas vendidos-->      

   
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