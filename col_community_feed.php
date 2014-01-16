<?php 
if (!session_id() || session_id()==""){
	session_start();
}
if (!empty($_SESSION['id'])){
  
require ('conf/sangchaud.php');

require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php'); 
require ('fonction/time_ago.php'); 

 $connexion = Connexion ($login_base, $password_base, $base, $host_base);
?> 
 
	<script type="text/javascript">
	
 
 
 function look_updates_feed (user){
   
 
  //action_look_activity_new.php
  
  
	var from_idfeed = $("#fromfeed_id").val();

$.ajax({ 
 data:  { "user":user,"from_idfeed":from_idfeed },
   url:    'action_look_activity_new.php',
  type:  'post',

   success:  function (response) {
		var s_post_ex = "";
		if (response>1)var s_post_ex = "s";
   $("#scrollcolfeed_newupdates").html(""+response+" update"+s_post_ex);
   
   if (response > 0)$("#scrollcolfeed_newupdates").fadeIn(500);
   
   
 }  

  }); // end ajax  

   
  
 }
 
 
 




	
	
$().ready(function(){
		//$('#scrollcolfeed').lionbars();
	}); // end ready

</script>



 
<div id="scrollcolfeed" style="padding:4px;width:250px;height:96%;">

<div id="scrollcolfeed_newupdates" style="display:none;cursor:pointer;padding:10px;width:220px;text-align:center; border-bottom:1px solid #ddd; background: #eee;margin-bottom:10px;text-shadow:1px 1px 1px #ffffff;font-weight:bold;" class="texto_11 gris" onClick="select_menu_feed_item('community')"></div>

<?php
 
$query_friends = mysqli_query($connexion,"SELECT *, feed.f_creado FROM feed LEFT JOIN follow ON id_to_follow = feed.fb_id  WHERE  id_user_f='".$_SESSION['id']."' AND id_to_follow = feed.fb_id ORDER BY feed.f_creado DESC LIMIT 0,50"  );
 
$num_following=mysqli_num_rows($query_friends);
$cont=1;
 
while($lista_amigos_feed = mysqli_fetch_array($query_friends)){
$name_user = $lista_amigos_feed['name_user'];
$fbid_user = $lista_amigos_feed['fb_id'];
$id_action = $lista_amigos_feed['id_action'];
$action_text = addslashes($lista_amigos_feed['action_text']);
$location = $lista_amigos_feed['location'];
$id_location = $lista_amigos_feed['id_location'];
$privacy_item = $lista_amigos_feed['privacity'];

$extra_text = addslashes($lista_amigos_feed['extra_text']);


$f_creado = $lista_amigos_feed['f_creado'];
 

$tipo_f = $lista_amigos_feed['tipo'];
 
 
 
 
 if ($tipo_f == 'p'){
		 		 

	$query_new_panel_imf = mysqli_query($connexion,"SELECT id_myf,privacy FROM  myfive_panels WHERE id_myf = '$id_location' AND privacy ='1'");

	if (mysqli_num_rows($query_new_panel_imf) == 1)$privacy_item = 1;
		
 }
		
		
		
 
if ($cont == 1){
		
$item_f_creado = $lista_amigos_feed['f_creado'];
$id_feed = $lista_amigos_feed['id_feed'];

		
		
}
	
  
if (($privacy_item == 0) OR ( $privacy_item == 1  AND $fbid_user == $_SESSION['fb_id'])){

$tipo = $lista_amigos_feed['tipo']; 
// $loves = $lista_amigos_feed['loves']; 
$f_creado = time_ago($lista_amigos_feed['f_creado']); 

switch ($id_action){



 
	case 1: $action_text=" created a new post "; 
	$action_script="show_panel_main('".$id_location."')";
	$picto_f = "ico_newpanel.png";
	
	
  break;
  
  case 2: $action_text=" is now following "; 
   $action_script="show_user('".$id_location."')";
	$picto_f = "ico_newpanel.png";
   
  break;
  
  case 3: $action_text=" <img src=\"img/ico_love_mini.png\" > post:";  
  $action_script="show_panel_main('".$id_location."')";
	$picto_f = "ico_newpanel.png";
  
  break;
  
  case 4: $action_text=" <img src=\"img/ico_fav_mini.png\" > post: ";  
  $action_script="show_panel_main('".$id_location."')";
	$picto_f = "ico_newpanel.png";
  
  break;
  
  case 5: $action_text=" started a conversation: ";  

  $action_script="show_thread('".$id_location."')";

	$picto_f = "ico_newpanel.png";

   

  break;

  case 55: $action_text="  contributed to the conversation ";  

  $action_script="show_thread('".$id_location."')";

	$picto_f = "ico_newpanel.png";

   

  break;

 
	
  
	case 7: $action_text=" commented on ";  
	$picto_f = "ico_newpanel.png";
	$action_script="show_panel_main('".$id_location."')";
	
  break; 
  

  case 8: $action_text=" <img src=\"img/ico_love_mini.png\" > conversation: ";  

  $action_script="show_thread('".$id_location."')";

	$picto_f = "ico_newpanel.png";

  

  break;
  

  case 9: $action_text=" <img src=\"img/ico_fav_mini.png\" > conversation: ";  

  $action_script="show_thread('".$id_location."')";

	$picto_f = "ico_newpanel.png";

  

  break;	
} 

if ($name_user == $_SESSION['username']  AND $id_action ==2){ $action_text = " is now following you";}

echo"
<div id=\"".$tipo."_".$id_location."\" style=\"margin-left:4px;width:100%;min-height:45px;border-bottom:1px solid #eee;margin-bottom:15px;\">
<div style=\"width:40px;float:left;display:inline-block;cursor:pointer;background:transparent;\"><a href=\"javascript:void_()\"  onClick=\"show_user('".$fbid_user."')\"   ><img src=\"https://graph.facebook.com/".$fbid_user."/picture\" width=\"40\" style=\"-webkit-border-radius: .5em;-moz-border-radius: .5em;	border-radius: .5em;border:0px;\"  alt=\"\" border=\"0\" ></a><br /></div>
<div style=\"display:inline-block;width:170px;margin-left:10px;\">
<a href=\"javascript:void_()\"  onClick=\"show_user('".$fbid_user."')\"   class=\" texto_12 azul\">$name_user</a>
<span class=\" texto_12 gris\"> $action_text</span> <a href=\"javascript:void_()\"  onClick=\"".$action_script."\"   class=\" texto_12 negro\"><span class=\"negro\">$location</span></a> <span class=\" texto_12 gris\"> $extra_text</span> </div>
  <div class=\"texto_10 gris\"  style=\"position:relative;padding:0px;padding-left:35px;color:#999999;margin-bottom:10px;margin-left:15px;\"> &#9638; $f_creado</div>
</div>

";


}// end privacy

$cont++;
} // end while


}
 
?>

	
	
 </div>
 
 
<input id="fromfeed_id" type="hidden" value="<?php echo $id_feed; ?>">
 

 	<script type="text/javascript">
  
  $('#scrollcolfeed').sbscroller();
  
  
  
$(function() {
 setInterval("look_updates_feed('<?php echo $_SESSION['id'] ?>')",50000);
});
	</script>