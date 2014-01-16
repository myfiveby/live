<?php 
if (!session_id() || session_id()==""){
	session_start();
}
require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php');




$connexion = Connexion ($login_base, $password_base, $base, $host_base);
$query_new_panel = mysqli_query($connexion,"SELECT id_user_f FROM follow  WHERE id_to_follow = '$_POST[idtofollw]'   AND id_user_f='$_SESSION[id]' "  );
$resultado = mysqli_num_rows($query_new_panel);

if( $resultado== 0){
$consulta_user_datos = Requete ("SELECT id_user,fb_id   FROM users  WHERE fb_id  = '$_POST[idtofollw]'    " , $connexion);
$datos_user = mysqli_fetch_array($consulta_user_datos) ;
$id_user_to_follow = $datos_user['id_user'];  

if (!empty($_POST['idtofollw']) AND $_POST['idtofollw']!==0 AND $_POST['idtofollw'] !==""){ 
$query_panel = Requete("INSERT INTO follow (id_to_follow,id_user_to_follow, id_user_f, f_creado) VALUES ('$_POST[idtofollw]','$id_user_to_follow','$_SESSION[id]',NOW() )",$connexion);}


require_once('fonction/function_do_feed.php'); 
do_feed($_SESSION['fb_id'], $_SESSION['username'], '2', '', 'u', $_POST['idtofollw'] , $_SESSION['id']);


 require_once('fonction/function_do_notifications.php'); 
 do_notif($id_user_to_follow,  '2', $_SESSION['username'], 'u', $_SESSION['fb_id'], $_SESSION['id']);



require_once("fonction/fucntion_5mailer_aws.php"); $idtofollw = $_POST['idtofollw'];
send_notif_5('1', $idtofollw);

} /*
			*/
 
?>                                                    