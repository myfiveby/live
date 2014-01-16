<?php
if (!session_id() || session_id()==""){
	session_start();
}
 
require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php'); 
$connexion = Connexion ($login_base, $password_base, $base, $host_base); 
 
$autor = $_POST['autor'];
												 
$id_panel = $_POST['id_panel'];

$selected_user_conv = $_POST['selected_user_conv'];

$posts_selec = explode(",",$_POST['selected_user_conv']);

unset($posts_selec[0]);

foreach ($posts_selec as $value) {


$query_panelb = Requete("INSERT INTO   rel_threads (id_th,id_panel,f_rel) VALUES ('$id_thread','$id_panel',NOW())" , $connexion);

}


echo $id_thread;
 ?>
 