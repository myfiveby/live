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
	  $('#scrollcolnotifications').sbscroller();
$().ready(function(){

	 
	 var text_notif_extra = $("#box_notif_colfeed").text();
	 $("#box_notif_colfeed").fadeOut(100);
	 var title_old = document.title;
	 var titele_new = title_old.replace(text_notif_extra,' ');
 
         $(document).attr('title', titele_new);	
 	
	}); // end ready


</script>

 <style>.high_notif{background:#eaf0f7;}</style>

<div id="scrollcolnotifications" style="padding:4px;width:250px;height:95%;">
  
<?php 

 
 
 $query_friends = mysqli_query($connexion,"SELECT *  FROM notifications   WHERE id_user_owner = '".$_SESSION['id']."' ORDER BY f_creado DESC  "  );

//AND fb_id <> '".$_SESSION['fb_id']."'



$num_following = mysqli_num_rows($query_friends);
$num_following =$num_notif_sql;
 
if ($num_notif_sql !== 0){
 
 
while($lista_amigos_notifications = mysqli_fetch_array($query_friends)){



$id_notif = $lista_amigos_notifications['id_notif'];
$name_user = $lista_amigos_notifications['name_user'];	

$fbid_user = $lista_amigos_notifications['fb_id'];

$id_action = $lista_amigos_notifications['id_action'];

$action_text = $lista_amigos_notifications['action_text'];

$location = $lista_amigos_notifications['location'];

$id_location = $lista_amigos_notifications['id_location'];

$privacy_item = $lista_amigos_notifications['privacity'];

$extra_text = $lista_amigos_notifications['extra_text'];


$read_it = $lista_amigos_notifications['readit'];


if ($read_it == 1){ $class_extra="high_notif"; } else { $class_extra=""; }

	

  

if (($privacy_item == 0)  ){



// $privacy_item == 1 AND $fbid_user == $_SESSION['fb_id'])



$tipo = $lista_amigos_notifications['tipo'];



$loves = $result_panel['loves'];





$f_creado = time_ago($lista_amigos_notifications['f_creado']);

 
switch ($id_action){

 
  

  case 2: $action_text=" is now following you"; 

   $action_script="show_user('".$id_location."')";

	$picto_f = "ico_newpanel.png";

   $fbid_user = $id_location;

   $name_user = $location;
  break;

  

  case 3: $action_text=" <img src=\"img/ico_love_mini.png\" > your post:";  

  $action_script="show_panel_main('".$id_location."')";

	$picto_f = "ico_newpanel.png";


   $fbid_user = $fbid_user;

   $name_user = $name_user;

  break;

  

  case 4: $action_text=" <img src=\"img/ico_fav_mini.png\" > your post:";  

  $action_script="show_panel_main('".$id_location."')";

	$picto_f = "ico_newpanel.png";

  

  break;
	

  

	case 7: $action_text=" commented on your post: ";  

	$picto_f = "ico_newpanel.png";

	$action_script="show_panel_main('".$id_location."')";

	$extra_text =  $extra_text ;

  break; 

  

  case 8: $action_text=" <img src=\"img/ico_love_mini.png\" > your conversation:";  

  $action_script="show_panel_main('".$id_location."')";

	$picto_f = "ico_newpanel.png";


   $fbid_user = $fbid_user;

   $name_user = $name_user;

  break;

  
  
  case 88: $action_text=" <img src=\"img/ico_fav_mini.png\" > your conversation:";  

  $action_script="show_panel_main('".$id_location."')";

	$picto_f = "ico_newpanel.png";


   $fbid_user = $fbid_user;

   $name_user = $name_user;

  break;

  

  case 9: $action_text=" contributed to your conversation:";  

  $action_script="show_thread('".$id_location."')";

	$picto_f = "ico_newpanel.png";


   $fbid_user = $fbid_user;

   $name_user = $name_user;

  break;	
  

  case 10: $action_text=" started a conversation:";  

  $action_script="show_thread('".$id_location."')";

	$picto_f = "ico_newpanel.png";


   $fbid_user = $fbid_user;

   $name_user = $name_user;

  break;	

} 
 

echo"

<div id=\"".$tipo."_".$id_location."\" style=\"margin-left:4px;width:100%;min-height:45px;border-bottom:1px solid #eee;margin-bottom:15px;padding:4px;\" class=\"".$class_extra."\"> 

<div style=\"width:40px;float:left;display:inline-block;cursor:pointer;background:transparent;\"><a href=\"javascript:void_()\"  onClick=\"show_user('".$fbid_user."')\"   ><img src=\"https://graph.facebook.com/".$fbid_user."/picture\" width=\"40\" style=\"-webkit-border-radius: .5em;-moz-border-radius: .5em;	border-radius: .5em;border:0px;\"  alt=\"\" border=\"0\" ></a><br /></div>

<div style=\"display:inline-block;width:170px;margin-left:10px;\">

<a href=\"javascript:void_()\"  onClick=\"show_user('".$fbid_user."')\"   class=\" texto_12 azul\">$name_user</a>

<span class=\" texto_12 gris\"> $action_text</span> <a href=\"javascript:void_()\"  onClick=\"".$action_script."\"   class=\" texto_12 negro\"> <span class=\" texto_12 negro\"> $extra_text</span> </div></a>

  <div class=\"texto_10 gris\"  style=\"position:relative;padding:0px;padding-left:35px;color:#999999;margin-bottom:10px;margin-left:15px;\"> &#9638; $f_creado</div>

</div>



";





}// end privacy


if ($read_it == 1){
	$tstr = "UPDATE  `".DB_DATABASE."`.`notifications` SET  `readit` =  '0' WHERE  `notifications`.`id_notif` =$id_notif";
	$resultat_read =  Requete  ($tstr, $connexion);
}


} // end while



} // end num notifictions
else {
		
		 echo "<div class=\"texto_13 gris  \" style=\"margin:0 auto;text-align:center;width:79%;\"><br><br><br><br>When you follow someone,<br>the posts they publish will appear here.</div>";
		
}



}

 

?>

 </div> 
