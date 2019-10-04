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
          
                 <div id="carrito"></div>

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
  function actualizar_carrito() 
  { 
    $.ajax({
    "method":"POST",
    dataType:"json",
    url: "controller/get_carrito.php",
    success : function(data) 
    {
      $("#cantidad").html(Object.keys(data).length); //Contamos la cantidad de objetos en el json para el icono de los elementos en el carrito
         console.log(data);//objeto testeando :v
         var listado="";// Definimos para que no de error
         for (var item in data)// Con el siclo for recorremos todo el objeto
       {
          console.log(data[item].item_name);
          // Concatenamos los objetos existentes para imprimir la lista de los productos
         listado += "<div id="+ data[item].item_id+" class='form-row'><div class='col-md-8 mb-3'><label class='form-control-label'>"+data[item].item_name+"</label></div> <div class='col-md-4 mb-3'><div class='input-group'><div class='input-group-prepend'><span class='input-group-text' id='inputGroupPrepend'>Cantidad</span></div><input class='form-control' type='number' value='"+data[item].item_loot+"'><button  onclick=eliminar(this); data-id="+ data[item].item_id+" href='#' class='close ml-5'><span>&times;</span></button></div></div></div>";
        }
        $("#carrito").html(listado);
        
    }       
            });
  }
  actualizar_carrito();
  function eliminar(elem) {
console.log('eliminando');
    data_id = $(elem).data('id');
    // Este puto fade me tomo 2 horas y era con un puto +...
    $('#'+data_id).fadeToggle('slow' );
   console.log(data_id);
  }

</script>
</body>
</html>