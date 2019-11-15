
<!-- Modal -->
<div class="modal fade" id="modalEditCliente">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalEditCliente">Editar cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="POST" action="controller/nuevo_cliente.php">
        <input type="text" name="id value" id="id_cliente">
          <div class="form-group">
            <label>Tipo de documento</label>
            <select class="form-control" name="tipo_de_documento" id="tipo_de_documento">
              <option value="">Seleccione un tipo de documento:</option>
              <?php foreach ($tipos_de_documento as $key): ?>
                <option value="<?php echo $key['id_tipo_de_documento']; ?>"><?php echo $key['tipo_de_documento']; ?></option>
              <?php endforeach ?>
              <!-- ESTE LUEGO SE TRATARA CON JS PARA AGREGAR OTRO INPUT PARA AÑADIR EL NUEVO AUTOR -->
            </select>
          </div>

          <div class="form-group">
            <label>N° Documento sin puntos ni espacios</label>
            <input class="form-control" type="text" name="cedula" id="cedula">
          </div>

          <div class="form-group">
            <label>Nombre</label>
            <input class="form-control" type="text" name="nombre" id="nombre">
          </div>

          <div class="form-group">
            <label>Apellido</label>
            <input class="form-control" type="text" name="apellido" id="apellido"> 
          </div>

          <div class="form-group">
            <label>Direccion</label>
            <input class="form-control" type="text" name="direccion" id="direccion">
          </div>

          <div class="form-group">
            <label>Telefono</label>
            <input class="form-control" type="text" name="telefono" pattern="\x2b[0-9]+" size="20" placeholder="+584XXXXXXXXX" id="telefono">
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar cambios</button> 
      </form>
      </div>
    </div>
  </div>
</div>