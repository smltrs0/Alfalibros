$(document).ready(function(){ 

  // Funcion para actualizar el carrito siempre que sufra cambios
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
         var total= new Number();
         for (var item in data)// Con el siclo for recorremos todo el objeto
       {
          console.log(data[item].item_name);
          // Concatenamos los objetos existentes para imprimir la lista de los productos
         listado += "<li class='list-group-item'>"+data[item].item_name+" <span class='badge badge-primary badge-pill'>"+data[item].item_loot+"</span><button  onclick='eliminar()' data-id="+ data[item].item_id+"href='#' class='close'><span>&times;</span></button></li></li>";
          total+=data[item].item_price*data[item].item_loot;
        }
        iva=(total*12)/100;
        total_neto= (iva+total);
        console.log(total_neto);
        $("#total_carrito").html("Total Neto:"+total_neto+" BsS");
        $("#lista-carrito").html(listado);
        
    }       
            });
  }


// intentando tomar el id a ver si funciona asi..
 function eliminar(elem){
    var dataId = $(elem).data("id");
    console.log(dataId);
}



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
          button_content.html('Agregado <i class="fas fa-sync fa-spin"></i>');
          if (data=='actualizado') 
          {
            console.log('producto actualizado');
          }
        },
              error: function (error)
              {
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
      actualizar_carrito();

      
});