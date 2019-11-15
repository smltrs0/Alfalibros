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

            <!-- Animated test -->
            <div class="row">
              <div class="card shadow-blue"> 
                <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_cliente">
 <i class="fa fa-plus"></i> Agregar cliente
</button>
              <?php require(VIEWS_MODAL.'agregar_cliente.modal.php'); ?>
              <?php require(VIEWS_MODAL.'editar_cliente.modal.php'); ?>
              </div>
            </div>
            <div class="row animated bounceInDown">
              
             <div class="card p-3 col-12">
                <table id="Tabla" class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th width="10%">Dni</th>
            <th >Nombre</th>
            <th width="10%"> Apellido</th>
            <th>Telefono</th>
            <th>Direccion</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tbody>
        
    </tbody>
</table>
             </div>
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
                    url: "controller/eliminar_cliente.php",
                    data: id,
                    success: function(data)
                      {
                       // $('#Tabla').dataTable.reload();
                        alert(data);
                        //location.reload()
                          // Actualizamos la lista en el card-body
                      }
           });
        }

 }
 function editarCliente(argument) {
     data_id = $(argument).data('target');
            var id = 'id='+ data_id;
           $.ajax({
                    type: "POST",
                    url: "controller/get_cliente.php",
                    data: id,
                    dataType:"json",
                    success: function(data)
                      {
                        $('#modalEditCliente').modal('show');
                        $('#id_cliente').val(data.id);
                         $("#tipo_de_documento").val(data.id_tipo_de_documento)
                        $('#cedula').val(data.documento);
                        $('#nombre').val(data.nombre);
                        $('#apellido').val(data.apellido);
                        $('#direccion').val(data.direccion);
                        $('#telefono').val(data.telefono);
                        console.log(data);
                          // Actualizamos la lista en el card-body
                      }
           });
  }
             // Esta parte se encarga de renderizar la tabla usando ajax
 

$.ajax({
    "method":"POST",
    url: "controller/get_all_clientes.php",
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
                {"data" : "id"},
                {"data" : "documento"},
                {"data" : "nombre"},
                {"data" : "apellido"},
                {"data" : "telefono"},
                {"data" : "direccion"},
                //la idea es disparar un evento que abra un modal ya sea tanto para actualizar como para eliminar(confirmando la eliminacion)
                {
            "data": null,
            render:function(data, type, row)
            {
              return '<button onclick="editarCliente(this)" data-target='+data['id']+' class="editar btn btn-warning btn-sm text-white"><i class="fa fa-edit"></i></button> <a onclick="eliminarAutor(this)" data-target='+data['id']+' class="eliminar btn btn-danger btn-sm text-white"><i class="fa fa-trash"></i></a>';
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
require (TEMPLATES.'scripts.php');
 ?>

</body>
</html>
