<?php
$Bg_color_list_1 = "#c0c0c0";
$Bg_color_list_2 = "#dbdbdb";

$Root_to_file_oferta_unica ="../site/modules/";

$table_user = 				"usuarios_web";
$table_club_preferences =	"club_datos";
$table_amigo =				"web_amigo";
$table_miembros_club =		"club_miembros";
$table_productos =			"productos";
$table_code_iso =			"cod_iso";
$table_zona =				"zona";
$table_code_tipo =			"tipo_producto";

$table_newsletter =			"newsletter";
$table_newsletter_ficha =	"newsletter_ficha";

$table_traveller =			"nw_traveller";
$table_traveller_ficha =	"nw_traveller_ficha";

$table_stats_subdom = 		"stats_subdom";
$table_bib= 				"biblioteca";
$table_catalogo = 			"catalogo_ttoo";
$table_newsletter_envio = "envios_nw";


$array_tipo = array (	"0"  => '...',
						"sub"=> 'Submarinismo',
						"gol"=> 'Golf',
						"esq"=> 'Esquí',
						"sal"=> 'Salud',
						"cru"=> 'Cruceros',
						"alt"=> 'Viaje Alternativo',
						"fam"=> 'Viaje en Familia');

$route_grand = '../img/productos/grand/';
$route_petit = '../img/productos/petit/';
$route_contenido_grand = '../img/contenidos/grand/';
$route_contenido_petit = '../img/contenidos/petit/';
$route_nw = 'img/newsletter/';
$route_traveller= 'img/traveler/';
$route_nw_banner = $route_nw.'banner/';
$route_nw_logo = $route_nw.'logo/';
$route_historico_nw = '../bak/modules/newsletter/htmls';


$route_marca_grand = '../img/marca/g/';
$route_marca_petit = '../img/marca/p/';
$route_producto_grand = '../img/producto/g/';
$route_producto_petit = '../img/producto/p/';


$file_size_max = 102400;

///MENSAJES DE ERROR///
$error_campos_formulario= 	"Los campos marcados con * son obligatorios.";
$error_formato_fecha = 		"El formato de la fecha debe ser dd/mm/aaaa";
$error_existe_fecha = 		"La fecha introducida no existe";
$error_futura_fecha = 		"La fecha debe ser futura";
$error_link_bad =			"Link incorrecto";
$error_not_jpg =			"El fichero de ilustración no tiene terminación JPG";
$error_not_true_jpg =		"El fichero de ilustración no es un verdadero JPG";
$error_not_gif =			"El fichero de ilustración no tiene terminación GIF";
$error_not_true_gif =		"El fichero de ilustración no es un verdadero GIF";
$error_not_jpggif =			"El fichero de ilustración no tiene terminación JPG ó GIF";
$error_not_true_jpggif =	"El fichero de ilustración no es un verdadero JPG ó GIF";
	$file_size_maxKB = $file_size_max/1024;
$error_peso_jpg =			"El fichero de ilustración tiene un peso excesivo. Debe ser menor de $file_size_maxKB KBs";
$msg_erreur_debut =			"<table class=\"tablemenu\" width=\"100%\" align=\"center\"><tr><td width=\"19\"><img src=\"img/error.gif\"  border=\"0\"></td><td class=\"err\">";
$msg_erreur_fin =			"<td></tr></table>";
$Err_foto = 				"Problemas al copiar la foto en tamaño pequeño";
$error_select_valor=		"Tiene que seleccionar un valor";
///MENSAJES///
$msg_Crear_cont_nw = "Crear una nueva ficha para la newsletter :";

///////////////////
//Títulos de columnas//////////
///////////////////
$Titre_Col_NonActif =	"No activos";
$Titre_Col_Actif = 		"Activos";

?>
