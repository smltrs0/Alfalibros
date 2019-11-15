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
            <!-- Animated test -->
            <div class="row">
                <div class="card p-3 col-12">

               <table id="Tabla" class="table table-hover table-sm">
    <thead>
        <tr>
            <th>Id factura</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Fecha</th>
            <th>Total</th>
            <th>DNI</th>
            <th>Forma de pago</th>
            <th width="10%"> Accion</th>
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
<?php 
require(TEMPLATES.'scripts.php');
 ?>
<script type="text/javascript">
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
             // Esta parte se encarga de renderizar la tabla usando ajax
    $.ajax({
    "method":"POST",
    url: "controller/get_all_facturas.php",
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
                {"data" : "id_factura"},
                {"data" : "nombre"},
                {"data" : "apellido"},
                {"data" : "fecha_facturacion"},
                {"data" : "total_factura"},
                {"data" : "documento"},
                {"data" : "descripcion_formapago"},

                //la idea es disparar un evento que abra un modal ya sea tanto para actualizar como para eliminar(confirmando la eliminacion)
                {
            "data": null,
            render:function(data, type, row)
            {
              return '<a href="factura?id='+data['id_factura']+'" title=" Ver actura" class="eliminar btn btn-danger btn-sm text-white"><i class="fa fa-print"></i></a>';
            },
            "targets": -1
        },
                        ]
                                });
                             }       
            });


</script>
</body>
</html>
