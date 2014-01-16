<?php
if (!session_id() || session_id()==""){
	session_start();
}
 
require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php'); 
$connexion = Connexion ($login_base, $password_base, $base, $host_base); 


 
$comprueba_exists_tit = Requete ("SELECT  favs,autor,title FROM myfive_panels  WHERE id_myf  = '$_POST[panel_fav]' " , $connexion);
$datos_tit = mysqli_fetch_array($comprueba_exists_tit) ;
$favs = $datos_tit['favs'];
$autor_fav_post= $datos_tit['autor'];
$title_fav_post= $datos_tit['title'];
 
 
 
 


$comprueba_exists_favrs= Requete ("SELECT  fav_panel,fav_users FROM  favs  WHERE fav_panel  = '$_POST[panel_fav]' AND fav_users='$_SESSION[id]'" , $connexion);

 if ( mysqli_num_rows($comprueba_exists_favrs)>0 ){ 
  $favs=$_POST['dofavr'];
 

   echo $favs;
   
   
   } else {
   

			$query_panel = Requete("INSERT INTO favs (fav_panel,fav_users,f_fav) VALUES ('$_POST[panel_fav]','$_SESSION[id]',NOW())" , $connexion);


$favs=$_POST['dofavr'];
$favs++;  

	 $registra_favs_panel =  Requete  ("UPDATE myfive_panels
								SET 
								favs = '$favs' 
								WHERE id_myf = '$_POST[panel_fav]' ", $connexion); 



require_once('fonction/function_do_feed.php'); 
do_feed($_SESSION['fb_id'], $_SESSION['username'], '4', '', 'p', $_POST['panel_fav'], $_SESSION['id']);
require_once('fonction/function_do_notifications.php'); 
do_notif($autor_fav_post,  '4', $_SESSION['username'], 'p', $_POST['panel_fav'], $_SESSION['id']);



     

require_once("fonction/fucntion_5mailer_aws.php");
 send_notif_5('3',$_POST['panel_fav']);

echo $favs;
 
 
 } 
  
  
  ?>