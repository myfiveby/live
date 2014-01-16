<?php 
if (!session_id() || session_id()==""){
	session_start();
}
require ('../conf/sangchaud.php');
require ('../fonction/fonction_connexion.php');
require ('../fonction/fonction_requete.php');
$connexion = Connexion ($login_base, $password_base, $base, $host_base);

 $del_rss = Requete("DELETE  FROM  connections_rss  WHERE id_rss_connection = '$_POST[id_rss]' AND user_myfiveby = '$_SESSION[id]'", $connexion  );


?>