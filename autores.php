<?php


?>



<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> 
<html class="no-js" lang="es"> 
<!--<![endif]-->
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
              <?php include 'modal/agregar_autor.php'; ?>
              </div>
            </div>

            <!-- Animated test -->
            <div class="card p-3 col-12">

                <table id="Tabla" class="">
    <thead>
        <tr>
            <th>Column 1</th>
            <th>Accion</th>
            <th></th>
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
             // Esta parte se encarga de renderizar la tabla usando ajax
    $.ajax({
    "method":"POST",
    url: "controller/get_autores.php",
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
                {"data" : "id_autor"},
                {"data" : "autor"},
                //la idea es disparar un evento que abra un modal ya sea tanto para actualizar como para eliminar(confirmando la eliminacion)
                {"defaultContent":"<button data-target='modal-eliminar' class='editar btn btn-warning btn-sm text-white'><i class='fa fa-edit'></i></button> <buttoname='delete' data-target='modal-eliminar' class='eliminar btn btn-danger btn-sm text-white'><i class='fa fa-trash'></i></button>"},
                        ]
                                });
                             }       
            });

$(document).ready(function(){
  $(document).on('click', '.delete', function(){
    var user_id = $(this).attr("id");
    if(confirm("Are you sure you want to delete this?"))
    {
      $.ajax({
        url:"delete.php",
        method:"POST",
        data:{user_id:user_id},
        success:function(data)
        {
          alert(data);
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
function deleteRecord(id) {
    if(confirm("Are you sure you want to delete this row?")) {
      $.ajax({
        url: "delete.php",
        type: "POST",
        data:'id='+id,
        success: function(data){
          $("#table-row-"+id).remove();
           dataTable.ajax.reload();
        }
      });
    }
  }
     </script>
<?php 
include 'include/scripts.php';
 ?>

</body>
</html>
