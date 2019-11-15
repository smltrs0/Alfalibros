<?php 
  require (TEMPLATES.'head.php');
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
            <div class="form-row">
                <div class="form-group col-md-6">
                  <label >Fecha de inicio</label>
                  <input type="date" class="form-control">
                </div>
                <div class="form-group col-md-6">
                  <label >Fecha final</label>
                  <input type="date" class="form-control" >
                </div>
                <button class="btn btn-block royal_garden text-white"> Generar reporte en PDF <i class="fa fa-print"></i></button>
            </div>
       </div>
    </div>

  </div>
  <div class="tab-pane fade" id="libros" role="tabpanel" aria-labelledby="libros-tab">
    <div class="card shadow">
        <div class="card-body">
            <p class="text-center">Se genrara un reporte con todos los libros que estan registrados jusnto con su cantidad actual.</p>
            <button onclick="DownloadSchedulePDF()" class="btn btn-block perfect_white"> Generar reporte en PDF <i class="fa fa-print"></i></button>
        </div>
    </div>
  </div>
</div>
            
        </div>

        <!-- /.content -->
    </div>
    <!-- /#right-panel -->
    <script type="text/javascript">
DownloadSchedulePDF = function () {
    var doc = new jsPDF('p', 'pt');
    doc.setFontSize(12);
    doc.setTextColor(0);
    doc.setFontStyle('bold');
    doc.text('Col and row span', 40, 50);
    debugger;
    var data = getData(40);
    data.sort(function (a, b) {
        return parseFloat(b.expenses) - parseFloat(a.expenses);
    });
    doc.autoTable(getColumns(), data, {
        theme: 'grid',
        startY: 60,
        drawRow: function (row, data) {
            // Colspan
            doc.setFontStyle('bold');
            doc.setFontSize(10);
            if (row.index === 0) {
                doc.setTextColor(200, 0, 0);
                doc.rect(data.settings.margin.left, row.y, data.table.width, 20, 'S');
                doc.autoTableText("Priority Group", data.settings.margin.left + data.table.width / 2, row.y + row.height / 2, {
                    halign: 'center',
                    valign: 'middle'
                });
                data.cursor.y += 20;
            }
          //adding page
            if (row.index % 5 === 0) {
                var posY = row.y + row.height * 6 + data.settings.margin.bottom;
                if (posY > doc.internal.pageSize.height) {
                    data.addPage();
                }
            }
        },
        drawCell: function (cell, data) {
            // Rowspan
            if (data.column.dataKey === 'id') {
                if (data.row.index % 5 === 0) {
                    doc.rect(cell.x, cell.y, data.table.width, cell.height * 5, 'S');
                    doc.autoTableText(data.row.index / 5 + 1 + '', cell.x + cell.width / 2, cell.y + cell.height * 5 / 2, {
                        halign: 'center',
                        valign: 'middle'
                    });
                }
                return false;
            }
        }
    });
     doc.save('demo.pdf');
};

function getData(rowCount) {
    rowCount = rowCount || 4;
    var data = [];
    for (var j = 1; j <= rowCount; j++) {
        data.push({
            id: j,
            tatics: "Tatics",
            vopa: "Vopa",
            specialists: "Specialists",
            hospital: "Hospital",
            retailpharm: "Retailpharm",
            expenses: "Expenses",
            practioner: "Practioner"
        });
    }
    return data;
}


// Returns a new array each time to avoid pointer issues
var getColumns = function () {
    return [
        {title: "Strategic Activities", dataKey: "id"},
        {title: "Tatics", dataKey: "tatics"},
        {title: "Value of performing activity to Pfizer", dataKey: "vopa"},
        {title: "Specialists General", dataKey: "specialists"},
        {title: "Public Hosp. Dec. Makers", dataKey: "hospital"},
        {title: "Retail Pharm. Independent", dataKey: "retailpharm"},
        {title: "Retail Pharm. chains", dataKey: "expenses"}
    ];
};

    </script>
<?php 
require (TEMPLATES.'scripts.php');
 ?>

</body>
</html>