<?php
require (TEMPLATES.'head.php');
?>
<body>
  <?php
  require (TEMPLATES.'menu.php');
  ?>
  <!-- Right Panel -->
  <div id="right-panel" class="right-panel">
    <?php
    require (TEMPLATES.'header.php');
    ?>
    <!-- Content -->
    <div class="content">
      <?php
      require (TEMPLATES.'breadcrumb.php');
      ?>
      <div class="container">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive table-sm">
              <div align="right">
                <button type="button" id="add_button" data-toggle="modal" data-target="#categoriaModal" class="btn btn-info ">Agregar</button>
              </div>
              <div class="alert alert-success" id="AlertDelete" style="display:none;">
                <strong>Eliminado!</strong> correctamente!
              </div>
              <div class="alert alert-success text-center" id="AlertAdd" style="display:none;">
                <strong>Todo bien </strong> todo correcto!
              </div>
              <br />
              <table id="proveedores" class="table table-hover table-sm">
                <thead>
                  <tr>
                    <th >Id</th>
                    <th width="70%" >Nombre</th>
                    <th >Editar</th>
                    <th >Eliminar</th>
                  </tr>
                </thead>
              </table>
              
            </div>
          </div>
        </div>
      </div>
    </body>
  </html>
<!--Inicio modal-->
<?php 

  require(VIEWS_MODAL.'agregar_categoria.modal.php');

?>
<!--Final modal-->
<script type="text/javascript" language="javascript">

    var dataTable = $('#proveedores').DataTable( {
        "ajax": "controller/get_all_categorias.php",
        "language": {
            "url": "scripts/js/traducciones/Spanish.json"
            },
        "columns": [
           { "data": "id" },
              { "data": "nombre" },
                { "data": "edit" },
                  { "data": "delete" }
        ]
    } );

$(document).ready(function()
{   
      $('#add_button').click(function()
      {
        $('#error-pass').text("");
        $('#categoria_form')[0].reset();
         $('.modal-title').text("Agregar categoria");
        $('#action').val("Agregar");
        $('#operation').val("Add")
    });

  $(document).on('submit', '#categoria_form', function(event)
    {
     event.preventDefault();
      var nombre = $('#nombre').val();
      var id = $('#id').val();
      if (nombre != ''){
        var respuestas= $.ajax({
        url:"controller/insertar_proveedor.php",
        method:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
        success:function(data)
        {
          if (data==true) 
          { 
            $('#categoriaModal').modal('hide');
            if ($('.modal-backdrop').is(':visible')) 
                {
                  $('body').removeClass('modal-open'); 
                  $('.modal-backdrop').remove(); 
                };
            $('#categoria_form')[0].reset();
            $('#AlertAdd').fadeIn(1000);
              setTimeout(function() 
              { 
                 $('#AlertAdd').fadeOut(1000); 
              }, 5000);
            dataTable.ajax.reload();
          }
        },
      error: function (data)
                {
                  alert('ERROR: '+data);
                }
      });
console.log(respuestas);
      }else{
        alert('todos los datos son necesarios');
      }
    
    });
  
  $(document).on('click', '.update', function(){
    var id = $(this).attr("id");
    $.ajax({
      url:"controller/get_categoria.php",
      method:"POST",
      data:{id:id},
      dataType:"json",
      success:function(data)
      { 
        $('.modal-title').text("Editar categoria");
        $('#categoriaModal').modal('show');
        $('#categoria').val(data.categoria);
        $('#id').val(data.id);
        $('#action').val("Editar");
        $('#operation').val("Edit");
      },
      error: function (data)
                {
                  alert('ERROR: '+data);
                }
    })
  });
  $(document).on('click', '.delete', function(){
    var id = $(this).attr("id");
    if(confirm("Seguro quieres eliminar ?"))
    {
      $.ajax({
        url:"controller/eliminar_proveedor.php",
        method:"POST",
        data:{id:id},
        // La función success se ejecuta si no ocurrió ningún fallo durante la ejecución
        success:function(data)
        {
          console.log(data);
          $('#AlertDelete').fadeIn(1000);
              setTimeout(function() 
              { 
                 $('#AlertDelete').fadeOut(1000); 
              }, 5000);
           // Recargamos la tabla ya que sufrió cambios
          dataTable.ajax.reload();
        }
      });
    }
    else
    {
      return false; 
    }
  });
  
});
</script>
        </div>
        <!-- /.content -->
    </div>
    <!-- /#right-panel -->
<?php 
require (TEMPLATES.'scripts.php');
 ?>

</body>
</html>
