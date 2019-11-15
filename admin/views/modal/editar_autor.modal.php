<!-- Modal -->
<div class="modal fade" id="editarAutorModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Editar autor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <div class="modal-body">
            <form  method="post" id="formdata" action="controller/nuevo_autor.php">
                <div class="form-group">
                    <label>Autor</label>
                    <input type="" name="" id="idAutor">
                    <input class="form-control" type="text" id="autorNombre" name="autor">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" id="botonenviar" class="btn btn-primary">Guardar cambios</button>

                </div>

            </form>

        </div>

       

    </div>
  </div>
</div>