 <?php 
   // CARGANDO LAS CONSTANTES DE RUTAS
    require('../config.path.php');
    require(TOOLS.'db_connector.php');
    require(TOOLS.'delete.php');
    

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			$id=$_POST['id'];
			$tabla="categoria_libro";
			$columna='id_categoria';
		    $categoria = delete::eliminar($id,$tabla,$columna);
		    echo $categoria;
			

}

?>