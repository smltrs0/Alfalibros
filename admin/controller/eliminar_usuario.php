 <?php 
   // CARGANDO LAS CONSTANTES DE RUTAS
    require('../config.path.php');
    require(TOOLS.'db_connector.php');
    require(TOOLS.'delete.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			$id=$_POST['user_id'];
			$tabla="usuarios";
		    $cliente = delete::eliminar($id,$tabla);
			   if ($cliente==TRUE) 
				   {
				   	echo "Eliminado correctamente";
				   }elseif($cliente==FALSE){
				   	echo "No se pudo eliminar,  que no exista.";
				   }else{
				   	echo "Error".$cliente;
				   }


}

?>