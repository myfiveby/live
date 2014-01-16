<?php
function get_obj_elements($objeto){
require ('conf/sangchaud.php'); 
$connexion = Connexion ($login_base, $password_base, $base, $host_base);

$extra_clause="";
$tipo = substr($objeto,-1,1);

$comprueba_exists_tit = Requete ("SELECT id_user, name_user FROM users  WHERE url  = '$objeto'  $extra_clause " , $connexion);
if (mysqli_num_rows($comprueba_exists_tit) ==1 ){ $tipo=2; }

switch ($tipo){

case '2': //panel



$extra_clause="";
  
$datos_tit = mysqli_fetch_array($comprueba_exists_tit) ;

$id_panel = $datos_tit['id_user'];

$title = $datos_tit['name_user'];



return $title;
 




break;



case '1': //panel

$extra_clause="";
$comprueba_exists_tit = Requete ("SELECT id_myf, title FROM myfive_panels  WHERE url  = '$objeto'  $extra_clause " , $connexion);
$cont = 1;  

if (mysqli_num_rows($comprueba_exists_tit) !==0 ){ 
$datos_tit = mysqli_fetch_array($comprueba_exists_tit) ;
$id_panel = $datos_tit['id_myf'];
$title = $datos_tit['title'];

return $title;

}




break;


}




}



?>
