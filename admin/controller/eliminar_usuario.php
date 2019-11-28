 <?php 
 session_start();
   // CARGANDO LAS CONSTANTES DE RUTAS
    require('../config.path.php');
    require(TOOLS.'db_connector.php');
    require(TOOLS.'delete.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	
			$id=$_POST['user_id'];
			$tabla="usuarios";
			$columna='id';
			if ($id == $_SESSION['id']) {
									echo 'No se puede eliminar este usuario, ya que estas logueado con este!';
									die();
										}

		    $cliente = delete::eliminar($id,$tabla,$columna);
			   if ($cliente==TRUE)
				   {
				   	echo "Eliminado correctamente!";
				   }else{
				   	echo "Error".$cliente;
				   }


}

?>