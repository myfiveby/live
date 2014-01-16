<?php
if( $_SESSION['fb_id']!== $fb_id_user ){ 
$comprueba_exists_tit = Requete ("SELECT id_to_follow, id_user_f FROM follow WHERE id_to_follow  = '$_SESSION[fb_id]' AND id_user_f = '$id_user' " , $connexion);
if (mysqli_num_rows($comprueba_exists_tit) ==1 ){?>
<span class="texto_11 negro"  onClick="follow_user('<?php echo $fb_id_user; ?>')" style="width:70px;" > Subscribed to you</span>
<?php } }?>