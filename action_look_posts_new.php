<?php
if (!session_id() || session_id()==""){
	session_start();
}

if (!empty($_SESSION['id'])){ 

require ('conf/sangchaud.php');
 
require ('fonction/fonction_connexion.php');

require ('fonction/fonction_requete.php'); 

 $connexion = Connexion ($login_base, $password_base, $base, $host_base); 

$query_new_activity = Requete ("SELECT id_myf,title,autor,loves,f_creado,privacy FROM  myfive_panels WHERE autor IN ($_POST[from_ids_user])   AND id_myf > $_POST[from_idfeed]  AND privacy = '0'  ",$connexion  );

$num_following_news=mysqli_num_rows($query_new_activity);

echo   $num_following_news;
 
}

?>
 