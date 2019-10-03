<?php     
require(TEMPLATES.'head.php');
require(TEMPLATES.'scripts.php');
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
            <div class=" animated bounceInDown">
            <form>
              <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Buscar libro">
                  <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="button">Buscar</button>
                </div>
              </div>  
            </form>
            </div>
            <div class="container">
    <div class="card-deck">
        <?php if ($libros): ?>
            <?php foreach ($libros as $key): ?>
              <div class="card mb-2">
                <form class="form-item">
                  <a href="detalle_libro?id=<?php echo $key['id_info_libro']?>">
                    <!--Aqui tendira que ir ?id=id para procesarlo por get-->
                      <?php if(!is_null($key['ruta_imagen'])): ?>
                          <!-- class height-27 mantiene las imagenes siempre en 275 px -->
                          <img class="card-img-top img-fluid height-275" src="<?php echo $key['ruta_imagen']; ?>" alt="Card image cap"> 
                      <?php else: ?>
                           <img class="card-img-top img-fluid height-275" src="images/no_image.png" alt="Card image cap">
                      <?php endif ?>
                       </a>
                          <div class="card-body">
                                <input name="product_code" type="hidden" value="<?php echo $key['id_info_libro']; ?>">
                              <h4 class="card-title"><?php echo $key['titulo']; ?></h4>
                              <p class="text-dark"><strong>Precio:</strong> <?php echo $key['precio']; ?> BsS</p>
                              <p class="card-text"><small class="text-dark"><?php echo $key['autor'] ?></small></p>

                              <?php if ($key['cantidad'] > 0): ?>

                                  <strong class="text-success">DISPONIBLE</strong>
                                    <input class="form-control" type="number" name="product_cantidad" value="1" min="1">
                                  <button type="submit" class="mt-1 btn-block btn-outline-primary btn-sm">Agregar al carrito</button>

                              <?php else: ?>

                                  <p class="text-danger">NO DISPONIBLE</p>
                                  
                              <?php endif ?>
                          </div>
                </form>
               
              </div>
            <?php endforeach ?>

        <?php else: ?>

           <!--Ve que no es necesario las mayusculas para resaltar algo :P -->
     <div class="col-12">
               <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
                    <strong>No existen libros que mostrar!</strong> 
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                </div>
     </div>

        <?php endif ?>
        

    </div>
</div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /#right-panel -->

<script>
$(document).ready(function(){ 
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
         listado += "<li class='list-group-item'>"+data[item].item_name+" <span class='badge badge-primary badge-pill'>"+data[item].item_loot+"</span><button  id='eliminar' data-id="+ data[item].item_id+"href='#' class='close'><span>&times;</span></button></li></li>";
        }
        $("#lista-carrito").html(listado);
         $("#lista-carrito").html(listado);
    }       
            });
  }
  actualizar_carrito();
    $(".form-item").submit(function(e){
      var form_data = $(this).serialize();
      var button_content = $(this).find('button[type=submit]');
      button_content.html('Agregando...'); //Cambiamos el boton mientras se agrega

      $.ajax({ // Mandamos el id del libro para agregar los datos a la sesion
        url: "controller/carrito_controller.php",
        type: "POST",
        dataType:"json",
        data: form_data,
        success:function(data)
        {
          actualizar_carrito();
           $("#cantidad").html(Object.keys(data).length); //Contamos la cantidad de objetos en el json
          console.log(data);
          alert('Agregado al carrito');
          // Como ya se agrego correctamente cambiamos el texto del boton
          button_content.html('Agregado <i class="fas fa-sync fa-spin"></i>');
          if (data=='actualizado') 
          {
            console.log('producto actualizado');
          }
        },
              error: function (error) {
                  alert('error; ' + eval(error));
              }
        

      })
     
      e.preventDefault(); // Permite que se pueda presionar nuevamente el boton
    });


  //al hacer click en el link remove-item Eliminar un articulo del carrito
  $("#shopping-cart-results").on('click', 'a.remove-item', function(e) {
    e.preventDefault(); 
    var pcode = $(this).attr("data-code"); //tomamos el codigo del producto
    $(this).parent().fadeOut(); // Efecto fade para eliminar el elemento de la lista
    $.getJSON( "carrito_controller.php", {"remove_code":pcode} , function(data){ 
      $("#cart-info").html(data.items); // Actualizamos el contador de itens de cart-info
      $(".cart-box").trigger( "click" ); //trigger click on cart-box to update the items list
    });
  });

});
</script>
</body>
</html>
