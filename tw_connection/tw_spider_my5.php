<?php
require ('../conf/sangchaud.php');
require ('../fonction/fonction_connexion.php');
require ('../fonction/fonction_requete.php');
$connexiontw = Connexion ($login_basetw, $password_basetw, $basetw, $host_basetw);
$today=date("Y-m-d");
$search_q =  file_get_contents("http://search.twitter.com/search.json?q=%23my5by&include_entities=false&rpp=100&result_type=recent") ;
// echo $search_q;
$search = json_decode($search_q);
 //print_r($search);
foreach ($search->results as $tweet) {
$from_user = $tweet->from_user;
$consulta_tw_datos = Requete ("SELECT *  FROM connections_twitter  WHERE banned_connection  = '0' AND status_connection='1' AND  user_twitter='$from_user'" , $connexiontw);
if (mysqli_num_rows($consulta_tw_datos) !== 0){
	echo $from_user;
	echo $tweet->text;
	$datos_user_tw_conn = mysqli_fetch_array($consulta_tw_datos);
	$id_user_my5 = $datos_user_tw_conn['user_myfiveby'];
	$id_connection_spider = $datos_user_tw_conn['id_tw_connection'];
	$id_tweet =  $tweet->id;
	$consulta_exist_tweet = Requete ("SELECT  id_tweet,user_myfive FROM action_spider_tw  WHERE id_tweet  = '$id_tweet' AND user_myfive='$id_user_my5'" , $connexiontw);
 	if (mysqli_num_rows($consulta_exist_tweet) == 0 ){ 		
		$new_post_tw_title =  addslashes(utf8_encode($tweet->text));
 	 	$new_post_tw_title = str_replace ("#5by" ,"" ,$new_post_tw_title);
		$query_contenido = Requete("INSERT INTO action_spider_tw (date_action,doit, user_twitter,id_tweet,user_myfive, id_panel, id_connection_spider) VALUES (NOW(),'1','".$from_user."','".$id_tweet."','".$id_user_my5."','".$id_panel."','".$id_connection_spider."')",$connexiontw);
		$connexion = Connexion ($login_base, $password_base, $base, $host_base);
		$query_panel = Requete ("INSERT INTO myfive_panels (f_creado,autor,title,tipo, dofrom  ) VALUES ( NOW() ,'".$id_user_my5."','".$new_post_tw_title."','1','Twitter' ) ",$connexion);
		$id_panel= mysqli_insert_id($connexion);
		$query_contenido = Requete("INSERT INTO myfive_content (f_creado,frase_mf, autor_mf,id_myf,tipo) VALUES (NOW(),'','".$id_user_my5."','".$id_panel."','1')",$connexion);
 		echo "OK";
  } else {
  	echo "repeat";
  }
}  // END  if (mysqli_num_rows($consulta_rss_datos) !== 0){
}
 //print_r($search_q);
?>