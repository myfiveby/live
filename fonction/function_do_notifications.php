<?php
function do_notif($id_user, $action, $location, $tipo, $id_location,$you) {
if (!session_id() || session_id()==""){
	session_start();
}
require ('conf/sangchaud.php'); 
  
$connexion = Connexion ($login_base, $password_base, $base, $host_base); 

 if ($_SESSION['id'] == $you AND $_SESSION['id'] !== $id_user ){
 

switch ($action){

 case 1: $action_text=" created a panel ";
 
  break;

  

case 2: $action_text=" just start follow you. ";
 
$name_user = $_SESSION['username'];
$fb_id= $_SESSION['fb_id'];
break;

  

case 3:  
 
$name_user = $_SESSION['username'];
$fb_id= $_SESSION['fb_id'];


  $comprueba_location = Requete ("SELECT title, privacy FROM myfive_panels  WHERE id_myf  = '$id_location'    " , $connexion);

  $datos_location = mysqli_fetch_array($comprueba_location) ; 

  $title_post = $datos_location['title'];

  $privacy = $datos_location['privacy'];


$extra_text = $title_post;


break;

  

case 4:  
 
$name_user = $_SESSION['username'];
$fb_id= $_SESSION['fb_id'];


  $comprueba_location = Requete ("SELECT title, privacy FROM myfive_panels  WHERE id_myf  = '$id_location'    " , $connexion);

  $datos_location = mysqli_fetch_array($comprueba_location) ; 

  $title_post = $datos_location['title'];

  $privacy = $datos_location['privacy'];


$extra_text = $title_post;


break;



case 7:

$action_text=" comment on your post:  ";
$name_user = $_SESSION['username'];
$fb_id= $_SESSION['fb_id'];


  $comprueba_location = Requete ("SELECT title, privacy FROM myfive_panels  WHERE id_myf  = '$id_location'    " , $connexion);

  $datos_location = mysqli_fetch_array($comprueba_location) ; 

  $title_post = $datos_location['title'];

  $privacy = $datos_location['privacy'];


$extra_text = $title_post;
 
break;



case 8:  
 // love thread
$name_user = $_SESSION['username'];
$fb_id= $_SESSION['fb_id'];


  $comprueba_location = Requete ("SELECT name_th, privacy FROM threads  WHERE id_th = '$id_location'    " , $connexion);

  $datos_location = mysqli_fetch_array($comprueba_location) ; 

  $title_post = $datos_location['name_th'];

  $privacy = $datos_location['privacy'];


$extra_text = $title_post;


break;


case 88:  
 // fav thread
$name_user = $_SESSION['username'];
$fb_id= $_SESSION['fb_id'];


  $comprueba_location = Requete ("SELECT name_th, privacy FROM threads  WHERE id_th = '$id_location'    " , $connexion);

  $datos_location = mysqli_fetch_array($comprueba_location) ; 

  $title_post = $datos_location['name_th'];

  $privacy = $datos_location['privacy'];


$extra_text = $title_post;


break;

case 9:

$action_text=" contribute on your conversation:  ";
$name_user = $_SESSION['username'];
$fb_id= $_SESSION['fb_id'];
 
$query_thread_notif = mysqli_query($connexion,"SELECT autor_th,id_th,name_th FROM  threads  WHERE id_th = '$id_location'");

$result_thread_notif = mysqli_fetch_array($query_thread_notif);		



$id_user = $result_thread_notif['autor_th'];

$id_location = $result_thread_notif['id_th'];

$extra_text = $result_thread_notif['name_th'];
 
break;




case 10:

$action_text=" start a conversation at ";
$name_user = $_SESSION['username'];
$fb_id= $_SESSION['fb_id'];
 
$query_thread_notif = mysqli_query($connexion,"SELECT autor_th,id_th,name_th FROM  threads  WHERE id_th = '$id_location'");

$result_thread_notif = mysqli_fetch_array($query_thread_notif);		



$id_user = $result_thread_notif['autor_th'];

$id_location = $result_thread_notif['id_th'];

$extra_text = $result_thread_notif['name_th'];
 
break;

}
 
				if (empty($privacy))$privacy=0;
 

 $query_paneldo_notif = Requete("INSERT INTO notifications (id_user_owner,name_user,fb_id,id_action,action_text,extra_text,tipo, id_location, location, f_creado, privacity )			       VALUES ('$id_user','$name_user','$fb_id','$action','$action_text','$extra_text','$tipo','$id_location','$location',NOW(),'$privacy')" , $connexion);

$id_notif= mysqli_insert_id($connexion); 

 

}



  }

 

?>