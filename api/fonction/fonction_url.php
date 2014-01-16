<?php
function urls_($url) {

$nick_name = utf8_decode($url);
            
   $separador = "-";
   // Eliminamos el separador si ya existe en la cadan actual
   $cadena = str_replace($separador, "",$nick_name);
   // Convertimos la cadena a minusculas
   $cadena = strtolower($cadena);
   // Remplazo tildes y e�es
   $cadena = strtr($cadena, "���������������", "aeiouAnNaeiouCc");
   // Remplazo cuarquier caracter que no este entre A-Za-z0-90 por un espacio vacio
   $cadena = trim(ereg_replace("[^ A-Za-z0-9]", "", $cadena));
   // Inserto el separador antes definido
   $cadena = ereg_replace("[ \t\n\r]+", $separador, $cadena);
   
return  $cadena;




/*
// Tranformamos todo a minusculas

$url = strtolower($url);

//Rememplazamos caracteres especiales latinos

$find = array('�', '�', '�', '�', '�', '�','�','�','�','�','�','�');
$repl = array('a', 'e', 'i', 'o', 'u', 'n','a','e','i','o','u','c');

$url = str_replace ($find, $repl, $url);

// A�aadimos los guiones

$find = array(' ', '&', '\r\n', '\n', '+','_','/'); 
$url = str_replace ($find, '-', $url);

// Eliminamos y Reemplazamos dem�s caracteres especiales

$find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');

$repl = array('', '-', '');

$url = preg_replace ($find, $repl, $url);

return $url;
*/
}
?>