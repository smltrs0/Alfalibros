<?php
session_start();
if (isset($_SESSION['username'])) {
   header('Location: index.php'); 
}
  ?>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../img/favicon.png" type="image/png">
    <title>Entrar al sistema</title>
    <!-- Bootstrap core CSS -->
	<link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="./assets/css/all.css">
	<script src="assets/js/jquery.min.js"></script>

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
      html,
body {
  height: 100%;
}

body {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: center;
  align-items: center;
  padding-top: 40px;
  padding-bottom: 40px;
  background-color: #fff;
}

.form-signin {
  width: 100%;
  max-width: 330px;
  padding: 15px;
  margin: auto;
}
.form-signin .checkbox {
  font-weight: 400;
}
.form-signin .form-control {
  position: relative;
  box-sizing: border-box;
  height: auto;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
    </style>
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
 <div class="">
   <a href="../"><i class="fa fa-angle-left fa-2x" style="position: fixed;" title="Regresar a la pagina principal"> </i></a>
 </div>
    <form class="form-signin" action="controller/login_controller.php" method="POST" id="login_form">
  <img class="mb-4" src="../img/favicon.png" alt="" width="200" height="200">
  <h1 class="h3 mb-3 font-weight-normal">Sistema de ingreso</h1>
  
  <div class="form-group">
    <label for="inputUsername" class="sr-only">Correo electrónico</label>
    <input type="text" id="inputUsername" name="email" class="form-control" placeholder="Correo electrónico" required autofocus>
  </div>
  <div class="form-group">
    <label for="inputPassword" class="sr-only">Contraseña</label>
  <input type="password" id="inputPassword" name="clave" class="form-control" placeholder="Contraseña" required >
  </div>
  <div class="alert alert-danger" id="alert" style="display:none;">
              <strong id="text-alert"></strong>
            </div>
  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Recuerdame
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
  <p class="mt-5 mb-3 text-muted">&copy; 2019</p>
</form>

        <script type="text/javascript">
          $(document).ready( function () {
    $(document).on('submit', '#login_form', function(event)
    { 
      event.preventDefault();

      $.ajax({
        url: 'controller/login_controller.php',
        type: 'POST',
        contentType:false,
        processData:false,
        data:new FormData(this),
      })
      .done(function(data) {
        if (data=='Error_1') {
         $('#text-alert').html('Su usuario ha sido deshabilitado del sistema.');
        $('#alert').fadeIn(1000);
              setTimeout(function() 
              { 
              // Ocultamos el alerta
                 $('#alert').fadeOut(1000); 
              }, 10000);
       }else if (data=='Error_2') {
        $('#text-alert').html('Nombre de usuario o contraseña no son correctos.');
        $('#alert').fadeIn(1000);
              setTimeout(function() 
              { 
              // Ocultamos el alerta
                 $('#alert').fadeOut(1000); 
              }, 10000);
       }else if (data=='Error_3') {
         $('#text-alert').html('Los campos no pueden estar vacios.');
        $('#alert').fadeIn(1000);
              setTimeout(function() 
              { 
              // Ocultamos el alerta
                 $('#alert').fadeOut(1000); 
              }, 10000);
       }else if(data=='Logueo_exitoso') {
         $('#text-alert').html('Logueado con exito');
         $('#alert').removeClass('alert-danger');
          $('#alert').addClass('alert-success');
        $('#alert').fadeIn(1000);
              setTimeout(function() 
              { 
              // Ocultamos el alerta
                 $('#alert').fadeOut(1000); 
              }, 10000);
        window.location.href='index.php';
        }else{
          alert("Error"+data);
        }

      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
      

    });

});
        </script>


</body>
</html>