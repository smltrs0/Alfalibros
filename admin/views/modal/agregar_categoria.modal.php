<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarModal">
 <i class="fa fa-plus"></i> Registrar categoria
</button>
<!-- Modal -->
<div class="modal fade" id="agregarModal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ModalLabel">Registrar categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <form id="formulario_registro" method="POST" action="controller/add_categoria.php">
                <div class="form-group">
                    <label>Categoria</label>
                    <input class="form-control" type="text" id="categoria" name="categoria">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" name="button" id="registro">Guardar</button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>