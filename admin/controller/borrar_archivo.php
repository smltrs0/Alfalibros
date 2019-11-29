<?php
$archivo = $_GET['archivo'];
$resultado =__DIR__ .'/BackupLogs/'.$archivo;
if(file_exists($resultado))
{
if(unlink($resultado))

	
	 echo "<script>alert('Respaldo eliminado exitosamente.');</script>";
	echo ("<script>location.href='../backup.php'</script>");
}
else
print "<h2>¡Ups! Ocurrió un error al intentar eliminar el fichero:'$resultado', puede que no exista o que no tenga permiso para eliminarlo.</h2>";

?>