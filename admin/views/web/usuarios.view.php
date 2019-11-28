<?php 
  require (TEMPLATES.'head.php');
    if ($cargo=='1') {
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
<?php 
require (TEMPLATES.'breadcrumb.php');
 ?>
		<div class="container">			
			<div class="card">
				
				<div class="card-body">
					<div class="table-responsive table-sm">
				<div align="right">
					<button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info ">Agregar</button>
				</div>
					<div class="alert alert-success text-center" id="AlertDelete" style="display:none;">
	    				<strong id="delete">Eliminado! correctamente!</strong>
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
<?php 

	require(VIEWS_MODAL.'agregar_usuario.modal.php');

?>
<!--Final modal-->

<!-- no entiendo un coño de tu codigo js mrc :v en fin, ahi te hice la clase usuario con sus verificaciones falta hacerle el metodo para que conecte a la bd -->

<script type="text/javascript" language="javascript">
		// Renderizamos la tabla con datatable
		// le asignamos la variable dataTable al evento que rendesiza la tabla para posteriormente actualizarla siempre que hagamos un cambio en ella
    var dataTable = $('#users').DataTable( {
        "ajax": "controller/get_all_usuarios.php",
        "language": {
            "url": "scripts/js/traducciones/Spanish.json" // traducimos al español datatable
            },
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
				alert("Formato del avatar es invalido.");
				// Limpiamos el input ya que el formato no es el correcto
				$('#user_image').val('');
				return false;
			}
		}
		// Solo hacemos una validación de todos los campos para escribir menos código :v y menos if :v
		// viva la flojera .-.  
		if(nombre != '' && apellido != '' && cedula != '' && email != '' && username != '' && cargo != '' && clave != '' && rep_clave !=''&& p_seguridad != '' && respuesta!= '')
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
						$('#userModal').modal('hide');
						if ($('.modal-backdrop').is(':visible')) 
			                {
			                  $('body').removeClass('modal-open'); 
			                  $('.modal-backdrop').remove(); 
			                };
						// Limpiamos los campos del formulario en el modal
						$('#user_form')[0].reset();
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
						if (data=='') {
							$("#cargo").focus();
							alert("Es necesario que selecciones un nivel de usuario.");
						}else{
							console.log( 'Error '+ data );
						alert('No se pudieron guardar los datos en la base de datos, error interno.');
						}
						
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
				// $('#userModal').modal('show');
				// Rellenamos los inputs con los valores que corresponde
				$('#username').val(data.username);
				$('#nombre').val(data.nombre);
				$('#apellido').val(data.apellido);
				$('#cedula').val(data.cedula);
				$('#email').val(data.email);
				// Se esta usando MD5 como algoritmo de encriptado y solo permite el encriptado en una dirección por lo cual cuando se actualiza cualquier dato del usuario es necesario actualizar la contraseña 
				$('#nivel').val(data.cargo);
				$('#p_seguridad').val(data.pregunta);
				// $('#clave').val(data.clave);
				// $('#rep_clave').val(data.clave);
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
					$('#delete').html(data);
					$('#AlertDelete').fadeIn(1000);
				   setTimeout(function() { 
				   	// Ocultamos el alerta
				       $('#AlertDelete').fadeOut(1000); 
				   }, 5000);
				   // Recargamos la tabla ya que sufrió cambios
					dataTable.ajax.reload();
					console.log(data);
					
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
        </div>
        <!-- /.content -->
    </div>
    <!-- /#right-panel -->
<?php 
require (TEMPLATES.'scripts.php');
}else{
	echo '<script>
    alert("No tienes permiso para entrar a esta zona");
    history.back(1);
  </script>';
}
 ?>

</body>
</html>
