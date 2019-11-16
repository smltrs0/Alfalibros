<div id="categoriaModal" class="modal fade">
  <div class="modal-dialog">
    <form method="post" id="categoria_form">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title"></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <label>Nombre</label>
          <input type="text" name="categoria" id="categoria" class="form-control" />
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