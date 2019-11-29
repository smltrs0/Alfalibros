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
    <a class="nav-link active" id="ventas-tab" data-toggle="tab" href="#ventas" role="tab" aria-controls="home" aria-selected="true">Respaldo de la base de datos</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="libros-tab" data-toggle="tab" href="#libros" role="tab" aria-controls="profile" aria-selected="false">Restauracion de la base de datos</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="ventas" role="tabpanel" aria-labelledby="ventas-tab">
    <div class="card shadow">
       <div class="card-body ">
          
          <div class="form-group">
            <form action="controller/backup.php" id="backup">
              <input type="submit" class="btn btn-outline-success btn-block" value="Generar respaldo de la base de datos">
            </form>
          </div>
              
              <?php 
              function listar_archivos($carpeta){
    if(is_dir($carpeta)){
        if($dir = opendir($carpeta)){
            echo "<ul class='list-group'>";
            while(($archivo = readdir($dir)) !== false){
                if($archivo != '.' && $archivo != '..' && $archivo != '.htaccess'){
                    echo "<li class='list-group-item'><a target='_blank' href='$carpeta/$archivo'download><i class='fa fa-download'></i> $archivo </a> <a class='btn btn-sm float-right btn-danger btn-xs' href='controller/borrar_archivo.php?archivo=$archivo&dir=$carpeta'><i class='fa fa-trash-alt'></i></a> </li>";
                }
            }
            echo "</ul>";
            closedir($dir);
            
        }
    }
}
echo listar_archivos('controller/BackupLogs');
               ?>
       </div>
    </div>
    <div class="container">
      <div class="container" id="log_backup">
      </div>
    </div>
  </div>
  <div class="tab-pane fade" id="libros" role="tabpanel" aria-labelledby="libros-tab">
    <div class="card shadow">
        <div class="card-body">
           <form> 
            <div class="form-group text-center">
              <label>El fichero soportado es solo .SQL</label>
               <input type="file" class="form-control-file btn btn-outline-warning" name="">
            </div>
            <div class="form-group"> 
               <input class="btn btn-success btn-block" type="submit" name="" value="Restaurar Base de datos">
            </div>
            
           </form>
        </div>
    </div>
  </div>
</div>
            


        </div>
        <!-- /.content -->
    </div>
    <!-- /#right-panel -->
  
  <script type="text/javascript">
    $(document).on('submit', '#backup', function(event)
    {
      event.preventDefault();
      $.ajax({
        url:"controller/backup.php",
        method:'POST',
        data:new FormData(this),
        contentType:false,
        processData:false,
      })
      .done(function(data) {
        $('#log_backup').html(data);
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
      
    });

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