<!DOCTYPE html>
<html>
<html>
	<head>
		<title>Login</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		 
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
	</head>
<body>
	<style type="text/css">
		/* Esto es solo para centrar la caja del login*/
		.card-login {
        margin: 0 auto;
}
	</style>
<div class="container-fluid">
	<div class="row mx-auto">
		<div class="card card-login mt-5 col-lg-5">
			<div class="card-header">
				<p class="text-center">Entrar al sistema</p>
			</div>
			<div class="card-body">
				<form id="Login" method="POST">
					<div class="form-group">
						<label>Nombre de usuario o Correo electronico</label>
						<input type="text" class="form-control" id="email" name="email" required>
					</div>
					<div class="form-group">
						<label>Contraseña</label>
						<input type="password" class="form-control" id="clave" name="clave" required>
					</div>
					<div>
						<div>
							<p id="cargando"></p>
						</div>
						<div class="alert alert-danger" id="Alert" style="display:none;">
					    	<p id="textError"></p>
					  	</div>
					</div> 
				<input type="submit" class="btn btn-primary btn-block"  id="login" value="Entrar">
				</form>
			</div>
		</div>
</div>
</div>
<script type="text/javascript">
    $('document').ready(function () 
    {
        /*
            Este .on nos va a server para cachar el evento submit, cuando haces click en un boton del tipo "submit" y quiere enviar el formulario, lo hago de esta forma por si tienes un required en un input o algun type="email" de HTML5 se haga la validacion antes de enviar los datos. De igual forma es buena practica hacer una validacion en el back antes de hacer cualquier cosa.
        */
        $('#Login').on('submit', function () 
        { 
        // Capturamos al evento "submit" de nuestro formulario el cual se lanzara al hacer click en un boton del tipo submit
        	// Use el html() en lugar de text() con la idea de colocar una animacion, text convierte todo en
        	// texto plano
        	 $('#cargando').html('Un momento, por favor...');
            var dataToSend = $(this).serialize(); 
            // Aqui ya tenemos el contexto del formulario por eso usamos $(this)
            // de esta manera no necesitamos capturar uno por uno los valores del input
            // Despues hacemos el $.ajax
            $.ajax({
                method: 'POST',
                url: 'controller/login_controller.php', // URL de la pagina que recibira la petición
                data: dataToSend, // Aqui van los datos a enviar, en este caso serializamos los campos del formulario y los asinamos a esta variable por eso solo ponemos esta variable
                // menos codigo bebe! :v
                success: function (data) 
                {
                	// Ocultamos el mensaje cargando ya que el servidor mando un request
                	  $('#cargando').fadeOut(500);
                    console.log(data); 
                     if(data == 'error_1')
                     {
				       $('#textError').text('Tu cuenta no esta activada, por favor ponte en contacto con un administrador si crees que esto es un error!');
				       $('#Alert').fadeIn(1000);
						   setTimeout(function() { 
						   	// Ocultamos el alerta
						       $('#Alert').fadeOut(1000); 
						   }, 8000);
				      }
				      else if(data == 'error_2')
				      {
				    	$('#textError').text('Nombre de usuario o contraseña incorrectos');
				    	$('#clave').val('').focus();
				    	$('#Alert').fadeIn(1000);
						   setTimeout(function() 
						   { 
						   	// Ocultamos el alerta
						       $('#Alert').fadeOut(1000); 
						   }, 7000);
				      }
				      else
				      {
				        // Redireccionamos a la página que diga corresponda al usuario
				        window.location.href= data
				      }	
				},
                error: function (data) 
                {
                	alert('ERROR SERVIDO NO RESPONDE');
                    console.log(data); // Este callback que se lanzara si la url 'login_controller.php' responde con status de null o error, e.g. 400, 404, 500, etc...
                }
            });
            return false; // Este return es para que no se lanze el evento submit al navegador y no brinque de pagina, si no que se queda esperando la respuesta de nuestra llamada ajax.
        });

    });
</script>
</body>
</html>