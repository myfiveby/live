<?php 
if( $_POST['username']  !== $_POST['current_username'] ){

 
require ('conf/sangchaud.php');
require ("fonction/fonction_connexion.php");
require ('fonction/fonction_requete.php');

$connexion = Connexion ($login_base, $password_base, $base, $host_base);
 
$sql_check = Requete("SELECT url_user FROM  users WHERE url_user = '$_POST[username]'", $connexion);

if(mysqli_num_rows($sql_check) > 0) { 
//echo '<font color="red">The username <STRONG>'.$_POST['username'].'</STRONG> is already in use, sorry. </font>';

echo '<font color="red">Not available</font>';  
} else { echo '<font color="green">Available</font>';  }

}  else {
echo 'That\'s you!&nbsp;';
}
?>