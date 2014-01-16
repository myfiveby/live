<?php
 if (!function_exists('Requete')) {
require ('conf/sangchaud.php');
require ("fonction/fonction_connexion.php");
require ("fonction/fonction_requete.php");
$connexion = Connexion ($login_base, $password_base, $base, $host_base);
      }
$fb_id_user = (isset($fb_id_user)) ? $fb_id_user : 0;  

 if( isset($_SESSION['id']) ){ ?><div id="bot_follow_panel_<?php echo $fb_id_user; ?>"  style="padding:0px;display:inline-block;margin:0px;" class="button_follow_<?php echo $fb_id_user; ?>">
<?php
         
if( $_SESSION['fb_id'] == $fb_id_user ){} else {
                  
$comprueba_exists_tit = Requete ("SELECT id_to_follow, id_user_f FROM follow WHERE id_to_follow  = '$fb_id_user' AND id_user_f = '".$_SESSION['id']."' " , $connexion);

if ( mysqli_num_rows($comprueba_exists_tit)==0 ){ ?>


<a href="javascript:void_()" class="button_f white bigrounded texto_9 negro"  onClick="follow_user('<?php echo $fb_id_user; ?>')" style="width:60px;" >Subscribe</a>

<?php } else { ?>

<a href="javascript:void_()" class=" button_f blue bigrounded texto_9 negro"  onClick="unfollow_user('<?php echo $fb_id_user; ?>')" style="width:60px;" >Subscribed</a>

<?php

}

}

?>

</div>

<?php } ?>
