<?php
if (!session_id() || session_id()==""){
	session_start();
}
 
require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php'); 

$connexion = Connexion ($login_base, $password_base, $base, $host_base); 


 
$comprueba_exists_tit = Requete ("SELECT  loves,autor_th, name_th   FROM threads WHERE id_th  = '$_POST[panel_love]' " , $connexion);
$datos_tit = mysqli_fetch_array($comprueba_exists_tit) ;
$loves = $datos_tit['loves'];
$autor_th = $datos_tit['autor_th'];
$name_th = $datos_tit['name_th'];
 
 
 
 


$comprueba_exists_lovers= Requete ("SELECT  love_panel,love_users FROM  loves_th  WHERE love_panel  = '$_POST[panel_love]' AND love_users='$_SESSION[id]'" , $connexion);

 if ( mysqli_num_rows($comprueba_exists_lovers)>0 ){ 
  $loves=$_POST['dolover'];
 

   echo $loves;
   
   
   } else {
  
 

			$query_panel = Requete("INSERT INTO loves_th (love_panel,love_users,f_love) VALUES ('$_POST[panel_love]','$_SESSION[id]',NOW())" , $connexion);


$loves=$_POST['dolover'];
$loves++;  

	 $registra_loves_panel =  Requete  ("UPDATE threads
								SET 
								loves = '$loves' 
								WHERE id_th = '$_POST[panel_love]' ", $connexion); 


require_once('fonction/function_do_feed.php'); 
do_feed($_SESSION['fb_id'], $_SESSION['username'], '8', '', 'c', $_POST['panel_love'], $_SESSION['id']);



 require_once('fonction/function_do_notifications.php'); 
   do_notif($autor_th,  '8',$_SESSION['username'],  'p', $_POST['panel_love'], $_SESSION['id']); 





echo $loves;
 
 
 } 
  
  
  ?>