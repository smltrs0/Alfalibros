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
                <div class="form-row mt-3">
                    <label  class="col-2 col-form-label">Cliente:</label>
                    <div class="col-9">
                        <select class="select_client form-control" name="cliente">
                        </select>

                </div>
                <div class="col-1">
                    <a href="#" title="Agregar un Nuevo Cliente"  data-toggle="modal" data-target="#add_cliente">
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

              <?php require(VIEWS_MODAL.'agregar_cliente.modal.php'); ?>
        <!-- /.content -->
    </div>
    <!-- /#right-panel -->
<?php 
 require(TEMPLATES.'scripts.php');
?>
<script>

      // este script es solo para procesar compra, no es necesario hacerlo global
  function actualizar_orden_de_compra() 
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
         listado += "<div id="+ data[item].item_id+" class='form-row'><div class='col-4'><p class='text-dark'>"+data[item].item_name+"</p></div><div class='col-4'><p class=' text-dark'>"+data[item].item_price+moneda+"</p></div><div class='col-4 mb-3'><p class='text-dark'>"+data[item].item_loot+"<button  onclick=eliminar_del_carrito(this); data-id="+ data[item].item_id+" href='#' class='close mr-5'><span>&times;</span></button></p></div></div>";
         total+=data[item].item_price*data[item].item_loot;
        }
        // Listamos los articulos en el carrito de compra
        $("#carrito").html(listado);
        iva=(total*12)/100;
        total_neto= (iva+total);
        $("#iva").html("Iva: "+iva+moneda);
        $("#total").html("Total: "+total+moneda);
         $("#total_neto").html("Total Neto:"+total_neto.toFixed(2)+moneda);
        }
        
    }       
            });
  };

$(document).ready(function() { 
    actualizar_orden_de_compra();
// Select Buscador
 $('.select_client').select2({
        placeholder: 'Selecciona un cliente',
        ajax: {
          url: 'controller/buscador_cliente.php',
          dataType: 'json',
          processResults: function (data) {
            return {
              results: data
            };
          },
          cache: true

        }, placeholder: "Selecciona un cliente",
              minimumInputLength: 2,
              // Esta es parte de la traduccion del script
                      language: {

    noResults: function() {
      return "No hay clientes con estos datos";        
    },
    searching: function() {
      return "Buscando..";
    },
    inputTooShort:function(e){var t=e.minimum-e.input.length,n="Escribe "+t+" car";return t==1?n+="ácter":n+="acteres para buscar",n}
  }
      });

});



     


</script>
</body>
</html>