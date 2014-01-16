<?php if (!session_id() || session_id()==""){
	session_start();
} 
//**********************************************************************************************

require ('../conf/sangchaud.php');

require ('../fonction/fonction_connexion.php');
require ('../fonction/fonction_requete.php');
$connexiontw = Connexion ($login_basetw, $password_basetw, $basetw,$host_basetw);



if ($_SESSION['id'] ==  $_POST['user_my5']){

$consulta_tw_datos = Requete ("DELETE FROM connections_twitter  WHERE user_myfiveby  = '$_SESSION[id]' AND user_twitter='$_POST[user_twitter]' $extra_clause " , $connexiontw);
 
 if ($consulta_tw_datos){
 
 
 echo "<div class=\"texto_11 gris\">User @".$_POST['user_twitter']." removed from connections.</div>";
 } else { echo "<div class=\"texto_11 gris\">This user is not exists.</div>";} 
        } else { echo "<div class=\"texto_11 gris\">KO</div>";}
				
		 	
				 ?>
        
        