<?php
include ("top.php");  

$comprueba_exists_user = Requete ("SELECT * FROM users  WHERE url_user  = '$_GET[u]'" , $connexion);

$datos_user = mysqli_fetch_array($comprueba_exists_user);

 			$id_user = $datos_user['id_user'];
		$user_fb_id = $datos_user['fb_id'];
		$user_name = $datos_user['name_user']; 
 ?>
<div id="col_menu_lateral_l" style="background:#fff;z-index:100;height:600px;">
<?php  include("lateral_left.php"); ?>
</div>



  <div id="main_user" style="z-index:0;"> </div>
 
 
 
 <div id="col_menu_lateral_r">
 <?php  include("lateral_right.php"); ?>
 </div>
 