<?php
if (!session_id() || session_id()==""){
	session_start();
}
 
require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php'); 
$connexion = Connexion ($login_base, $password_base, $base, $host_base); 
 
$autor = $_POST['autor'];

$id_thread = $_POST['id_thread'];

$selected_user_conv = $_POST['selected_user_conv'];
 $posts_selec = explode("&",$_POST['selected_user_conv']);

//var_dump($posts_selec);
if (!empty($selected_user_conv)){

foreach ($posts_selec as $value) {


$value = str_replace("psu=","",$value);
 
 
 if ($value!==0){
$query_panelb = Requete("INSERT INTO   rel_threads (id_th,id_panel,f_rel) VALUES ('$id_thread','$value',NOW())" , $connexion);}

}



/*
foreach ($selected_user_conv as $value) {

	
$query_panelb = Requete("INSERT INTO   rel_threads (id_th,id_panel,f_rel) VALUES ('$id_thread','$value',NOW())" , $connexion);

echo     $value."<br />";

}
*/

echo "ok";

 

$query_thread_notif = mysqli_query($connexion,"SELECT  autor_th,id_th,name_th FROM  threads LEFT JOIN users   ON id_user = autor_th  WHERE id_th = $id_thread");

$result_thread_notif = mysqli_fetch_array($query_thread_notif);		



$id_th_thread_notif = $result_thread_notif['id_th'];

$titulo_thread_notif = $result_thread_notif['name_th'];

$autor_thread_notif = $result_thread_notif['autor_th'];


require_once('fonction/function_do_feed.php'); 
do_feed($_SESSION['fb_id'], $_SESSION['username'], '55', $titulo_thread_notif, 'c', $id_thread, $_SESSION['id']);





 require_once('fonction/function_do_notifications.php'); 
 do_notif($autor_thread_notif,  '9', $_SESSION['username'], 'c', $id_thread, $_SESSION['id']);



 } else {
 
 echo "<div class=\"rojo texto_11\">Select one o more posts.</div>";

 
 }
 ?>