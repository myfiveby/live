<?php
if (!session_id() || session_id()==""){
	session_start();
}
 
require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php'); 

$connexion = Connexion ($login_base, $password_base, $base, $host_base); 


 
$comprueba_exists_tit = Requete ("SELECT  loves FROM myfive_panels  WHERE id_myf  = '$_POST[panel_love]' " , $connexion);
$datos_tit = mysqli_fetch_array($comprueba_exists_tit) ;
$loves = $datos_tit['loves'];
 
 
 
 


$comprueba_exists_lovers= Requete ("SELECT  love_panel,love_users FROM  loves  WHERE love_panel  = '$_POST[panel_love]' AND love_users='$_SESSION[id]'" , $connexion);

 if ( mysqli_num_rows($comprueba_exists_lovers)>0 ){ 
  $loves=$_POST['dolover'];
 

   echo $loves;
   
   
   } else {
  
 

			$query_panel = Requete("INSERT INTO loves (love_panel,love_users,f_love) VALUES ('$_POST[panel_love]','$_SESSION[id]',NOW())" , $connexion);


$loves=$_POST['dolover'];
$loves++;  

	 $registra_loves_panel =  Requete  ("UPDATE myfive_panels
								SET 
								loves = '$loves' 
								WHERE id_myf = '$_POST[panel_love]' ", $connexion); 


 

$comprueba_exists_tit = Requete ("SELECT   autor,title FROM myfive_panels  WHERE id_myf  = '$_POST[panel_love]' " , $connexion);

$datos_tit = mysqli_fetch_array($comprueba_exists_tit) ;
 
$autor_loved_post= $datos_tit['autor'];
$title_loved_post= $datos_tit['title'];

 

require_once('fonction/function_do_feed.php'); 
do_feed($_SESSION['fb_id'], $_SESSION['username'], '3', '', 'p', $_POST['panel_love'], $_SESSION['id']);


 require_once('fonction/function_do_notifications.php'); 
   do_notif($autor_loved_post,  '3',$_SESSION['username'],  'p', $_POST['panel_love'], $_SESSION['id']); 




echo $loves;
 
 
 } 
  
  
  ?>