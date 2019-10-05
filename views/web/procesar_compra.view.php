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
        <div class="card animated bounceInDown">
           
            <div class="card-header">
                Finalizar orden de compra
            </div> 
            <form action="#" class="form-inline" >
            <div class="card-body">
                <div class="form-row mb-3">
                    <!--colocar o no colocar la foto...-->
                    <div class="col-4"><p class="font-weight-bold text-dark">Nombre del libro</p></div>
                     <div class="col-4"><p class="font-weight-bold text-dark">Precio</p></div>
                    <div class="col-4"><p class="font-weight-bold text-dark">Cantidad</p></div>
                </div>
          
                 <div id="carrito"></div>
                  <div class="row justify-content-end">
                    <div class="col-4">
                      <p class="text-dark" id="total">Total: </p> 
                    </div>
                </div>
                 <div class="row justify-content-end">
                    <div class="col-4">
                      <p class="text-dark" id="iva"> Iva: </p>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-4">
                      <p class="text-dark" id="total_neto">Total Neto: </p> 
                    </div>
                </div>
                
            <ul>
               
            </ul>
            </div>
            <div class="card-footer">
                <input class="btn btn-block" type="submit" value="Finalizar Compra">
               
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
      $("#cantidad").html(Object.keys(data).length); //Contamos la cantidad de objetos en el json para el icono de los elementos en el carrito
         var listado="";// Definimos para que no de error
         var moneda=" BsS.";
         var total= new Number(); // tenemos que definir que es un numero por que si no, funciona como una cadena de texto
         for (var item in data)// Con el siclo for recorremos todo el objeto
       {
          // Concatenamos los objetos existentes para imprimir la lista de los productos
         listado += "<div id="+ data[item].item_id+" class='form-row'><div class='col-4'><p class='text-dark'>"+data[item].item_name+"</p></div><div class='col-4'><p class=' text-dark'>"+data[item].item_price+moneda+"</p></div><div class='col-4 mb-3'><div class='input-group'><input class='form-control' type='number' value='"+data[item].item_loot+"'><button  onclick=eliminar(this); data-id="+ data[item].item_id+" href='#' class='close ml-5'><span>&times;</span></button></div></div></div>";
         total+=data[item].item_price*data[item].item_loot;
        }
        iva=(total*12)/100;
        total_neto= (iva+total);
        $("#iva").append(iva+moneda);
        $("#total").append(total+moneda);
        $("#carrito").html(listado);
         $("#total_neto").append(total_neto+moneda);
        
    }       
            });
  }
  procesando_compra();
  function eliminar(elem) 
  {
    console.log('eliminando');
    // con data.('id') es que capturamos un valor dato a un elemento en este caso estoy usando data-id="3" para almacenar el id del elemento que se vera afectado al hacer click.
    data_id = $(elem).data('id');
    // Este puto fade me tomo 2 horas y era con un puto +...
    $('#'+data_id).fadeToggle('slow' );
   console.log(data_id);
   // Aqui va el codigo que capturara el id y lo eliminara del $_SESSION['carrito']por su id haciendo unset... puede ser con ajax
  }

  // aqui va el codigo que serializa el formulario y lo manda por ajax a php..

</script>
</body>
</html>