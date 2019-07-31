<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#RegistrarAutor">
 <i class="fa fa-plus"></i> Registrar autor
</button>

<!-- Modal -->
<div class="modal fade" id="RegistrarAutor" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Registrar autor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <div class="modal-body">
            <form  method="post" id="formdata">
                <div class="form-group">
                    <label>Autor</label>
                    <input class="form-control" type="text" id="autor" name="autor">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" id="botonenviar" class="btn btn-primary">Guardar</button>

                </div>

            </form>

        </div>

       

    </div>
  </div>
</div>