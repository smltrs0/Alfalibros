 <?php 
   // CARGANDO LAS CONSTANTES DE RUTAS
    require('../config.path.php');
    require(TOOLS.'db_connector.php');
    require(TOOLS.'delete.php');
    

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
			$id=$_POST['id'];
			$tabla="autor";
			$columna='id_autor';
		    $cliente = delete::eliminar($id,$tabla,$columna);
		    echo $cliente;
			   // if ($cliente==TRUE) 
				  //  {
				  //  	echo "Eliminado correctamente";
				  //  }elseif($cliente==FALSE){
				  //  	echo "No se pudo eliminar,  puede que no exista.";
				  //  }else{
				  //  	echo "Error".$cliente;
				  //  }


}

?>