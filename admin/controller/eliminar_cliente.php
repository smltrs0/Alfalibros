<?php 
    // CARGANDO LAS CONSTANTES DE RUTAS
    require('../config.path.php');
    require(TOOLS.'db_connector.php');
    require(TOOLS.'delete.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			$id=$_POST['id'];
			$tabla="cliente";
		    $cliente = delete::eliminar($id,$tabla);
			   if ($cliente==TRUE) 
				   {
				   	echo "Eliminado correctamente";
				   }elseif($cliente==FALSE){
				   	echo "No se pudo eliminar, puede que existan datos vinculados con este cliente o que este cliente no exista.";
				   }else{
				   	echo "Error".$cliente;
				   }


}
	
	
 ?>