<?php if (!session_id() || session_id()==""){
	session_start();
} 
require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php'); 
$connexion = Connexion ($login_base, $password_base, $base, $host_base);

 
$comprueba_existsi_user = Requete ("SELECT nom_image,owner_image,id_img_post FROM img_posts_users WHERE  owner_image = '$_SESSION[id]'  AND nom_image ='$_POST[nom_image_]'" , $connexion);
 
 if (mysqli_num_rows($comprueba_existsi_user) !==0 ){ 
  
  
$datos_existsi_user = mysqli_fetch_array($comprueba_existsi_user);
 
$nom_image = $datos_existsi_user['nom_image']; 
$owner_image = $datos_existsi_user['owner_image']; 
$id_img_post = $datos_existsi_user['id_img_post']; 
 
  
  $file_to_post = 'u_i/'.$owner_image.'/'.$nom_image;
  echo '<li id="listItem_'.$id_img_post.'" style="display:inline-table;" class="picture_post_m"><img src="'.$file_to_post.'" class="picture_post_th" width="60"><div><img src="img/ico_remove.png" onClick="remove_picture_fpost(\''.$id_img_post.'\',\''.$_SESSION['id'].'\',\''.$nom_image.'\');" style="cursor:pointer;margin_2px; width:18px;border:1px solid #eee;padding:1px;"></div></li>';
  
  
  }
  
  
  

?>