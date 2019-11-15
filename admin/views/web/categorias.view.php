<?php 
require(TEMPLATES.'head.php');
 ?>

<body>
  <?php
    require(TEMPLATES.'menu.php');
   ?>

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <?php 
        require(TEMPLATES.'header.php');
         ?>
        <!-- Content -->
        <div class="content">
<?php 
require(TEMPLATES.'breadcrumb.php');
 ?>
 <div class="row">
              <div class="card shadow-blue"> 
              <?php require(VIEWS_MODAL.'agregar_categoria.modal.php'); 
                    require(VIEWS_MODAL.'editar_categoria.modal.php');
              ?>
              </div>
            </div>
            <!-- Animated test -->
            <div class="card p-3 col-12">

                <table id="Tabla" class="table table-hover">
    <thead>
        <tr>
            <th width="10%">id</th>
            <th width="80%">Nombre</th>
            <th width="10%"> Accion</th>
        </tr>
    </thead>
    <tbody>
        
    </tbody>
</table>
            </div>

        </div>

    <script>
   function eliminarCategoria(elem) {
        var eliminarElemento = confirm("¿Esta seguro que deseas eliminar este elemento?");
        if ( eliminarElemento == true) 
        {
            data_id = $(elem).data('target');
            var id = 'id='+ data_id;
           $.ajax({
                    type: "POST",
                    url: "eliminar.php",
                    data: id,
                    success: function(data)
                      {
                        console.log(data_id);
                          // Actualizamos la lista en el card-body
                      }
           });
        }

 }
 function editarCategoria(argument) {
     data_id = $(argument).data('target');
            var id = 'id='+ data_id;
           $.ajax({
                    type: "POST",
                    url: "controller/get_categoria.php",
                    data: id,
                    dataType:"json",
                    success: function(data)
                      {
                        $('#editarCategoriaModal').modal('show');
                        $('#id_categoria').val(data_id);
                        $('#nombre_categoria').val(data.categoria);
                          // Actualizamos la lista en el card-body
                          console.log(data);
                      }
           });
  }
             // Esta parte se encarga de renderizar la tabla usando ajax
    $.ajax({
    "method":"POST",
    url: "controller/get_categorias.php",
    success : function(data) {
        var res = JSON.parse(data);//A la variable le almacena todo el json codificado
        console.log(res);
                                //para poder renderizarlo en la tabla, sin esto no funciona!
        $('#Tabla').dataTable( {
            "language": {
            "url": "scripts/js/traducciones/Spanish.json" // traducimos al español datatable
            },
                "processing": true,
                data : res,
                columns: [
                {"data" : "id_categoria"},
                {"data" : "categoria"},
                //la idea es disparar un evento que abra un modal ya sea tanto para actualizar como para eliminar(confirmando la eliminacion)
                {
            "data": null,
            render:function(data, type, row)
            {
              return '<button onclick="editarCategoria(this)" data-target='+data['id_categoria']+' class="editar btn btn-warning btn-sm text-white"><i class="fa fa-edit"></i></button> <a onclick="eliminarCategoria(this)" data-target='+data['id_categoria']+' class="eliminar btn btn-danger btn-sm text-white"><i class="fa fa-trash"></i></a>';
            },
            "targets": -1
        },
                        ]
                                });
                             }       
            });

    $('#registro').click(function(){
  var form = $('#formulario_registro').serialize();
          //Esta parte se encarga de procesar lo que esta en el formulario y mandarlo a  "add_categoria.php" 
          $.ajax({
            method: 'POST',
            url: 'controller/add_categoria.php',
            data: form,
            success: function(res){
            $('#load').hide();
            alert("Agregado correctamente");
             $('#modalwindow').modal('hide');
            //Aun falta agregarle sweet alert para que se vea mucho mejor
            //nedd agregar funcion para limpiar y cerrar el modal y actualizar la tabla despues de agregar
    }

  });

});


</script>
        <!-- /.content -->
    </div>
    <!-- /#right-panel -->
<?php 
require(TEMPLATES.'scripts.php');
 ?>

</body>
</html>