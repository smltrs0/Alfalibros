<?php 
  require (TEMPLATES.'head.php');
    if ($cargo=='1') {
?>
<body>
  <?php
    require (TEMPLATES.'menu.php');
   ?>

    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <?php 
        require (TEMPLATES.'header.php');
         ?>
        <!-- Content -->
        <div class="content">
<?php 
require (TEMPLATES.'breadcrumb.php');
 ?>
          
<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="ventas-tab" data-toggle="tab" href="#ventas" role="tab" aria-controls="home" aria-selected="true">Reporte de ventas</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="libros-tab" data-toggle="tab" href="#libros" role="tab" aria-controls="profile" aria-selected="false">Reporte de libros</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="ventas" role="tabpanel" aria-labelledby="ventas-tab">
    <div class="card shadow">
       <div class="card-body ">
            <form id="reporte_fecha">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label >Fecha inicio</label>
                  <input type="date" class="form-control" name="fecha_inicio" id="fecha_inicio" required>
                </div>
                <div class="form-group col-md-6">
                  <label >Fecha final</label>
                  <input type="date" class="form-control" name="fecha_final" id="fecha_final" required>
                </div>
                <button type="submit" class="btn btn-block royal_garden text-white"> Generar reporte <i class="fa fa-chart-area"></i></button>
            </div>
            <hr class="mb-5">
            <div id="imprimir">
            </div>
            <canvas id="speedChart">
            </canvas>
            </form>
       </div>
    </div>

  </div>
  <div class="tab-pane fade" id="libros" role="tabpanel" aria-labelledby="libros-tab">
    <div class="card shadow">
        <div class="card-body">
            <p class="text-center">Se generara un reporte con todos los libros que estan registrados jusnto con su cantidad actual.</p>
            <button id="DownloadBooks" class="btn btn-block perfect_white"> Generar reporte en PDF <i class="fa fa-print"></i></button>
        </div>
    </div>
  </div>
</div>
            


        </div>
        <!-- /.content -->
    </div>
    <!-- /#right-panel -->
    <script type="text/javascript">


$(document).on('submit', '#reporte_fecha', function(event)
  {
    event.preventDefault();
    var fecha_inicio= $('#fecha_inicio').val();
    var fecha_final = $('#fecha_final').val();

// Aun falta la validación de la fecha fe inicio no sea mayor a la fecha actual
    if(fecha_final== '' || fecha_final == ''){
      alert('No puedes dejar campos vacios');
    }else if(fecha_final==fecha_inicio){
        alert('Por favor selecciona un rango mas amplio')
    }
    else{
    $.ajax({
      url: 'controller/get_ventas_fecha.php',
     method:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
    })
    .done(function(data) {
      if (data=='undefined' || data== null || data == '') {
        alert('En el rango seleccionado no hay datos para mostrar');
      }else{
        // si hay datos en la gráfica por lo que procedo a hacer la gráfica
        var speedCanvas = document.getElementById("speedChart");
        Chart.defaults.global.defaultFontFamily = "Lato";
        Chart.defaults.global.defaultFontSize = 18;
        var speedData = {
          // Ahora solo falta cargar los datos del resultado del ajax
          labels: ["0s", "10s", "20s", "30s", "40s", "50s", "60s"],
          datasets: [{
            label: "Venta de libros",
            data: [0, 59, 75, 20, 20, 55, 40],
          }]
        };
        $("#imprimir").html('<button class="btn btn-outline-secondary btn-sm" title="Imprimir reporte con la fecha y rango seleccionado">Imprimir</button>');
        var chartOptions = {
          legend: {
            display: true,
            position: 'top',
            labels: {
              boxWidth: 80,
              fontColor: 'black'
            }
          }
        };

        var lineChart = new Chart(speedCanvas, {
          type: 'line',
          data: speedData,
          options: chartOptions
        });
              }


    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
    

    }
  });
var button = document.getElementById("DownloadBooks");
var tableData = {
  columns: [
    { title: "Titulo", dataKey: "titulo" },
    { title: "Autor", dataKey: "autor" },
    { title: "Cantidad", dataKey: "cantidad" },
    { title: "Categoría", dataKey: "categoria" },
    { title: "Fecha de lanzamiento", dataKey: "fecha_lanzamiento" },
    { title: "Precio", dataKey: "precio" }
  ],
  rows:<?php include 'controller/get_all_libros.php'; ?>
};

function createTableinPDF(tableData) {
  var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
var f=new Date();
var fecha= (f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
  var logo = new Image();
logo.src = 'images/logo.png';
  var doc = new jsPDF("l", "pt");
  if (logo) {
            doc.addImage(logo, 'JPEG', 760, 10, 40, 40);
          }
  doc.setFontSize(14);
  doc.setTextColor(0);
  doc.setFontStyle("bold");
  doc.text("Alfalibros C.A", 40, 23);
  doc.setFontStyle("normal");
  doc.setFontSize(7);
  doc.text("Reporte generado el: "+fecha, 600,40);
  doc.text("Reporte de todos los libros en stock", 40, 40);
  doc.setFontSize(12);
  doc.autoTable(tableData.columns, tableData.rows, {
    theme: "grid",
    startY: 50,
    styles: { overflow: "linebreak", columnWidth: "wrap" },
    drawRow: function(row, data) {
      // Colspan

      doc.setFontStyle("bold");
      doc.setFontSize(10);
      //adding page
      var previousEndpointName =
        row.index === 0
          ? ""
          : data.table.rows[data.row.index - 1].raw.endPointName;
      var currentendPOintName =
        data.table.rows[data.row.index].raw.endPointName;
      console.log(currentendPOintName);
      var nextendPointName =
        data.table.rows.length - 1 === row.index
          ? ""
          : data.table.rows[data.row.index + 1].raw.endPointName;
      var countofItems = data.table.rows.filter(
        x => x.raw.endPointName === currentendPOintName
      ).length;
      var allCellsHeight = data.table.rows
        .filter(function(x) {
          return x.raw.endPointName === currentendPOintName;
        })
        .map(rowdata => rowdata.height)
        .reduce((a, x) => a + x);
      var posY = row.y + allCellsHeight + data.settings.margin.bottom;
      var pageHeight =
        doc.internal.pageSize.height || doc.internal.pageSize.getHeight();

      if (
        row.index === 0 ||
        row.index === 8 ||
        row.index === 17 ||
        row.index === 23
      ) {
        var posY = row.y + allCellsHeight + data.settings.margin.bottom;
        var pageHeight =
          doc.internal.pageSize.height || doc.internal.pageSize.getHeight();
        if (posY > pageHeight) {
          data.addPage();
          row.y = 0;
        }
        doc.setTextColor(200, 0, 0);
        doc.rect(
          data.settings.margin.left,
          row.y,
          data.table.width + 27.5,
          15,
          "S"
        );
        doc.autoTableText(
          currentendPOintName,
          data.settings.margin.left + data.table.width / 2,
          row.y + 15 / 2,
          {
            halign: "center",
            valign: "middle"
          }
        );
        data.cursor.y += 15;
      }
    },
    columnStyles: {
      cantidad: { columnWidth: 80 },
      criteriaInc: { columnWidth: 355 },
      criteriaExc: { columnWidth: 355 }
    }
  });
  doc.save("Reporte todos los libros.pdf");
}

button.addEventListener("click", function(e){
  createTableinPDF(tableData)
});
///

    </script>
<?php 
require (TEMPLATES.'scripts.php');
}else{
  echo '<script>
    alert("No tienes permiso para entrar a esta zona");
    history.back(1);
  </script>';
}
 ?>

</body>
</html>