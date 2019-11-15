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
					<input type="number" name="cedula" id="cedula" class="form-control">
					<label>Correo</label>
					<input type="email" name="email" id="email" class="form-control">
					<label>Nombre de usuario</label>
					<input type="text" name="username" id="username" class="form-control">
					<label>Tipo de usuario</label>
					<select name="user_level" id="nivel" class="form-control" >
						<option value="">Seleccione un tipo de usuario</option>

						<?php foreach ($user_levels as $key): ?>
								
							<option value="<?php echo $key['id_user_level']; ?>"><?php echo $key['level']; ?></option>

						<?php endforeach ?>
					</select>
					<label>Contraseña</label>
					<input type="password" name="clave" id="clave" class="form-control" new-password>
					<label>Repetir Contraseña</label>
					<input type="password" name="rep_clave" id="rep_clave" class="form-control" new-password>
					<p id="error-pass" class="text-danger"></p>
					<label>Pregunta de seguridad</label>
					<select name="p_seguridad" class="form-control" id="p_seguridad">
						<option value="">Seleccione una pregunta de seguridad</option>
						<?php foreach ($preguntas as $key): ?>
								
							<option value="<?php echo $key['id']; ?>"><?php echo $key['pregunta']; ?></option>

						<?php endforeach ?>
					</select>
					<label>Respuesta</label>
					<input type="text" name="respuesta" id="respuesta" class="form-control">
					<!-- <textarea name="respuesta" id="respuesta" class="form-control"></textarea> -->
					<!-- UN BR? RILI? :V -->
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