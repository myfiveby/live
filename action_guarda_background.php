<?php
if (!session_id() || session_id()==""){
	session_start();
}
 

require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php');
require ('fonction/functions_myfiveby.php');
require ('fonction/mostrar_panel.php');




$connexion = Connexion ($login_base, $password_base, $base, $host_base);


  
	 $resultat_update_f =  Requete  ("UPDATE users
								SET 
								background_user = '$_POST[bkgimage]' 
								WHERE id_user = '$_SESSION[id]' ", $connexion);
  
  
  $_SESSION['background_user'] = "$_POST[bkgimage]";
  
  
  ?>