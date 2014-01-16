<?php 
if (!session_id() || session_id()==""){
	session_start();
}

 require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php');
$connexion = Connexion ($login_base, $password_base, $base, $host_base);

 
$del_panel_th = mysqli_query($connexion,"DELETE  FROM  img_posts_users  WHERE id_img_post = '$_POST[id_pic_]' AND  owner_image = '$_SESSION[id]'"  );


unlink("u_i/$_SESSION[id]/".$_POST['img_name_']);

 ?>