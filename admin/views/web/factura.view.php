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
 <div class="row">
            
            </div>

            <!-- Animated test -->
            <div class="row">
                <div class="card col-12 w-100">
                    <p id="my-table"></p>

<script>

  function getParameterByName(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

var id = getParameterByName('id');
  //var id = <?php echo  $_GET['id'];?>;

 
var RES = $.getJSON("controller/get_factura.php", { id: id}, function(respuesta){
 if (id=='' || respuesta == '') {
    alert('No hay ninguna factura seleccionada o no existe');
    location.href="ventas";
  }

var pdf = new jsPDF('a3');
var hoy = new Date();
var fecha = hoy.getDate() + '-' + ( hoy.getMonth() + 1 ) + '-' + hoy.getFullYear();
var hora = hoy.getHours() + ':' + hoy.getMinutes() + ':' + hoy.getSeconds();
var logo = new Image();
logo.src = 'images/logo.png';

    console.log(respuesta);
   for(i=0;i<respuesta.length;i++)
   {
        var documento = respuesta[i]['documento'];
        var nombre = respuesta[i]['nombre'];
        var fecha_facturacion = respuesta[i]['fecha_facturacion'];
        var apellido = respuesta[i]['apellido'];
        var telefono = respuesta[i]['telefono'];
        var direccion = respuesta[i]['direccion'];
        var iva = respuesta[i]['iva'];
  
    }

    if (logo) {
            pdf.addImage(logo, 'JPEG', 160, 10, 35, 35);
          }
    pdf.setFontStyle('bold');
    pdf.setFont("helvetica");
    pdf.text("ALFALIBROS.CA", 20, 25);
    pdf.setFontStyle('normal');
    pdf.setFontSize(6);
    pdf.text("RIF: ", 20, 28);
    pdf.setFontSize(12);
    pdf.setFontStyle('bold');
    pdf.text("Datos del cliente: ", 20, 35);
    pdf.setFontStyle('normal');
    pdf.text("Direccion: "+direccion, 20, 40);
    pdf.text("Fecha de la compra: "+fecha_facturacion, 20, 45);
    pdf.text("Nombre: "+nombre+" "+apellido+" C.I: "+documento, 20, 50);
    pdf.text("Factura generada por: <?php echo  $_SESSION['nombre'].' '.$_SESSION['apellido'];?>", 20, 55);
     pdf.setFontStyle('bold');
    pdf.text("Listado de productos", 80, 65);
    pdf.text("Nombre", 20, 70);
    pdf.text("Cantidad", 140, 70);
    pdf.text("Precio", 174, 70);
    pdf.setFontStyle('normal');
    var i=0;
    var total_factura = new Number();
       for ( var item in respuesta)// Con el siclo for recorremos todo el objeto
       {
        i++;
           pdf.text(20, 70 + (i * 5), i +': '+ respuesta[item].titulo);
           pdf.text(145, 70 + (i * 5), respuesta[item].cantidad);
           pdf.text(180, 70 + (i * 5), respuesta[item].precio);
           total_factura+= respuesta[item].cantidad*respuesta[item].precio;
        }
        iva=(total_factura*12)/100;
        total_neto= (iva+total_factura);
pdf.setLineDash([3, 3], 0);
i++;
pdf.line(20, 70+(i * 5), 190, 70+(i * 5));
i++;
pdf.text(150, 70 + (i * 5), 'Total:              '+ total_factura);
i++;
pdf.text(150, 70 + (i * 5), 'IVA:                '+ iva);
i++;
pdf.text(150, 70 + (i * 5), 'Total Neto:    '+total_neto.toFixed(2));

 pdf.setFontSize(7);
pdf.text("Tienda Alfalibros C.A: Paseo Heres cruce con calle Delepiani, Ciudad Bolívar, Estado Bolívar, Venezuela.", 50, 290);

// Creamos una nueva pagina si es superior, aun hay que trabajar en este script
if (70 + (i * 5)>280) {
  pdf.addPage();
}
    $( '#docpdf' ).attr('src', pdf.output('datauristring'));
});

console.log(RES);

$(document).ready(function() { 



//render_pdf_eframe();

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
