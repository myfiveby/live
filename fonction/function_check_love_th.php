<?php
function check_love_th($id_panel, $id_user) {

 
require ('conf/sangchaud.php');  
$connexion = Connexion ($login_base, $password_base, $base, $host_base); 



$comprueba_exists_lovers= Requete ("SELECT  love_panel,love_users FROM  loves_th  WHERE love_panel  = '$id_panel' AND love_users='$id_user'" , $connexion);

 if ( mysqli_num_rows($comprueba_exists_lovers) == 0 ){
 
 return false; // not checked
  
 } else {
 
 return true; // checked
 
 }


}

?>