<?php
function is_owner($autor,$id_myf) {


require ('conf/sangchaud.php');
$connexion = Connexion ($login_base, $password_base, $base, $host_base);


 $comprueba_is_panel = Requete ("SELECT autor FROM myfive_panels   WHERE autor  = '$autor'  AND id_myf = '$id_myf'  " , $connexion);
 
 if (mysqli_num_rows($comprueba_is_panel) == 0 ){return false;} else {return true; }
 
 
 mysqli_close($connexion);
 mysqli_free_result($comprueba_is_panel);
}

?>