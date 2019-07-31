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
              <?php include 'modal/agregar_categoria.php'; ?>
              </div>
            </div>
            <!-- Animated test -->
            <div class="card p-3 col-12">

                <table id="Tabla" class="table table-resposive hover">
    <thead>
        <tr>
        <th>Id</th>
            <th>Nombre</th>
            <th>Accion</th>
        </tr>
    </thead>
    <tbody>
  
                    
    </tbody>
</table>
             </div>
        </div>
        <!--Script DataTables-->        
<script type="text/javascript">
    function Registrar()
{
    var categoria_post = $("#nombre").val();
    $("#respuesta").html(" Por favor espera un momento");
    $.ajax({
        type: "POST",
        dataType: 'html',
        url: "controller/nueva_categoria.php",
        data: "nombre="+categoria_post,
        success: function(resp){
            $('#respuesta').html(resp);
            Limpiar();
            Cargar();
        }
    });
}   


        //Usamos este modelo ya que encodejson regresa "Nested object data (arrays)"
         $(document).ready (function() {

                $("#submitForm").unbind('submit').bind('submit', function() {
                var form = $(this);
         
                var url = form.attr('action');
                var type = form.attr('method');
 
        // sending the request to server
        $.ajax({
            url: url,
            type: type,
            data: form.serialize(),
            dataType: 'text',
            success:function(response) {
                $("#submitForm")[0].reset();
                alert(response);
            }
        });
 
        return false;
    });





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
                            {"data" : "id"},
                            {"data" : "nombre"},
                            {"defaultContent":"<button data-target='modal-eliminar' class='editar btn btn-warning btn-sm text-white'><i class='fa fa-edit'></i></button>  <button class='btn btn-danger btn-sm'><i class='fa fa-trash-alt'></i></button>"}
                        ]
                    });
                }       
            });




    $(document).on("click", ".delete", function() { 
        var $ele = $(this).parent().parent();
        $.ajax({
            url: "delete_ajax.php",
            type: "POST",
            cache: false,
            data:{
                id: $(this).attr("data-id")
            },
            success: function(dataResult){
                var dataResult = JSON.parse(dataResult);
                if(dataResult.statusCode==200){
                    $ele.fadeOut().remove();
                }
            }
        });
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