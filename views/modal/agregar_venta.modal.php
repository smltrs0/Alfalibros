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

        <form method="POST" action="controller/nueva_venta.php">

          <div class="form-group">
            <label>Cliente</label>
            <select class="form-control" name="cliente">
              <option value="">Seleccione el cliente</option>
              <?php foreach ($clientes as $key): ?>
                <option value="<?php echo $key['id']; ?>"><?php echo $key['nombre']; ?></option>
              <?php endforeach ?>
            </select>
          </div>

          <div class="form-group">
            <label>Articulo</label>
            <select class="form-control" name="libro">
              <option value="">Seleccione el articulo</option>
              <?php foreach ($libros as $key): ?>

                <?php if ($key['cantidad'] > 0): ?>
                  <option value="<?php echo $key['id_info_libro']; ?>"><?php echo $key['titulo'].' - '.$key['autor'].' - '.$key['precio'].'BsS'; ?></option>
                <?php endif ?>

              <?php endforeach ?>
            </select>

          </div>

          <div class="form-group">
            <label>Cantidad</label>
            <input class="form-control" type="number" name="cantidad">
          </div>

          <div class="form-group">
            <label>Forma de pago</label>
            <select class="form-control" name="forma_de_pago">
              <option value="">Seleccione una forma de pago</option>
              <?php foreach ($formas_de_pago as $key): ?>

                <option value="<?php echo $key['id_formapago']; ?>"><?php echo $key['descripcion_formapago']; ?></option>

              <?php endforeach ?>
            </select>
          </div>

          <div class="form-group">
            <label>Precio: </label>
            <script type="text/javascript">
              //AQUI MOSTRARIAMOS DE MANERA DINAMICA EL PRECIO
            </script>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            <input type="submit" class="btn btn-primary" name="vender" value="vender">
          </div>

        </form>
      </div>
    </div>
  </div>
</div>