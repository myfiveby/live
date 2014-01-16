<?php

function show_user($id_panel) {

if (!session_id() || session_id()==""){
	session_start();
} 

$zindex = $id_panel + 150;

		$_POST['id_user'] = $id_panel;

 
?>

 	<script type="text/javascript">

$().ready(function(){

	setInterval(checkOrientAndLocation,1000);

	$('.panel_user').touch({

		animate: false,

		sticky: true,

		dragx: true,

		dragy: true,

		rotate: true,

		resort: true,

		scale: true

	});

	 

		

	

	}); // end ready



						

	 

			 function show_others_convers(panel,thread) {

			 

			    	$(".box_rel_conversations").hide();	

				

 	

				  var coord_now = getMousePosition();

						 

 

			  		

$.ajax({

   data:  { "id_post":panel,"id_thread":thread}, 

   url:   'fonction/show_others_conversations.php',

   type:  'post',

   beforeSend: function () {

   

   },

   error: function(response) { alert(response + " error!"); },

   success:  function (response) {              

   

   $("#escenario").prepend(response);

    

   

   

     $("#box_rel_conversations"+panel).topZIndex(); 

     $("#box_rel_conversations"+panel).css("left",coord_now[0]+10);

		 $("#box_rel_conversations"+panel).css("top",coord_now[1]-50);

		 $("#box_rel_conversations"+panel).css("height","140px");

 

    

    

    

   }  

  }); // end ajax  

 }

 
	</script>     

  
$_POST['ufb'] = $_SESSION['id'];
 $_POST['id_user'] = $_POST['ufb'];

<div id="panel_user_<?php echo $_POST['ufb']; ?>" class="panel_user"  style="position:absolute;left:0;top:25px;">



<?php

require ('../conf/sangchaud.php');
 

$connexion = Connexion ($login_base, $password_base, $base, $host_base);



$consulta_user_datos = Requete ("SELECT id_user,name_user,fb_id,url_user,bio  FROM users  WHERE id_user  = '$_POST[id_user]'  $extra_clause " , $connexion);

$datos_user = mysqli_fetch_array($consulta_user_datos) ;

$id_user = $datos_user['id_user'];

$name_user = ($datos_user['name_user']);

$fb_id_user = $datos_user['fb_id'];

$url_user = $datos_user['url_user'];

$bio_user = ($datos_user['bio']);



   $full_url_panel= URL_SITE_GLOBAL.$url_user;  



$query2 = Requete("INSERT INTO history (id_user, object, id_object, name_object,fb_id_object, date_view ) VALUES ( '".$_SESSION['id']."', 'u', '$id_user','$name_user','$fb_id_user',NOW() )" , $connexion);

 
  

$query_friends = mysqli_query($connexion,"SELECT id_user_f FROM follow  WHERE  id_to_follow='$fb_id_user' "  );

$num_followers=mysqli_num_rows($query_friends);



if ($num_followers==1) { $sornot=""; }else{ $sornot="s"; }



?>



<div id="caja_frases_user" style="top:5%;margin-bottom:5px;">
 

 

<script type="text/javascript">

$().ready(function(){

		$('#scrolluserpanels<?php echo $id_user; ?>').lionbars();

	}); // end ready



</script>



<style>



			 

.menuu_base li{ margin:0px; padding:0px;display:inline-block;width:76px; padding-bottom:10px;cursor:pointer;}

                            

.item_menuu_selected{color:#19a5da; border-bottom:4px solid #19a5da;}	

 

.item_menuu_normal{color:#333;border-bottom:4px solid #a1a1a1;}

.item_menuu_normal:hover{color:#19a5da; border-bottom:4px solid #19a5da;}







</style>



<div id="content_user_<?php echo $id_user; ?>" style="background:#fff;	-webkit-border-radius: 4px;-moz-border-radius:4px;	border-radius: 4px;" >

 

<?php

$comprueba_exists_panels = Requete ("SELECT title, id_myf FROM myfive_panels  WHERE autor  = '$id_user' AND title <> '' AND privacy ='0'  ORDER BY id_myf DESC" , $connexion);



$num_posts=mysqli_num_rows($comprueba_exists_panels);







$query_friends = mysqli_query($connexion,"SELECT id_user_f FROM follow LEFT JOIN users on id_user = id_user_f  WHERE  id_to_follow='$fb_id_user' "  );

$num_followers=mysqli_num_rows($query_friends);







$query_friendsfollowing = mysqli_query($connexion,"SELECT id_to_follow FROM follow LEFT JOIN users ON fb_id = id_to_follow WHERE  id_user_f='$id_user'  "  );

$num_following=mysqli_num_rows($query_friendsfollowing);







$query_friendsthreads = mysqli_query($connexion,"SELECT id_th FROM threads  WHERE  autor_th='$id_user'  "  );

$num_topics=mysqli_num_rows($query_friendsthreads);





?>

 

<ul id="menu_user_box_<?php echo $id_user; ?>" class="menuu_base" style="width:315px;padding:0px;margin:2px;">



<li id="posts_menu_box_<?php echo $id_user; ?>" class="item_menuu_selected  " STYLE="width:58px;padding-left:4px;" onClick="view_user_panels('<?php echo $id_panel; ?>','<?php echo $id_user; ?>')" ><span style="font-size:14px;"><b><div id="item_num_posts<?php echo $id_user; ?>" style="display:inline-block;"><?php echo $num_posts; ?></div></b></span><br><span style="font-size:10px;">POSTS</span></li>

 

<li id="topics_menu_box_<?php echo $id_user; ?>" class="item_menuu_normal  " STYLE="width:90px;padding-left:4px;"  onClick="view_topics('<?php echo $fb_id_user; ?>','<?php echo $id_user; ?>')" ><span style="font-size:14px;"><b><?php echo $num_topics; ?></b></span><br><span style="font-size:10px;">CONVERSATIONS</span></li>

 



<li id="follow_menu_box_<?php echo $id_user; ?>" class="item_menuu_normal "  STYLE="width:70px;padding-left:4px;"  onClick="view_follow('<?php echo $id_panel; ?>','<?php echo $id_user; ?>')" ><span style="font-size:14px;"><b><?php echo $num_following; ?></b></span><br><span style="font-size:10px;">FOLLOWING</span></li>



<li id="followers_menu_box_<?php echo $id_user; ?>" class="item_menuu_normal "  STYLE="width:70px;padding-left:4px;" onClick="view_followers('<?php echo $fb_id_user; ?>','<?php echo $id_user; ?>')" ><span style="font-size:14px;"><b><?php echo $num_followers; ?></b></span><br><span style="font-size:10px;">FOLLOWERS</span></li>

</ul>



  

<input type="hidden" value="<?php echo $num_posts; ?>" id="input_num_posts<?php echo $id_user; ?>">

<input type="hidden" value="<?php echo $num_topics; ?>" id="input_num_conversations<?php echo $id_user; ?>">

<input type="hidden" value="<?php echo $num_following; ?>" id="input_num_following<?php echo $id_user; ?>">

<input type="hidden" value="<?php echo $num_followers; ?>" id="input_num_followers<?php echo $id_user; ?>">





<script>

	

view_user_panels('<?php echo $id_panel; ?>','<?php echo $id_user; ?>')	

	

</script>



		

<div id="box_user_<?php echo $id_user; ?>" style="position:relative;left:0;float:left; padding:4px;padding-left:8px;width:310px;height:220px;padding-top:8px;background:#fff;">  



 </div> <!-- fin box_user-->





 <div align="center"  id="box_sharer_<?php echo $url_user; ?>"  style="width:95%;border-top:1px solid #ddd;padding:4px;padding-bottom:4px;padding-top:4px;display:inline-block; ">



 



  <div id="field_url_obj_<?php echo $id_user; ?>" style="display:none;">URL: <input type="text" value="<?php echo $full_url_panel; ?>" class="texto_10 " style="color:#999999;border:1px solid #c8c8c8;padding:2px;width:245px;margin:3px;"></div>

 

 

 <span class="texto_10 gris">Share:</span><br>



                                                                       

<a href="javascript:void_()" target="_blank" style="color:#999999;font-size:10px;height:20px;" class="button2"  onClick="show_share('<?php echo $id_user; ?>')" title="View link" ><img src="img/ico_sh_link.png" border="0"></a>







<script>function fbs_click() {u='<?php echo $full_url_panel; ?>';t='<?php echo $name_user; ?>';window.open('http://www.facebook.com/sharer.php?u='+encodeURIComponent(u)+'&t='+encodeURIComponent(t),'sharer','toolbar=0,status=0,width=626,height=436');return false;}</script><a href="http://www.facebook.com/share.php?u=<url>" onclick="return fbs_click()" target="_blank" class="button2"  title="Share on Facebook" ><img src="img/ico_sh_facebook.png" border="0"></a>

<a href="http://twitter.com/home?status=Reading: <?php echo $name_user; ?> at @myfiveby more... <?php echo $full_url_panel; ?>" title="Click to share this post on Twitter" target="_blank" class="button2"  title="Share on Twitter" ><img src="img/ico_sh_twitter.png" border="0"></a>

<a href="http://www.linkedin.com/shareArticle?mini=true&url=<?php echo $full_url_panel; ?>&title=<?php echo $name_user; ?>&source=myfiveby.com" target="_blank" class="button2"  title="Share on Linkedin" ><img src="img/ico_sh_linkedin.png" border="0" ></a>

 

 

<a href="  javascript:(    function(){var w=480;var h=380;var x=Number((window.screen.width-w)/2);var y=Number((window.screen.height-h)/2);window.open('https://plusone.google.com/_/+1/confirm?hl=en&url='+encodeURIComponent(location.href)+'&title='+encodeURIComponent(document.title),'','width='+w+',height='+h+',left='+x+',top='+y+',scrollbars=no');})();" class="button2"   title="Share on Google+" ><img src="img/ico_sh_gplus.png" border="0"></a>

 

 </div>





 </div>  <!-- fin ¿? --> 



 </div>  <!-- content_user  --> 

 

  </div>  <!-- fin caja_frases --> 

 

<?php

/*

  <a href="javascript:void_()" onClick="expand_user_content('<?php echo $id_user;  ? >')"><div style="postition:relative;margin:0px;padding:0px;height:36px;width:100%;background:transparent url('img/bottom_user_box.png') no-repeat top center;"> </div></a>

*/

 

}  // end num rows



?>