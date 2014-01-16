<?php
if (!session_id() || session_id()==""){
	session_start();
}
require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php'); 

$connexion = Connexion ($login_base, $password_base, $base, $host_base);

$comprueba_exists_tit = Requete ("SELECT type_th FROM threads  WHERE id_th  = '$_POST[th_u]' " , $connexion);

$datos_tit = mysqli_fetch_array($comprueba_exists_tit) ;

$type_th = $datos_tit['type_th'];
 
if ($type_th == 0) $type_thn=1;
if ($type_th == 1) $type_thn=0;

$registra_loves_panel =  Requete  ("UPDATE threads SET type_th = '$type_thn' WHERE id_th = '$_POST[th_u]' ", $connexion); 
 

/*
require_once('fonction/function_do_feed.php'); 
do_feed($_SESSION['fb_id'], $_SESSION['username'], '4', '', 'p', $_POST['panel_fav'], $_SESSION['id']);

 require_once('fonction/function_do_notifications.php'); 
 do_notif($autor_fav_post,  '4', $_SESSION['username'], 'p', $_POST['panel_fav'], $_SESSION['id']);


   */   
if ($type_thn == 1){
$id_th_u = $_POST['th_u'];
 
// require_once("fonction/fucntion_5mailer_aws.php");

// send_notif_5('5',$id_th_u);
}
 
 
echo $type_thn;
?>