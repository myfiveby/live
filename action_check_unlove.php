<?php
if (!session_id() || session_id()==""){
	session_start();
}
 
require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php'); 
$connexion = Connexion ($login_base, $password_base, $base, $host_base); 

$loves = $_POST['dolover'];
if ($loves>0){$loves--;}else {$loves=0;}

  
	 $registra_loves_panel =  Requete  ("UPDATE myfive_panels
								SET 
								loves = '$loves'
								WHERE id_myf = '$_POST[panel_love]' ", $connexion); 

 
	 $registra_loves_panel =  Requete  ("DELETE FROM loves WHERE love_panel = '$_POST[panel_love]' AND love_users = '$_SESSION[id]' ", $connexion); 


 	$del_panel_feed = mysqli_query($connexion,"DELETE  FROM feed  WHERE tipo ='p' AND id_action  ='3' AND id_location = '$_POST[panel_love]'"  );
 	
 	
 	
 echo $loves;
  
  
  ?>