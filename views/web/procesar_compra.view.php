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
            <div class="card-body">
            <ul>
                 <div id="carrito"></div>
            </ul>
            </div>
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
         listado += "<li class='list-group-item'>"+data[item].item_name+" <span class='badge badge-primary badge-pill'>"+data[item].item_loot+"</span><button  onclick=eliminar(this); data-id="+ data[item].item_id+" href='#' class='close'><span>&times;</span></button></li></li>";
        }
        $("#carrito").html(listado);
        
    }       
            });
  }
  actualizar_carrito();
  function eliminar() {
console.log('eliminando');
// En teoria es asi...
var data = $(this).attr("data-id");
console.log(data);
  }

</script>
</body>
</html>