<?php
if (!session_id() || session_id()==""){
	session_start();
}
require ('conf/sangchaud.php');
require ('lib/myfiveby.php');
$connexion = Connexion ($login_base, $password_base, $base, $host_base);
if ( isset($_POST['idu']) ){
	$comprueba_exists_user = Requete ("SELECT f_alta FROM users WHERE  id_user = ".$_SESSION['id']." " , $connexion);
	if (mysqli_num_rows($comprueba_exists_user) !==0 ){
		$_POST['t'] = validate_html_insert($_POST['t']);
	  $_POST['t'] = addslashes($_POST['t']);
	  $_POST['texto_p'] = addslashes($_POST['texto_p']);
		$query_panel = mysqli_query($connexion,"INSERT INTO myfive_panels (f_creado,autor,title, tipo,privacy) VALUES (NOW(),'".$_SESSION['id']."','".$_POST['t']."','1','".$_POST['post_priv']."')");
		$id_panel= mysqli_insert_id($connexion);
		$query_frase = mysqli_query($connexion,"INSERT INTO myfive_content (f_creado,frase_mf, autor_mf,id_myf,tipo) VALUES (NOW(),'".$_POST['texto_p']."','".$_SESSION['id']."','".$id_panel."','1')");
		$delete_privacy_f =  Requete  ("DELETE FROM rel_privacy_posts WHERE id_post_priv = '".$id_panel."' " , $connexion);
		$query_panel = mysqli_query($connexion,"INSERT INTO rel_privacy_posts (id_post_priv,users_allow_priv ) VALUES ('".$id_panel."','".$_POST['selected_friends_priv']."')");
		if (isset($_POST['post_toth']) AND $_POST['post_toth'] > 0){
			$query_toth = mysqli_query($connexion,"INSERT INTO rel_threads (id_th,id_panel, f_rel ) VALUES ('".$_POST[post_toth]."','".$id_panel."',NOW())");
		}
		$id_myf = $id_panel;
		// $f_creado = $datos_tit['f_creado'];
		$tipo = "1";
		$d_unix  = strtotime("now");
		$date_url =  $d_unix.$id_myf.$tipo;
		$resultat_update_tit =  Requete  ("UPDATE myfive_panels SET url = '$date_url' WHERE id_myf = '".$id_myf."' ", $connexion);
		echo $id_panel;
		do_feed($_SESSION['fb_id'], $_SESSION['username'], '1', $_POST['t'], 'p', $id_panel, $_SESSION['id']);
	} // end isset num user
} // end isset user
?>