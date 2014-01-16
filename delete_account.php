<?php
if (!session_id() || session_id()==""){
	session_start();
}
require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php');
 $connexion = Connexion ($login_base, $password_base, $base,$host_base);
$id_s_user = $_POST['id_u'];
$id_s_fuser = $_POST['id_f_u'];

$query_user_exists = Requete("SELECT fb_id,id_user FROM  users  WHERE id_user = '$_SESSION[id]' AND id_user= '$id_s_user'"  , $connexion);
  		if (mysqli_num_rows($query_user_exists) >0 ){
    		$result_user_exists= mysqli_fetch_array($query_user_exists);		
		$_POST['id_user'] = $result_user_exists['id_user'];	
		$_POST['fb_id'] = $result_user_exists['fb_id'];
 if ($_SESSION['id'] == $_POST['id_user']){


$delete_comments = Requete("DELETE FROM comments WHERE autor_coment = '$_POST[id_user]' "  , $connexion);
$delete_rss = Requete("DELETE FROM connections_rss WHERE user_myfiveby = '$_POST[id_user]' "  , $connexion);
$delete_favs = Requete("DELETE FROM favs  WHERE fav_users = '$_POST[id_user]' "  , $connexion);
$delete_favs_th = Requete("DELETE FROM favs_th  WHERE fav_users = '$_POST[id_user]' "  , $connexion);
$delete_follow = Requete("DELETE FROM follow  WHERE id_user_f = '$_POST[id_user]' "  , $connexion);
$delete_followers = Requete("DELETE FROM follow  WHERE id_user_to_follow = '$_POST[id_user]' "  , $connexion);
$delete_history = Requete("DELETE FROM history  WHERE id_user = '$_POST[id_user]' "  , $connexion);
$delete_favs = Requete("DELETE FROM loves  WHERE love_users = '$_POST[id_user]' "  , $connexion);
$delete_favs_th = Requete("DELETE FROM loves_th  WHERE love_users = '$_POST[id_user]' "  , $connexion);
$delete_favs_th = Requete("DELETE FROM notifications  WHERE id_user_owner = '$_POST[id_user]' "  , $connexion);
$delete_favs_th = Requete("DELETE FROM threads  WHERE autor_th = '$_POST[id_user]' "  , $connexion);

$query_user_panels = Requete("SELECT id_myf,autor FROM  myfive_panels  WHERE autor = '$_POST[id_user]'"  , $connexion);
while ($datos_query_user_panels= mysqli_fetch_array($query_user_panels)){

$id_paneltd = $datos_query_user_panels['id_myf'];


$delete_favs_th = Requete("DELETE FROM myfive_content  WHERE id_myf = '$id_paneltd' "  , $connexion);


}
$delete_favs_th = Requete("DELETE FROM myfive_panels  WHERE autor = '$_POST[id_user]' "  , $connexion);

$delete_favs_th = Requete("DELETE FROM users  WHERE id_user = '$_POST[id_user]' "  , $connexion);



 echo "$_POST[id_user] $_POST[fb_id] Can delete, but delete function is not active yet. ;-)";
 }

}



?>