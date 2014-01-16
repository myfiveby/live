<?php
if (!session_id() || session_id()==""){
	session_start();
}

if (!empty($_SESSION['id'])){ 

require ('conf/sangchaud.php');
 
require ('fonction/fonction_connexion.php');

require ('fonction/fonction_requete.php'); 

 $connexion = Connexion ($login_base, $password_base, $base, $host_base); 
 



$query_num_notif = Requete("SELECT * FROM  notifications   WHERE readit = '1' AND id_user_owner = '$_SESSION[id]'    " , $connexion );
$num_notif = mysqli_num_rows($query_num_notif);
 
echo   $num_notif;
 
}
?>