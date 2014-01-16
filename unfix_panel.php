<?php
if (!session_id() || session_id()==""){
	session_start();
}
 
require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php'); 

$connexion = Connexion ($login_base, $password_base, $base, $host_base); 
  

      $query_panel = Requete("DELETE FROM fix_panel WHERE id_panel_fix ='$_POST[p]' AND autor_fix = '$_SESSION[id]'",$connexion);
  
  ?>