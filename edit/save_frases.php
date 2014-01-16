<?php 
require ("../conf/sangchaud.php");
require ("../fonction/fonction_connexion.php");
require ('../fonction/fonction_requete.php');
$connexion = Connexion ($login_base, $password_base, $base, $host_base);
   
		$resultat_update =  Requete  ("UPDATE  myfive_content
								SET  
   frase_mf = '$_POST[value]' 
   
   WHERE id_mf = '$_POST[id]'", $connexion);
			 
			  $_POST['value'] = stripslashes($_POST['value']);
			  
			 echo $_POST['value']; 
 
 ?>