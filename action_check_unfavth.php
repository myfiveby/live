<?php
if (!session_id() || session_id()==""){
	session_start();
}

require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php'); 
$connexion = Connexion ($login_base, $password_base, $base, $host_base); 

$favs = $_POST['dofavr'];
if ($favs>0){$favs--;}else {$favs=0;}

  
	 $registra_favs_panel =  Requete  ("UPDATE threads
								SET 
								favs = '$favs'
								WHERE id_th = '$_POST[panel_fav]' ", $connexion); 

 
	 $registra_favs_panel =  Requete  ("DELETE FROM favs_th WHERE fav_panel = '$_POST[panel_fav]' AND fav_users = '$_SESSION[id]' ", $connexion); 
 	
 	
 echo $favs;
  
  
  ?>