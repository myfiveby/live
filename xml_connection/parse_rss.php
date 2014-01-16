<?php
// Parse it $rss_name<?php
$start = microtime_float();
// Parse it
$feed = new SimplePie();
if (!empty($rss_name)) {
	if (get_magic_quotes_gpc()) {
		$rss_name = stripslashes($rss_name);
	}
	$feed->set_feed_url($rss_name);
	$feed->enable_order_by_date(false);
	//$feed->set_image_handler('handler_img.php', 'image');
	$feed->init(); 
}
$feed->handle_content_type();
$feed->strip_htmltags(array('blink', 'font', 'marquee'));
?>
<style>
body{font-family:Arial;font-size:12px;
}
img{
max-width:380px;
max-height:700px;
clear:both;}
</style>
		<?php if ($feed->data) {
		//sort($feed);
		//print_r($feed);
		$items = $feed->get_items();
		$items = array_reverse($items);
		$max = $feed->get_item_quantity(50);
	for ($x = 0; $x < $max; $x++) {
		$item = $feed->get_item($x); 
 $item= $items[$x];
 $title_post = $item->get_title();
 if (strlen($title_post)>140) {
 	$title_post = substr($title_post, 0, 140)."...";
 }
 $title_post = addslashes($title_post);
   $contenido =    addslashes($item->get_content()) ;
	$link = $item->get_link();			
	$pubdate = $item->get_date('j F Y | g:i a');
$consulta_rss_exists = Requete (" SELECT rss_pubdate,autor,title  FROM myfive_panels WHERE    rss_link = '".$link."'" , $connexion);
if ($consulta_rss_exists && mysqli_num_rows($consulta_rss_exists)== 0){
					//echo $contenido;
	$p1 = "(f_creado,autor,title,tipo, dofrom,rss_pubdate,rss_link) VALUES ( NOW() ,'".$id_user_my5."','".$title_post."','1','RSS','".$pubdate."','".$link."' )";
	$query_panel = Requete ("INSERT INTO myfive_panels ".$p1,$connexion);
 	$id_panel= mysqli_insert_id($connexion);
	$tipo = 1; 
	$d_unix  = strtotime("now");
	$date_url =  $d_unix.$id_panel.$tipo;
	$resultat_update_tit =  Requete  ("UPDATE myfive_panels SET url = '$date_url'  WHERE id_myf = '".$id_panel."' ", $connexion);
	$query_contenido = Requete("INSERT INTO myfive_content (f_creado,frase_mf, autor_mf,id_myf,tipo) VALUES (NOW(),'".$contenido."','".$id_user_my5."','".$id_panel."','1')",$connexion);
	$query_contenido = Requete("UPDATE  connections_rss	SET  last_connection= NOW()   WHERE id_rss_connection = '".$id_connection_spider."' ",$connexion);
}
 //echo $date_url." - ".$link." - ".$pubdate." - ";
 //echo $title_post."<br>";
} 
}
 ?>