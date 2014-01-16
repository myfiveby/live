<?php
if (!session_id() || session_id()==""){
	session_start();
} 
require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php'); 
require ('fonction/functions_myfiveby.php'); 
  
$connexion = Connexion ($login_base, $password_base, $base, $host_base);
 
if ( isset($_POST['idp']) AND isset($_POST['idu']) ){
 
 
$comprueba_exists_user = Requete ("SELECT f_alta FROM users WHERE  id_user = '$_SESSION[id]' " , $connexion);
$cont = 1; 
 
 if (mysqli_num_rows($comprueba_exists_user) !==0 ){ 
  
 
$comprueba_exists_user = Requete ("SELECT f_alta FROM users WHERE  id_user = '$_SESSION[id]' " , $connexion);
$cont = 1; 
 
 if (mysqli_num_rows($comprueba_exists_user) !==0 ){ 
  
  
  $_POST['t'] = validate_html_insert($_POST['t']);   
$_POST['t'] = addslashes($_POST['t']);
  

  
	 $resultat_update_tit =  Requete  ("UPDATE myfive_panels
								SET 
								title = '$_POST[t]',
								privacy = '$_POST[post_priv]' 
								WHERE id_myf = '$_POST[idp]' AND autor='$_SESSION[id]'", $connexion);
  
  
  
  
  $f = "f".$i;
  $idf = "idf_".$i; 
  $texto_extra ="texto_extra_".$i;
  
  
//  $_POST[$f] = validate_html_insert($_POST[$f]);
 // $_POST[$texto_extra] = validate_html_insert($_POST[$texto_extra]);
  
  $_POST['texto_p'] = addslashes($_POST['texto_p']);
  
	 $resultat_update_f =  Requete  ("UPDATE myfive_content
								SET 
								frase_mf  = '$_POST[texto_p]' 
								WHERE autor_mf = '$_SESSION[id]' AND  id_myf='$_POST[idp]'" , $connexion);
								
	  
	 $delete_privacy_f =  Requete  ("DELETE FROM rel_privacy_posts WHERE id_post_priv = '$_POST[idp]' " , $connexion);
	 
	 $query_panel = mysqli_query($connexion,"INSERT INTO rel_privacy_posts (id_post_priv,users_allow_priv ) VALUES ('$_POST[idp]','$_POST[selected_friends_priv]')");
	 
	 
if ($_POST['post_toth'] > 0){								
$query_panelb = Requete("INSERT INTO   rel_threads (id_th,id_panel,f_rel) VALUES ('$_POST[post_toth]','$_POST[idp]',NOW())" , $connexion);

}


								
								 
 
  require_once('fonction/function_do_feed.php'); 
  
do_feed($_SESSION['fb_id'], $_SESSION['username'], '1', '', 'p', $_POST['idp'], $_SESSION['id']);
echo $_POST['idp'];
 
 
 
 
     
}    
  
       
}    
  
       
}    
  
    
?>