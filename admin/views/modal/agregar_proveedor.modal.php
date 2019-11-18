<div id="proveedorModal" class="modal fade">
	<div class="modal-dialog">
		<form method="post" id="proveedor_form">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title"></h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
				<div class="modal-body">
					<label>Nombre</label>
					<input type="text" name="nombre" id="nombre" class="form-control" required />
					<br />
					<label>Apellido</label>
					<input type="text" name="apellido" id="apellido" class="form-control" required />
					<div class="form-group">
            <label>Tipo de documento</label>
            <select class="form-control" name="cod_tipo_documento" id="tipo_de_documento" required>
              <option value="">Seleccione un tipo de documento:</option>
              <?php foreach ($tipos_de_documento as $key): ?>
                <option value="<?php echo $key['id_tipo_de_documento']; ?>"><?php echo $key['tipo_de_documento']; ?></option>
              <?php endforeach ?>
              <!-- ESTE LUEGO SE TRATARA CON JS PARA AGREGAR OTRO INPUT PARA AÑADIR EL NUEVO AUTOR -->
            </select>
          </div>
					<label>Documento</label>
					<input type="number" name="documento" id="documento" class="form-control" required>
					<label>Nombre comercial</label>
					<input type="text" name="nombre_comercial" id="nombre_comercial" class="form-control">
					<label>Direccion</label>
					<input type="text" name="direccion" id="direccion" class="form-control" required>
					
					<label>Telefono</label>
					<input type="text" name="telefono" id="telefono" class="form-control" pattern="\x2b[0-9]+" size="20" placeholder="+584XXXXXXXXX" required>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="id" id="id" />
					<input type="hidden" name="operation" id="operation" />
					<input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				</div>
			</div>
		</form>
	</div>
</div>