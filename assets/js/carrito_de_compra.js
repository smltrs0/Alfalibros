  function actualizar_carrito() 
  { 
    $.ajax({
    "method":"POST",
    dataType:"json",
    url: "controller/get_carrito.php",
    success : function(data) 
    {
      if (data==null) {
        // El carrito de compra esta vacio
            console.log('carrito de compra vacio');

          }else {
            $("#cantidad").html(Object.keys(data).length); //Contamos la cantidad de objetos en el json para el icono de los elementos en el carrito
             console.log(data);//objeto testeando :v
             var listado="";// Definimos para que no de error
             var total= new Number();
             for (var item in data)// Con el siclo for recorremos todo el objeto

       {
          console.log(data[item].item_name);
          // Concatenamos los objetos existentes para imprimir la lista de los productos
         listado += "<li class='list-group-item'>"+data[item].item_name+" <span class='badge badge-primary badge-pill'>"+data[item].item_loot+"</span><button  onclick='eliminar_del_carrito(this)' data-id="+ data[item].item_id+" href='#' class='close'><span>&times;</span></button></li></li>";
          total+=data[item].item_price*data[item].item_loot;
        }
        iva=(total*12)/100;
        total_neto= (iva+total);
        console.log(total_neto);
        $("#total_carrito").html("Total Neto:"+total_neto+" BsS");
        $("#lista-carrito").html(listado);
        
          }

    }       
            });
  }

  // intentando tomar el id a ver si funciona asi..
 function eliminar_del_carrito(elem){
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
            success: function(data)
            {
                // Actualizamos la lista en el card-body
                actualizar_carrito();
                actualizar_orden_de_compra();
            }
   });
}

$(document).ready(function(){ 
  // Funcion para actualizar el carrito siempre que sufra cambios
   actualizar_carrito();

// Boton agregar al carrito
$(".form-item").submit(function(e)
{
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
          button_content.html('Actualizar <i class="fas fa-sync fa-spin"></i>');
          button_content.removeClass('btn-outline-primary');
          button_content.addClass('btn-primary');

          if (data=='actualizado') 
          {
            console.log('producto actualizado');
          }
        },
              error: function (error)
              {
                  // eval nos regresa una cadena de texto
                  alert('error; ' + eval(error));
              }
      })
      e.preventDefault(); // Permite que se pueda presionar nuevamente el boton
});


//Boton limpiar carrito
$("#limpiar_carrito").click(function ()
{
  var vaciado= confirm("¿Esta seguro que desea vaciar el carrito?");
  console.log(vaciado);
  if (vaciado == true) 
  {
    $.get("controller/vaciar_carrito.php", function(data)
    {

      
      if (data=="Carrito vacio")
        {
          alert('Carrito vaciado con exito');
          location.reload();
          // Tampoco se actualiza el carrito al llamar a la funcion por lo que fuy por lo facil y actualizo la pagina.
        }
        else
        {
          // no existen elementos en el carrito de compra
        }
    });
  }else {

  }

  
    

});


   

      
});
