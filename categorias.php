<?php 
include 'include/head.php';
 ?>

<body>
  <?php
include'include/menu.php';
   ?>

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <?php 
        include 'include/header.php';
         ?>
        <!-- Content -->
        <div class="content">
<?php 
include 'include/breadcrumb.php';
 ?>
 <div class="row">
              <div class="card shadow-blue"> 
              <?php include 'modal/agregar_categoria.php'; ?>
              </div>
            </div>
            <!-- Animated test -->
            <div class="card p-3 col-12">

                <table id="Tabla" class="table table-resposive hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th class="col-7">Nombre</th>
                            <th>Actualizar Eliminar</th>
                           
                        </tr>
                    </thead>
                        <tbody>
                      
                                        
                        </tbody>
                </table>
            </div>

        </div>
        <!--Script DataTables-->        
<script type="text/javascript">

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
    //Esta parte se encarga de renderizar la tabla usando ajax
    $.ajax({
    "method":"POST",
    url: "controller/get_categorias.php",
    success : function(data) {
        var o = JSON.parse(data);//A la variable le almacena todo el json codificado
                                //para poder renderizarlo en la tabla, sin esto no funciona!
        $('#Tabla').dataTable( {
            "language": {
            "url": "scripts_js/Spanish.json" // traducimos al español datatable
            },
                "processing": true,
                data : o,
                columns: [
                {"data" : "id_categoria"},
                {"data" : "categoria"},
                //la idea es disparar un evento que abra un modal ya sea tanto para actualizar como para eliminar(confirmando la eliminacion)
                {"defaultContent":"<button data-target='modal-eliminar' class='editar btn btn-warning btn-sm text-white'><i class='fa fa-edit'></i></button> <button data-target='modal-eliminar' class='eliminar btn btn-danger btn-sm text-white'><i class='fa fa-trash'></i></button>"},
                        ]
                                });
                             }       
            });



</script>
        <!-- /.content -->
    </div>
    <!-- /#right-panel -->
<?php 
include 'include/scripts.php';
 ?>

</body>
</html>