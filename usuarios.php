<html>
<head>
		<title>Usuarios</title>
		<!--aqui tengo que meter esto en local-->
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.css"/>
		 
		<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.js"></script>
	</head>
	<body>
		<div class="container">			
			<div class="card">
				
				<div class="card-body">
					<div class="table-responsive table-sm">
				<div align="right">
					<button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info ">Agregar</button>
				</div>
					<div class="alert alert-success" id="AlertDelete" style="display:none;">
	    				<strong>Eliminado!</strong> correctamente!
	  				</div>
	  				<div class="alert alert-success text-center" id="AlertAdd" style="display:none;">
	    				<strong>Todo bien </strong> todo correcto!
	  				</div>
				<br />
				<table id="users" class="table table-hover table-sm">
					<thead>
						<tr>
							<th >Image</th>
							<th >Nombre</th>
							<th >Apellido</th>
							<th >Email</th>
							<th >Tipo de usuario</th>
							<th >Editar</th>
							<th >Eliminar</th>
						</tr>
					</thead>
				</table>
				
			</div>
				</div>
			</div>
		</div>
	</body>
</html>
<!--Inicio modal-->
<div id="userModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="user_form" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title"></h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<label>Primer Nombre</label>
					<input type="text" name="nombre" id="nombre" class="form-control" />
					<br />
					<label>Primer Apellido</label>
					<input type="text" name="apellido" id="apellido" class="form-control" />
					<label>Cedula</label>
					<input type="text" name="cedula" id="cedula" class="form-control">
					<label>Correo</label>
					<input type="email" name="email" id="email" class="form-control">
					<label>Nombre de usuario</label>
					<input type="text" name="username" id="username" class="form-control">
					<label>Tipo de usuario</label>
					<select name="cargo" id="cargo" class="form-control" >
						<option value="1" >Usuario Estandar</option>
						<option value="2">Administrador</option>
						<option value="0">Deshabilitado</option>
					</select>
					<label>Contraseña</label>
					<input type="password" name="clave" id="clave" class="form-control">
					<label>Repetir Contraseña</label>
					<input type="password" name="rep_clave" id="rep_clave" class="form-control">
					<p id="error-pass" class="text-danger"></p>
					<label>Pregunta de seguridad</label>
					<textarea name="p_seguridad" id="p_seguridad" class="form-control">
					</textarea>
					<label>Respuesta</label>
					<textarea name="respuesta" id="respuesta" class="form-control">
					</textarea>
					<br />
					<label>Selecciona un avatar para tu usuario</label>
					<input class="form-control-file" type="file" name="user_image" id="user_image" />
					<span id="user_uploaded_image"></span>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="user_id" id="user_id" />
					<input type="hidden" name="operation" id="operation" />
					<input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</form>
	</div>
</div>
<!--Final modal-->

<script type="text/javascript" language="javascript">
		// Renderizamos la tabla con datatable
		// le asignamos la variable dataTable al evento que rendesiza la tabla para posteriormente actualizarla siempre que hagamos un cambio en ella
    var dataTable = $('#users').DataTable( {
        "ajax": "controller/get_all_usuarios.php",
        "columns": [
          { "data": "image" },
            { "data": "nombre" },
              { "data": "apellido" },
            	{ "data": "email" },
              	  { "data": "tipo" },
            		{ "data": "edit" },
            		  { "data": "delete" }
        ]
    } );


// Ejecutamos estos eventos o funciones como les quieras decir después de que cargue la pagina
$(document).ready(function()
{ 		// Ejecutamos este evento al hacer click en el botón agregar
	    $('#add_button').click(function()
	    {
	    	// Limpiamos el mensaje de error-pass
	    	$('#error-pass').text("");
	    	// Limpiamos los campos del modal ya que también se usa para las actualizaciones
			$('#user_form')[0].reset();
			// Cambiamos el titulo de la ventana esto para ahorrar código y usar la misma
			// ventana tanto para agregar como para modificar
			$('.modal-title').text("Agregar Usuario");
			// Cambiamos el  nombre del boton
			$('#action').val("Agregar");
			$('#operation').val("Add");
			$('#user_uploaded_image').html('');
		});

	// Ejecutamos este  evento al  pulsar el botón submit del formulario con el id = user_form
	// Este evento lo usamos tanto para agregar como para actualizar, reutilizacion de código papu!
	// usa el coco :v
	$(document).on('submit', '#user_form', function(event)
	{
		event.preventDefault();
		// Creamos una variable y le asignamos el valor que esta en el input con el id= nombre
		// y asi con los otros...
		var nombre = $('#nombre').val();
		var apellido = $('#apellido').val();
		var cedula = $('#cedula').val();
		var email = $('#email').val();
		var username = $('#username').val();
		var cargo = $('#cargo').val();
		var clave = $('#clave').val();
		var rep_clave = $('#rep_clave').val();
		var p_seguridad = $('#p_seguridad').val();
		var respuesta = $('#respuesta').val();
		var extension = $('#user_image').val().split('.').pop().toLowerCase();
		if(extension != '')
		{	
			// Primero validamos que sea una imagen 
			if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
			{
				// Se dispara in alerta si el formato no es el correcto 
				alert("Invalid Image File");
				// Limpiamos el input ya que el formato no es el correcto
				$('#user_image').val('');
				return false;
			}
		}
		// Solo hacemos una validación de todos los campos para escribir menos código :v y menos if :v
		// viva la flojera .-.  
		if(nombre != '' && apellido != '' && cedula != '' && email != '' && clave != '' && rep_clave !='')
		{
			if (clave==rep_clave) 
			{
				$.ajax({
				url:"controller/insertar_usuario.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					// La función nos regresa un true si se agrego o actualizo
					if (data==true) 
					{
						// Limpiamos los campos del formulario en el modal
						$('#user_form')[0].reset();
						$('#userModal').modal('hide');
						// Ocultamos el modal
						// Mostramos un alerta 
						$('#AlertAdd').fadeIn(1000);
					   	setTimeout(function() 
					   	{ 
					   	// Ocultamos el alerta
					       $('#AlertAdd').fadeOut(1000); 
					   	}, 5000);
					   // Recargamos la tabla ya que sufrió cambios
						dataTable.ajax.reload();
					}else{
						// Por ahora solo mostramos un  error por consola
						console.log( 'Error' );
						alert('No se pudieron guardar los datos en la base de datos, error interno.');
					}
				}
			});
			}
			else 
				{
					// Mostramos el mensaje por consola
					console.log('Las contraseñas no coinciden');
					//jquery simplificando la vida, mira la diferencia de javascript nativo vs jquery
					//document.getElementById('error-pass').innerHTML="Las contraseñas no coinciden";
					$('#error-pass').text("Las contraseñas no coinciden");
					$("#rep_clave").focus();
				}
		}
		else
		{
			alert("Todos los campos son requeridos!");
		}
	});
	// Este evento se ejecuta al hacer click en el botón update, toma los datos del id 
	// de el usuario al que pertenece y hace un request para rellenar los campos en el update
	$(document).on('click', '.update', function(){
		$('#error-pass').text("");
		var user_id = $(this).attr("id");
		$.ajax({
			url:"controller/get_usuario.php",
			method:"POST",
			data:{user_id:user_id},
			// Determinamos el formato en el cual se resiviran los datos para poder usarlos
			dataType:"json",
			// Si la consulta se ejecuta correctamente
			success:function(data)
			{	console.log(data);
				// Mostramos el modal
				$('#userModal').modal('show');
				// Rellenamos los inputs con los valores que corresponde
				$('#username').val(data.username);
				$('#nombre').val(data.nombre);
				$('#apellido').val(data.apellido);
				$('#cedula').val(data.cedula);
				$('#email').val(data.email);
				// Se esta usando MD5 como algoritmo de encriptado y solo permite el encriptado en una dirección por lo cual cuando se actualiza cualquier dato del usuario es necesario actualizar la contraseña 
				$('#clave').val(data.clave);
				$('#rep_clave').val(data.clave);
				$('#cargo').val(data.cargo);
				$('#p_seguridad').val(data.pregunta);
				$('#respuesta').val(data.respuesta);
				// Escribimos en el modal title "Editar usuario"
				$('.modal-title').text("Editar Usuario");
				// El user id se reemplazara en un input oculto
				$('#user_id').val(user_id);
				$('#user_uploaded_image').html(data.user_image);
				// Aqui reemplazamos el valor del boton submit ya que estamos reutilizando el modal
				$('#action').val("Editar");
				$('#operation').val("Edit");
			},
			error: function (data) 
                {
                	alert('ERROR SERVIDO NO RESPONDE');
                    console.log(data); // Este callback que se lanzara si la url 'login_controller.php' responde con status de null o error, e.g. 400, 404, 500, etc...
                }
		})
	});
	
	$(document).on('click', '.delete', function(){
		var user_id = $(this).attr("id");
		// No se si hacer  que el administracion introdusca su contraseña para mas seguridad!
		// aparte no nos pagara por esto aun :v
		if(confirm("Seguro quieres eliminar este usuario?"))
		{
			$.ajax({
				url:"controller/eliminar_usuario.php",
				method:"POST",
				data:{user_id:user_id},
				// La función success se ejecuta si no ocurrió ningún fallo durante la ejecución
				success:function(data)
				{
					console.log(data);
					// Generamos una animacion, los 1000 es el tiempo que durara la animacion, el tiempo se
					// mide en milisegundos 1000 milisegundos es igual a 1 seg
					// Mostramos un alerta 
					$('#AlertDelete').fadeIn(1000);
				   setTimeout(function() { 
				   	// Ocultamos el alerta
				       $('#AlertDelete').fadeOut(1000); 
				   }, 5000);
				   // Recargamos la tabla ya que sufrió cambios
					dataTable.ajax.reload();
				}
			});
		}
		else
		{
			return false;	
		}
	});
	
	// Creo que ya esta casi toda la validación por parte del front end
});
</script>