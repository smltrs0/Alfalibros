<?php 

	class cleaning
	{
		private function __construct(){}

		static public function input($input)
		{
			$input = trim($input);		// "Trim" Limpia los espacios al inicio y final de los caracteres
			$input = filter_var($input, FILTER_SANITIZE_STRING); // LA FUNCION FILTER_VAR CON EL METODO FILTER_SANITIZE_STRING ELIMINA TODO TIPO DE ETIQUETAS HTML
			return $input;
		}
	}

?>