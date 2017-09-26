<?php

// de http://pixelar.me/funcion-util-limpiar-url/
function limpiarURL($str) {
	//Quitar tildes y ñ
	$tildes = array('á','é','í','ó','ú','ñ','Á','É','Í','Ó','Ú','Ñ','à','è','ò','Ç');
	$vocales = array('a','e','i','o','u','n','A','E','I','O','U','N','a','e','o','c');
	$str = str_replace($tildes,$vocales,$str);

	//Quitar símbolos
	$simbolos = array("=","¿","?","¡","!","'","%","$","€","(",")","[","]","{","}","*","+","·",".","<",">");
	$i = 0;
	while($i<count($simbolos)){
	$str = str_replace($simbolos[$i], "", $str);
	$i++;
	}

	//Quitar espacios
	$str = str_replace(" ","_",$str);

	//Pasar a minúsculas
	$str = strtolower($str);

	return $str;
}


 ?>
