<?php
if (!session_id() || session_id()==""){
	session_start();
}
?>

 <li>
 <!--<a href="javascript:void_();"  class="texto_12 negro" onClick="show_box_img();" style="position:relative;top:0;">Upload a picture</a>-->
 
 <iframe style="border:0px;width:420px;height:40px;background:transparent;"  src="uploadify/upload_image_post.php?i=<?php echo $_SESSION['id'];?>&p=<?php echo $id_myf;?>"></iframe>
 </li>

<?php
require ('conf/sangchaud.php');

require ('fonction/fonction_connexion.php');

require ('fonction/fonction_requete.php');
 

$connexion = Connexion ($login_base, $password_base, $base, $host_base);


 $query_user_images = mysqli_query($connexion,"SELECT nom_image,id_img_post,owner_image FROM img_posts_users   WHERE  owner_image ='$_SESSION[id]' ORDER BY id_img_post"  );

if (mysqli_num_rows($query_user_images) ==0 ){echo"";} else { 




while($view_user_images= mysqli_fetch_array($query_user_images)){


$nom_image = $view_user_images['nom_image']; 

$owner_image = $view_user_images['owner_image']; 

$id_img_post = $view_user_images['id_img_post']; 

  

  $file_to_post = 'u_i/'.$owner_image.'/'.$nom_image;

  

  if (file_exists($file_to_post) ) {

  echo ' <li id="listItem_'.$id_img_post.'"  class="picture_post_m" style="display:inline-table;" ><div style="cursor:pointer;margin:5px;"><img src="'.$file_to_post.'"   width="45" onclick="add_to_textarea(\''.$file_to_post.'\')" alt="Add to text"></div>
  <div style="cursor:pointer; " class="div_remove_img"><img src="img/ico_remove.png" onClick="remove_picture_fpost(\''.$id_img_post.'\',\''.$_SESSION['id'].'\',\''.$nom_image.'\');" style="cursor:pointer;margin:2px; width:18px;border:1px solid #eee;padding:1px;"></div></li>';

  }

}


echo "

<div style=\"width:100%;text-align:center;\" class=\"texto_12 gris\">Click an image to add it to your post.</div>

";

}

 
 ?>