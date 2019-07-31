<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 <i class="fa fa-plus"></i> Agregar cliente
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar cliente</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form method="POST" action="controller/nuevo_cliente.php">

          <div class="form-group">
            <label>Cedula</label>
            <input class="form-control" type="text" name="cedula">
          </div>

          <div class="form-group">
            <label>Nombre</label>
            <input class="form-control" type="text" name="nombre" pattern="[a-z]{1,15}">
          </div>

          <div class="form-group">
            <label>Apellido</label>
            <input class="form-control" type="text" name="apellido" pattern="[a-z]{1,15}">
          </div>

          <div class="form-group">
            <label>Direccion</label>
            <input class="form-control" type="text" name="direccion">
          </div>

          <div class="form-group">
            <label>Telefono</label>
            <input class="form-control" type="text" name="telefono" pattern="\x2b[0-9]+" size="20" placeholder="+584XXXXXXXXX">
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button> 
      </form>
      </div>
    </div>
  </div>
</div>