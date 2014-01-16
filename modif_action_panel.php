<?php
if (!session_id() || session_id()==""){
	session_start();
} 
require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php');
require ('fonction/functions_myfiveby.php');    
require ('fonction/mostrar_panel.php');
  
$connexion = Connexion ($login_base, $password_base, $base, $host_base);
if ( isset($_POST['idu']) AND isset($_POST['idp']) ){
 
$comprueba_exists_user = Requete ("SELECT f_alta FROM users WHERE  id_user = '$_SESSION[id]' " , $connexion);
$cont = 1; 
 
 if (mysqli_num_rows($comprueba_exists_user) !==0 ){ 
  
  
  $_POST['t'] = validate_html_insert($_POST['t']);
  
  
	 $resultat_update_tit =  Requete  ("UPDATE myfive_panels
								SET 
								title = '$_POST[t]' ,
								f_creado = NOW()  
								WHERE id_myf = '$_POST[idp]' AND autor='$_SESSION[id]'", $connexion);
  
  
  for ($i = 1; $i <= 5; $i++) {  
  
  $f = "f".$i;
  $idf = "idf_".$i; 
  $texto_extra ="texto_extra_".$i;
  
  
//  $_POST[$f] = validate_html_insert($_POST[$f]);
 // $_POST[$texto_extra] = validate_html_insert($_POST[$texto_extra]);
  
  
  
	 $resultat_update_f =  Requete  ("UPDATE myfive_content
								SET 
								frase_mf = '$_POST[$f]',
								texto_mf = '$_POST[$texto_extra]',
								f_creado = NOW()  
								WHERE autor_mf = '$_SESSION[id]' AND  id_myf='$_POST[idp]'   AND id_mf ='$_POST[$idf]'", $connexion);
								
								
								
								
  
}
  require_once('fonction/function_do_feed.php'); 
  
do_feed($_SESSION['fb_id'], $_SESSION['username'], '1', '', 'p', $_POST['idp'], $_SESSION['id']);

 
 
 
 ?>
 
 
<script type="text/javascript">
show_panel_main(<?php echo $_POST['idp']; ?>);
 
</script>


<?php 
  
  
} else {
 
 echo "OOOPS ERROR!1";
 }
  
  
} else {
 
 echo "OOOPS ERROR!2";
 }
 
?>