<?php
if (!session_id() || session_id()==""){
	session_start();
} 

require ('conf/sangchaud.php');

require ('fonction/fonction_connexion.php');

require ('fonction/fonction_requete.php'); 

require ('fonction/functions_myfiveby.php'); 

  

$connexion = Connexion ($login_base, $password_base, $base, $host_base);

  
if ( isset($_POST['idpd']) AND $_POST['idpd'] == 0 ){  // check if is the first time and INSERT o is second time and UPDATE



 $comprueba_exists_user = Requete ("SELECT f_alta FROM users WHERE  id_user = '$_SESSION[id]' " , $connexion);

$cont = 1; 

 

 if (mysqli_num_rows($comprueba_exists_user) !==0 ){ 


  //$_POST['t'] = validate_html_insert($_POST['t']); 


			$query_panel = mysqli_query($connexion,"INSERT INTO myfive_panels (f_creado,autor,title, tipo,privacy,toth) VALUES (NOW(),'$_SESSION[id]','$_POST[t]','1','$_POST[post_priv]','$_POST[toth]')");

			$id_panel= mysqli_insert_id($connexion);

			

			$query_frase = mysqli_query($connexion,"INSERT INTO myfive_content (f_creado,frase_mf, autor_mf,id_myf,tipo) VALUES (NOW(),'$_POST[texto_p]','$_SESSION[id]','$id_panel','1')");  

$delete_privacy_f =  Requete  ("DELETE FROM rel_privacy_posts WHERE id_post_priv = '$id_panel' " , $connexion);
$query_panel = mysqli_query($connexion,"INSERT INTO rel_privacy_posts (id_post_priv,users_allow_priv ) VALUES ('$id_panel','$_POST[selected_friends_priv]')");

								

$id_myf = $id_panel; 
$f_creado = $datos_tit['f_creado'];
$tipo = "1"; 
$d_unix  = strtotime("now");
$date_url =  $d_unix.$id_myf.$tipo;

 $resultat_update_tit =  Requete  ("UPDATE myfive_panels

								SET 

								url = '$date_url' 

								WHERE id_myf = '$id_myf' ", $connexion);
         
	 
	 
	 if ($_POST['toth'] !== 0){
	  
$delete_relthreads_f =  Requete  ("DELETE FROM rel_threads WHERE id_th = '$_POST[toth]' AND id_panel = '$_POST[idp]' " , $connexion);



$query_panelb = Requete("INSERT INTO   rel_threads (id_th,id_panel,f_rel) VALUES ('$_POST[toth]','$_POST[idp]',NOW())" , $connexion);

}

	 
	 
         echo $id_panel;

	 
	 
  } // end isset num user



} else { ////////////////////////////////////////////////////////////////////////////////////////////////////////////
    
  

	 $resultat_update_tit =  Requete  ("UPDATE myfive_panels

								SET 

								title = '$_POST[t]',

								privacy = '1' 

								WHERE id_myf = '$_POST[idpd]' AND autor='$_SESSION[id]'", $connexion);

  

  
  

  $f = "f".$i;
  $idf = "idf_".$i; 
  $texto_extra ="texto_extra_".$i;

  
$_POST['texto_p'] = addslashes($_POST['texto_p']);
  
	 $resultat_update_f =  Requete  ("UPDATE myfive_content

								SET 

								frase_mf  = '$_POST[texto_p]' 

								WHERE autor_mf = '$_SESSION[id]' AND  id_myf='$_POST[idpd]'" , $connexion);

$delete_privacy_f =  Requete  ("DELETE FROM rel_privacy_posts WHERE id_post_priv = '$_POST[idpd]' " , $connexion);
$query_panel = mysqli_query($connexion,"INSERT INTO rel_privacy_posts (id_post_priv,users_allow_priv ) VALUES ('$_POST[idpd]','$_POST[selected_friends_priv]')");

  
    echo $_POST['idpd'];
    
} // end isset($_POST['idp']) AND isset($_POST['idu'])







?>