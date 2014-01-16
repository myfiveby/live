<?php
if (!session_id() || session_id()==""){
	session_start();
}
 
require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php'); 
$connexion = Connexion ($login_base, $password_base, $base, $host_base); 
 
$autor = $_POST['autor'];


$selected_user_conv = $_POST['selected_user_conv'];    
	
$posts_selec = explode(",",$_POST['selected_user_conv']);

if (isset($_POST['name_new_conversation']) AND $_POST['name_new_conversation']!==""){
    
    
$_POST['name_new_conversation'] = addslashes($_POST['name_new_conversation']);
$_POST['descrip_conversation'] = addslashes($_POST['descrip_conversation']);
$query_panel = Requete("INSERT INTO  threads (name_th,f_th,autor_th,description_th) VALUES ('$_POST[name_new_conversation]',NOW(),'$_SESSION[id]','$_POST[descrip_conversation]')" , $connexion);


}
 
  unset($posts_selec[0]);

$id_thread = mysqli_insert_id($connexion);

$tipo = "3";
$tiempo_UNIX=time();
$d_unix  = strtotime("now");

$date_url =  $d_unix.$id_thread.$tipo;

 

	 $resultat_update_tit =  Requete  ("UPDATE threads
								SET 
								url_th = '$date_url' 
								WHERE id_th = '$id_thread' ", $connexion);
  
 



foreach ($posts_selec as $value) {


$query_panelb = Requete("INSERT INTO   rel_threads (id_th,id_panel,f_rel) VALUES ('$id_thread','$value',NOW())" , $connexion);



}



$query_thread_notif = mysqli_query($connexion,"SELECT  autor_th,id_th,name_th FROM  threads LEFT JOIN users   ON id_user = autor_th  WHERE id_th = ".$id_thread);

if ($query_thread_notif) {

	$result_thread_notif = mysqli_fetch_array($query_thread_notif);		
	
	$id_th_thread_notif = $result_thread_notif['id_th'];
	
	$titulo_thread_notif = $result_thread_notif['name_th'];
	
	$autor_thread_notif = $result_thread_notif['autor_th'];
	
	
	require_once('fonction/function_do_feed.php'); 
	do_feed($_SESSION['fb_id'], $_SESSION['username'], '5', $titulo_thread_notif, 'c', $id_thread, $_SESSION['id']);
	
	
	
	 require_once('fonction/function_do_notifications.php'); 
	 do_notif($autor_thread_notif,  '10', $_SESSION['username'], 'c', $id_thread, $_SESSION['id']);
	
	
	
	echo $id_thread;
}
 ?>
 