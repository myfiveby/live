<?php

function urls_($url) {
	$nick_name = utf8_decode($url);
	$separador = "-";	// Eliminamos el separador si ya existe en la cadan actual
	$cadena = str_replace($separador, "",$nick_name);	// Convertimos la cadena a minusculas
	$cadena = strtolower($cadena);	// Remplazo tildes y eсes
	$cadena = strtr($cadena, "бйнуъЅс—аимтщ«з", "aeiouAnNaeiouCc");	// Remplazo cuarquier caracter que no este entre A-Za-z0-90 por un espacio vacio
	$cadena = trim(preg_replace("/[^ A-Za-z0-9]/", "", $cadena));	// Inserto el separador antes definido
	$cadena = preg_replace("/[ \t\n\r]+/", $separador, $cadena);
	return  $cadena;
}

function clean_chars_($url) {
	$cadena = strtr($url, "бйнуъЅс—аимтщ«з", "aeiouAnNaeiouCc");
	return  $cadena;
}

?>