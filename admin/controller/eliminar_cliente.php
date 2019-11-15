<?php 
    // CARGANDO LAS CONSTANTES DE RUTAS
    require('../config.path.php');
    // CARGANDO LAS HERRAMIENTAS SOLO UNA VEZ PARA NO GENERAR CONFLICTOS DE CLASES DUPLICADAS O DE RUTAS
    require(TOOLS.'db_connector.php');
    require(TOOLS.'delete.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			$id=$_POST['id'];
		    $cliente = delete::cliente($id);
			   if ($cliente==TRUE) 
				   {
				   	echo "Eliminado correctamente";
				   }else{
				   	echo "No se pudo eliminar, al parecer hay datos vinculados con este cliente.";
				   }


}
	
	
 ?>