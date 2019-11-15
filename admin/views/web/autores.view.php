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
              <?php require(VIEWS_MODAL.'agregar_autor.modal.php');
                    require(VIEWS_MODAL.'editar_autor.modal.php');
               ?>
              </div>
            </div>

            <!-- Animated test -->
            <div class="card p-3 col-12">

                <table id="Tabla" class="table">
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
        <!-- /.content -->
    </div>
    <!-- /#right-panel -->

     <script>
            function eliminarAutor(elem) {
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
 function editarAutor(argument) {
     data_id = $(argument).data('target');
            var id = 'id='+ data_id;
           $.ajax({
                    type: "POST",
                    url: "controller/get_autor.php",
                    data: id,
                    dataType:"json",
                    success: function(data)
                      {
                        $('#editarAutorModal').modal('show');
                        $('#idAutor').val(data_id);
                        $('#autorNombre').val(data.autor);
                        
                        console.log(data.autor);
                          // Actualizamos la lista en el card-body
                      }
           });
  }
             // Esta parte se encarga de renderizar la tabla usando ajax
    $.ajax({
    "method":"POST",
    url: "controller/get_autores.php",
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
                {"data" : "id_autor"},
                {"data" : "autor"},
                //la idea es disparar un evento que abra un modal ya sea tanto para actualizar como para eliminar(confirmando la eliminacion)
                {
            "data": null,
            render:function(data, type, row)
            {
              return '<button onclick="editarAutor(this)"  data-target='+data['id_autor']+' class="editar btn btn-warning btn-sm text-white"><i class="fa fa-edit"></i></button> <a onclick="eliminarAutor(this)" data-target='+data['id_autor']+' class="eliminar btn btn-danger btn-sm text-white"><i class="fa fa-trash"></i></a>';
            },
            "targets": -1
        },
                        ]
                                });
                             }       
            });

$(document).ready(function(){



});
     </script>
<?php 
require(TEMPLATES.'scripts.php');
 ?>

</body>
</html>
