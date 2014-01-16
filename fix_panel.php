<?php
if (!session_id() || session_id()==""){
	session_start();
}
 
require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php'); 

$connexion = Connexion ($login_base, $password_base, $base, $host_base); 
 
 	$query_panel = Requete("INSERT INTO fix_panel (id_panel_fix,autor_fix,f_fixed) VALUES ('$_POST[p]','$_SESSION[id]',NOW())" , $connexion);

 
  
  ?>