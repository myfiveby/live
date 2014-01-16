 

<?php
/* This is where you would inject your sql into the database 
   but we're just going to format it and send it back
*/

require ("fonction/fonction_connexion.php"); 
require ("fonction/fonction_requete.php"); 
require ("conf/sangchaud.php");
$connexion = Connexion ($login_base, $password_base, $base, $host_base);


foreach ($_GET['listItem'] as $position => $item) {

$resultat_update =  Requete  ("UPDATE img_posts_users SET order_img_post = '$position' WHERE id_img_post = '$item' ", $connexion);
}

?>