<?php
if (!session_id() || session_id()==""){
	session_start();
}
require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php'); 
$connexion = Connexion ($login_base, $password_base, $base, $host_base); 
$id_user=$_POST['user_p'];
$comprueba_exists_panels = Requete ("SELECT title, id_myf FROM myfive_panels  WHERE autor  = '$id_user' AND title <> '' AND privacy ='0'  ORDER BY id_myf DESC" , $connexion);

echo mysqli_num_rows($comprueba_exists_panels);
?>