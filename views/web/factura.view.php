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
                    <p id="miparrafo"></p>
                    <input hidden type="number" id="id" name="id" value="<?php echo  $_GET['id'];?>">


<script>
   
    var id = $("#id").val();

$.get("controller/get_factura.php", { id: id}, function(respuesta){
   $("#miparrafo").html(respuesta);
}) 

$(document).ready(function() { 
   
function render_pdf() {
        var pdf = new jsPDF('a4');

    pdf.setFont("helvetica");
    pdf.text("ALFALIBROS.CA", 4, 10);
    pdf.setFontSize(9);
    pdf.text("RIF: ", 4, 15);
    pdf.text("Ubicacion", 4, 20);
    pdf.text("Fecha", 4, 25);
    pdf.lines([[2,2],[-2,2],[1,1,2,2,3,3],[2,1]], 212,110, 10); // line, line, bezier curve, line
    $( '#docpdf' ).attr('src', pdf.output('datauristring'));
}
render_pdf();

});
</script>

<iframe id="docpdf" style="background-color:#EEE; height: 400px; border: 0px;">
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
