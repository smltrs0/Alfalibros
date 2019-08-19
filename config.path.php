<?php 

	// ESTO ES PARA LA CONFIGURACION SENCILLA DE ESTAS RUTAS SI TU PROYECTO ESTA EN HTDOCS PURO DEJA CADENA DE TEXTO EN BLANCO ASI COMO ESTA ABAJO COMENTADO
	// $carpeta_htdocs = '';
	// SOLO SI TIENES EL PROYECTO DE ESTA MANERA htdocs/*carpetas del proyecto*
	// SI LO TIENES DE ESTA MANERA htdocts/proyecto(o cualquier otro nombre)/*carpetas internas del proyecto*
	// VAS A COLOCAR EL NOMBRE DE LA CARPETA INMEDIATA A HTDOCS EN LA VARIABLE $carpeta_htdocs

	$carpeta_htdocs = 'alfalibros-master';




	if(!empty($carpeta_htdocs))
	{
		$carpeta_htdocs = '/'.$carpeta_htdocs.'/';
	}
	else
	{
		$carpeta_htdocs = '/';
	}

	define('ROOT_PATH',				$_SERVER['DOCUMENT_ROOT'].$carpeta_htdocs);
	define('ASSETS',				ROOT_PATH.'assets/');
	define('CLASSES',				ROOT_PATH.'classes/');
	define('CONFIG',				ROOT_PATH.'config/');
	define('CONTROLLER',			ROOT_PATH.'controller/');
	define('TOOLS',					ROOT_PATH.'tools/');
	define('TEMPLATES',				ROOT_PATH.'templates/');
	define('MODAL',					ROOT_PATH.'modal/');
	define('MODELS',				ROOT_PATH.'models/');
	// lAS RUTAS QUE SE LLAMAN CON SRC NO FUNCIONAN CON LA RUTA RAIZ, lUEGO DE QUE TODO ESTE REALIZADO SE VERA SI ESTAS RUTAS NO VARIAN CONFORME SE NAVEGA EN LOS DIRECTORIOS Y VER SI SE PUEDEN USAR CONSTANTES
	// define('SCRIPTS',			ROOT_PATH.'scripts/');
	// define('GRAPHICS',			SCRIPTS.'js/graphics/');
	define('UPLOADED_FILES',		ROOT_PATH.'uploaded_files/');
	define('VIEWS_WEB',				ROOT_PATH.'views/web/');
	define('VIEWS_MODAL',			ROOT_PATH.'views/modal/');



?>