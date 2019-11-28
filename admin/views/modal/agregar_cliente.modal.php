
<!-- Modal -->
<div class="modal fade" id="clienteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="POST" action="controller/nuevo_cliente.php" id="cliente_form">

          <div class="form-group">
            <label>Tipo de documento</label>
            <select class="form-control" name="tipo_de_documento" id="tipo_de_documento" required>
              <option value="">Seleccione un tipo de documento:</option>
              <?php foreach ($tipos_de_documento as $key): ?>
                <option value="<?php echo $key['id_tipo_de_documento']; ?>"><?php echo $key['tipo_de_documento']; ?></option>
              <?php endforeach ?>
              <!-- ESTE LUEGO SE TRATARA CON JS PARA AGREGAR OTRO INPUT PARA AÑADIR EL NUEVO AUTOR -->
            </select>
          </div>

          <div class="form-group">
            <label>N° Documento sin puntos ni espacios</label>
            <input class="form-control" type="number" name="cedula" id="cedula" min="1"  required>
          </div>

          <div class="form-group">
            <label>Nombre</label>
            <input class="form-control" type="text" name="nombre" id="nombre" required>
          </div>

          <div class="form-group">
            <label>Apellido</label>
            <input class="form-control" type="text" name="apellido" id="apellido" required>
          </div>

          <div class="form-group">
            <label>Direccion</label>
            <input class="form-control" type="text" name="direccion" id="direccion" required>
          </div>

          <div class="form-group">
            <label>Telefono</label>
            <input class="form-control" type="text" name="telefono" pattern="\x2b[0-9]+" size="20" placeholder="+584XXXXXXXXX" id="telefono">
          </div>
       
      </div>
      <div class="modal-footer">
          <input type="hidden" name="id" id="id" />
          <input type="hidden" name="operation" id="operation" />
          <input type="submit" name="action" id="action" class="btn btn-success" value="Add" />
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
  </div>
</div>