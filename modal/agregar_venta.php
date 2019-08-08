<?php 

  require_once('classes/cliente.php');
  require_once('classes/libro.php');

  $clientes = new cliente();
  $clientes = $clientes->get_all();

  $libros = new libro();
  $libros = $libros->get_all();

?>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
 <i class="fa fa-plus"></i> Registrar venta
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registrar venta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>

          <div class="form-group">
            <label>Cliente</label>
            <select class="form-control" name="tipo_de_documento">
              <option value="">Seleccione el cliente</option>
              <?php foreach ($clientes as $key): ?>
                <option value="<?php echo $key['id']; ?>"><?php echo $key['nombre']; ?></option>
              <?php endforeach ?>
            </select>
          </div>

          <div class="form-group">
            <label>Articulo</label>
            <select class="form-control" name="tipo_de_documento">
              <option value="">Seleccione el articulo</option>
              <?php foreach ($libros as $key): ?>
                <option value="<?php echo $key['id_libro']; ?>"><?php echo $key['titulo'].' - '.$key['autor'].' - '.$key['precio'].'BsS'; ?></option>
              <?php endforeach ?>
            </select>

          </div>

          <div class="form-group">
            <label>Cantidad</label>
            <input class="form-control" type="number" name="cantidad">
          </div>

          PRECIO

          <!-- ESO DEBE SER CAPTURADO CON JS PARA SUMAR LA CANTIDAD TOTAL DEL PRECIO -->

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>