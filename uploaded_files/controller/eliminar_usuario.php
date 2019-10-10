<?php
$id = $_POST['user_id'];

if (isset($id)) {
	include_once '../classes/Usuarios_model.php';
	$usuario = new Usuarios();
	$usuario->eliminar_usuario($id);
}else{
	echo "Usuario no definido";
}



?>