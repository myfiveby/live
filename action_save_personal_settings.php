<?php
if (!session_id() || session_id()==""){
	session_start();
}
 
require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php'); 

$connexion = Connexion ($login_base, $password_base, $base, $host_base);


  
	 $resultat_update_f =  Requete  ("UPDATE users
								SET 
								url_user = '$_POST[url_user]',
								bio = '$_POST[description_url]',
								email = '$_POST[email_user]'
								 
								WHERE id_user = '$_SESSION[id]' ", $connexion);
 
  
  ?>