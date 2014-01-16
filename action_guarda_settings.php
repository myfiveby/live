<?php
if (!session_id() || session_id()==""){
	session_start();
}
 

require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php'); 




$connexion = Connexion ($login_base, $password_base, $base, $host_base);

if ($_POST['autor'] ==  $_SESSION['id']){
  $_POST['bio'] = addslashes($_POST['bio']);
								//name_user = '$_POST[perso_name]' , 
	 $resultat_update_f =  Requete  ("UPDATE users
								SET 

								url_user = '$_POST[perso_url]' , 

								url = '$_POST[perso_url]' , 
								bio = '$_POST[bio]' ,
								location = '$_POST[location]' ,
								website = '$_POST[website]' ,
								notif_start_followed	 = '$_POST[field2]' ,
								email	 = '$_POST[perso_email]' ,
								notif_conversation_created = '$_POST[field3]' ,

								notif_are_fav = '$_POST[field4]'  ,

								notif_universal= '$_POST[field7]'  ,
								notif_comment = '$_POST[field5]'  ,
								notif_contribute_mytopic = '$_POST[field6]' 
								WHERE id_user = '$_SESSION[id]' ", $connexion);
  
								
}
  ?>