<?php 
if (!session_id() || session_id()==""){
	session_start();
}

require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php');
require ('fonction/functions_myfiveby.php');

require ('fonction/function_show_user.php');
$connexion = Connexion ($login_base, $password_base, $base, $host_base);

$extra_clause="";
$comprueba_exists_tit = Requete ("SELECT id_user FROM users  WHERE fb_id  = '$_POST[ufb]'  $extra_clause " , $connexion);
$cont = 1;  

if (mysqli_num_rows($comprueba_exists_tit) !==0 ){ 
$datos_tit = mysqli_fetch_array($comprueba_exists_tit) ;
$id_user = $datos_tit['id_user'];
// dare I ask why this has been factored out into a function contained within a file that's only used once? Why not have a User class?
show_user($id_user) ;
}   
    ?>