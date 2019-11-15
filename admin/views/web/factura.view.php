<?php 
    require(TEMPLATES.'head.php');
?>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>

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
 <div class="row">
            
            </div>

            <!-- Animated test -->
            <div class="row">
                <div class="card col-12 w-100">
                    <p id="my-table"></p>
                    <input hidden type="number" id="id" name="id" value="<?php echo  $_GET['id'];?>">


<script>
        var id = $("#id").val();
var res = $.getJSON("controller/get_factura.php", { id: id}, function(respuesta){
    console.log(respuesta);

   for(i=0;i<respuesta.length;i++)
   {
        var documento = respuesta[i]['documento'];
        var nombre = respuesta[i]['nombre'];
        var apellido = respuesta[i]['apellido'];
        var telefono = respuesta[i]['telefono'];
        var direccion = respuesta[i]['direccion'];
        var iva = respuesta[i]['iva'];
        var libros = respuesta[i]['libros'];

        Object.entries(libros).forEach(([titulo, val]) => {
  console.log(val); // the value of the current key.
});
    }

});

    console.log(res);

function render_pdf_eframe() {

     var pdf = new jsPDF('a4');

    pdf.setFont("helvetica");
    pdf.text("ALFALIBROS.CA", 4, 10);
    pdf.setFontSize(9);
    pdf.text("RIF: ", 4, 15);
    pdf.text("Ubicacion", 4, 20);
    pdf.text("Fecha", 4, 25);
     pdf.text("Cliente", 4, 30);


    $( '#docpdf' ).attr('src', pdf.output('datauristring'));
   
/*
for (var data in series) {
    //console.log(series[data]);

    for(var nombre in series[data]){
        console.log(nombre.series[data]);
    }
}*/

/*
for(let i  = 0; i< series.length; i++){

    for(let j  = 0; j< series[i].name.length; j++){

       console.log(series[i].name[j]);
       pdf.text(4, 50 + (i * 10), i + ""+series[i].name[j]);

    }   
}  

*/

  




}

$(document).ready(function() { 



render_pdf_eframe();

});
</script>

<iframe id="docpdf" style="background-color:#EEE; height: 800px; border: 0px;">
</iframe>
             </div>
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /#right-panel -->
<?php 
require(TEMPLATES.'scripts.php');
 ?>

</body>
</html>
