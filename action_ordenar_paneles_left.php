 

<?php
/* This is where you would inject your sql into the database 
   but we're just going to format it and send it back
*/
include ('conf/sangchaud.php');
include ('fonction/fonction_connexion.php');
include ('fonction/fonction_requete.php');
$connexion = Connexion ($login_base, $password_base, $base, $host_base);


foreach ($_GET['tit_col'] as $position => $item) {

$resultat_update =  Requete  ("UPDATE myfive_panels SET orden = '$position' WHERE id_myf = '$item' ", $connexion);
}
 
?>