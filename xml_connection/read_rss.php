<?php
require ('../conf/sangchaud.php');
require ('../fonction/fonction_connexion.php');
require ('../fonction/fonction_requete.php'); 
 
$connexion = Connexion ($login_base, $password_base, $base, $host_base);
$today=date("Y-m-d");


include_once('sp/simplepie.inc');
include_once('sp/idn/idna_convert.class.php');


// Output buffer
function callable_htmlspecialchars($string)
{
	return htmlspecialchars($string);
} 




function microtime_float()
{
	if (version_compare(phpversion(), '5.0.0', '>='))
	{
		return microtime(true);
	}
	else
	{
		list($usec, $sec) = explode(' ', microtime());
		return ((float) $usec + (float) $sec);
	}
}

 function get_first_image_url($html)
{
if (preg_match('/<img.+?src="(.+?)"/', $html, $matches)) {
return $matches  ;
}
else return '';
}


 
 $_POST['user']= 1;
 
$consulta_rss_datos = Requete ("SELECT *  FROM connections_rss  WHERE banned_connection  = '0' AND status_connection='1'  ORDER BY id_rss_connection DESC" , $connexion);

if (mysqli_num_rows($consulta_rss_datos) !== 0){ 

while ($datos_user_rss_conn = mysqli_fetch_array($consulta_rss_datos)){

		$id_user_my5 = $datos_user_rss_conn['user_myfiveby'];
		$rss_name = $datos_user_rss_conn['url_rss'];
		$id_connection_spider = $datos_user_rss_conn['id_rss_connection'];
		
		$last_connection = $datos_user_rss_conn['last_connection'];
  
	  
	//  echo  '<div id="buton_'.$id_connection_spider.'" class="texto_11 gris " style="padding:5px;width:270px; text-align:left;">  '.$rss_name.'</div><br>';
	
	include("parse_rss.php");  
		} 
	
	
	}
?>