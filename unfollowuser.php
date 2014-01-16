<?php 
if (!session_id() || session_id()==""){
	session_start();
}
require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php');
$connexion = Connexion ($login_base, $password_base, $base, $host_base);

 
$query_panel = mysqli_query($connexion,"DELETE FROM follow WHERE  id_to_follow = '$_POST[idtofollw]'   AND id_user_f='$_SESSION[id]'   ");
 			
$del_panel_feed = mysqli_query($connexion,"DELETE  FROM feed  WHERE tipo ='u' AND id_action  ='2' AND id_location = '$_POST[idtofollw]'"  );
 	
?>                                          