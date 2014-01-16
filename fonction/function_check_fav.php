<?php
function check_fav($id_panel, $id_user) {

 
require ('conf/sangchaud.php');  
$connexion = Connexion ($login_base, $password_base, $base, $host_base); 



$comprueba_exists_favrs= Requete ("SELECT  fav_panel,fav_users FROM  favs  WHERE fav_panel  = '$id_panel' AND fav_users='$id_user'" , $connexion);

 if ( mysqli_num_rows($comprueba_exists_favrs) == 0 ){
 
 return false; // not checked
  
 } else {
 
 return true; // checked
 
 }


}

?>