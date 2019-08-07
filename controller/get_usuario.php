<?php

$id= $_POST["user_id"];

if (!empty($id)) 
{
 include_once '../classes/Usuarios_model.php';
 $usuario = new Usuarios();
 $usuario = $usuario->get_usuario($id);
 foreach($usuario as $row)
	{
		$output["username"] = 	$row["username"];
		$output["nombre"]   = 	$row["nombre"];
		$output["apellido"] = 	$row["apellido"];
		$output["cedula"] 	= 	$row["cedula"];
		$output["email"] 	= 	$row["email"];
		$output["clave"] 	= 	$row["clave"];
		$output["cargo"] 	= 	$row["usuario_tipo"];
		$output["pregunta"] = 	$row["pregunta"];
		$output["respuesta"] =  $row["respuesta"];
		// Si no existe imagen ... 
			if($row["image"] != '')
				{
				$output['user_image'] = '
				<img src="uploaded_files/users/'.$row["image"].'" class="img-thumbnail" width="80" height="80" />
						<input type="hidden" name="hidden_user_image" value="'.$row["image"].'" />';
					}
					else
					{
						$output['user_image'] = '<input type="hidden" name="hidden_user_image" value="" />';
					}
	}
				
 				echo json_encode($output);
}else{
	echo "id no definido";
}

 
 
?>