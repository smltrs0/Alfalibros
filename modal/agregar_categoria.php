<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 <i class="fa fa-plus"></i> Registrar categoria
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <div class="modal-body">

            <form id="FormId">

                <div class="form-group">

                    <label>Categoria</label>
                    <input class="form-control" type="text" name="name">

                </div>

                <div class="modal-footer">

                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                    <button id="butsave" type="submit" class="btn btn-primary">Guardar</button>

                </div>

            </form>

        </div>

       

    </div>
  </div>
</div>