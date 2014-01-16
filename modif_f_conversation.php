<?php
if (!session_id() || session_id()==""){
	session_start();
} 
require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php');
$connexion = Connexion ($login_base, $password_base, $base, $host_base);
if ( isset($_POST['autor']) AND isset($_POST['id_convers']) ){
 
 
$comprueba_exists_user = Requete ("SELECT f_alta FROM users WHERE  id_user = '$_SESSION[id]' " , $connexion);
$cont = 1; 
 
 if (mysqli_num_rows($comprueba_exists_user) !==0 ){ 
  
  $_POST['title_converst'] = str_replace("\r","<br>",$_POST['title_converst']); 
 
 $_POST['title_converst'] = addslashes($_POST['title_converst']);
$_POST['descrip_convers'] = addslashes($_POST['descrip_convers']);
  
	 $resultat_update_tit =  Requete  ("UPDATE threads
								SET 
								name_th = '$_POST[title_convers]',
								description_th = '$_POST[descrip_convers]'
								WHERE id_th = '$_POST[id_convers]' AND autor_th='$_SESSION[id]'", $connexion);
  
  

  
  
} else {
 
 echo "OOOPS ERROR!1";
 }
  
  
} else {
 
 echo "OOOPS ERROR!2";
 }
 
?>