<?php 
// Deshabilitamos errores de php 
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
        <div class="card animated bounceInDown" id="card_carrito">
           
            <div class="card-header">
                Finalizar orden de compra
            </div> 
            <form action="#" >
            <div class="card-body">
                    <div class="form-row">
                    <!--colocar o no colocar la foto...-->
                    <div class="col-4"><p class="font-weight-bold text-dark">Nombre del libro</p></div>
                     <div class="col-4"><p class="font-weight-bold text-dark">Precio</p></div>
                    <div class="col-4"><p class="font-weight-bold text-dark">Cantidad</p></div>
                </div>
          
                 <div id="carrito"></div>
                  <div class="row justify-content-end">
                    <div class="col-4">
                        <div class="text-dark" id="total"></div>
                    </div>
                </div>
                 <div class="row justify-content-end">
                    <div class="col-4">
                     <div class="text-dark" id="iva"> </div>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-4">
                     <div class="text-dark" id="total_neto"> </div>
                    </div>
                </div>
                <div class="form-group row mt-3">
                    <label  class="col-2 col-form-label">Cliente:</label>
                    <div class="col-9">
                  <input type="text" class="form-control"  placeholder="Selecciona un cliente">
                </div>
                <div class="col-1">
                    <a href="#" title="Agregar un Nuevo Cliente">
                        <span class="fa-stack">
                            <i class="fas fa-user fa-stack-1x"></i>
                            <i class="fas fa-plus fa-stack-5x" ></i>
                        </span>
                    </a>
                </div>
              </div>

            </div>
            <div class="card-footer">
                <input class="btn btn-block font-weight-bold text-primary" type="submit" value="Finalizar Compra">
               
            </div>


          </form>  
        </div>
        <!-- /.content -->
    </div>
    <!-- /#right-panel -->
<?php 
 require(TEMPLATES.'scripts.php');
?>
<script>

      // este script es solo para procesar compra, no es necesario hacerlo global
  function procesando_compra() 
  { 
    $.ajax({
    "method":"POST",
    dataType:"json",
    url: "controller/get_carrito.php",
    success : function(data) 
    {

        if (data == null) {
            console.log('carrito vacio');
            $("#card_carrito").html("<div class='alert alert-warning text-center'><p class='text-dark'><strong>El carrito de compra esta vació!</strong></p></div><a class='alert-link text-warning text-center m-3' href='libros'><i class='fa fa-arrow-circle-left'></i> Ver libros</a>");
            // aqui tendria que ir una funcion global que actualice la lista del carrito de compra
                 $("#cantidad").html("0");

        }else {
                 $("#cantidad").html(Object.keys(data).length); //Contamos la cantidad de objetos en el json para el icono de los elementos en el carrito
         var listado="";// Definimos para que no de error
         var moneda=" BsS.";
         var total= new Number(); // tenemos que definir que es un numero por que si no, funciona como una cadena de texto
         for (var item in data)// Con el siclo for recorremos todo el objeto
       {
          // Concatenamos los objetos existentes para imprimir la lista de los productos
         listado += "<div id="+ data[item].item_id+" class='form-row'><div class='col-4'><p class='text-dark'>"+data[item].item_name+"</p></div><div class='col-4'><p class=' text-dark'>"+data[item].item_price+moneda+"</p></div><div class='col-4 mb-3'><p class='text-dark'>"+data[item].item_loot+"<button  onclick=eliminar_item(this); data-id="+ data[item].item_id+" href='#' class='close mr-5'><span>&times;</span></button></p></div></div>";
         total+=data[item].item_price*data[item].item_loot;
        }
        // Listamos los articulos en el carrito de compra
        $("#carrito").html(listado);
        iva=(total*12)/100;
        total_neto= (iva+total);
        $("#iva").html("Iva: "+iva+moneda);
        $("#total").html("Total: "+total+moneda);
         $("#total_neto").html("Total Neto:"+total_neto+moneda);
        }
        
    }       
            });
  };
  procesando_compra();
  function eliminar_item(elem) 
  {
    console.log('eliminando');
    // con data.('id') es que capturamos un valor dato a un elemento en este caso estoy usando data-id="3" para almacenar el id del elemento que se vera afectado al hacer click.
    data_id = $(elem).data('id');
    // Este puto fade me tomo 2 horas y era con un puto +...
    $('#'+data_id).fadeToggle('slow' );
   console.log(data_id);
   // Aqui va el codigo que capturara el id y lo eliminara del $_SESSION['carrito']por su id haciendo unset... puede ser con ajax
   var id = 'id='+ data_id;
   $.ajax({
    type: "POST",
            url: "controller/eliminar_elemento_carrito.php",
            data: id,
            success: function(data){
                // Actualizamos la lista en el card-body
                procesando_compra();
                actualizar_carrito();
            }

   });
  }

  // aqui va el codigo que serializa el formulario y lo manda por ajax a php..

</script>
</body>
</html>