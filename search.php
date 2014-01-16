
<?php
if (!session_id() || session_id()==""){
	session_start();
} 
require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php');

require ('fonction/time_ago.php'); 

$connexion = Connexion ($login_base, $password_base, $base, $host_base);
$busqueda = trim($_POST['querytext']);


 //$search_user = Requete ("SELECT id_user,email,name_user,bio,fb_id FROM users WHERE email LIKE '%$busqueda%' OR name_user LIKE '%$busqueda%'  OR bio LIKE '%$busqueda%' " , $connexion);


 

 $search_user = Requete ("SELECT * FROM users  WHERE MATCH (name_user,email,bio) AGAINST ('".$busqueda."')" , $connexion);


 
 $num_user =mysqli_num_rows($search_user);  

 
$search_panels = Requete ("SELECT * FROM myfive_panels INNER JOIN myfive_content ON myfive_content.id_myf = myfive_panels.id_myf WHERE   privacy ='0' AND title LIKE '%$busqueda%'  OR  frase_mf LIKE '%$busqueda%'   	 " , $connexion);
$num_panels =mysqli_num_rows($search_panels);  


$search_thread = Requete ("SELECT * FROM threads  WHERE name_th LIKE '%$busqueda%' '%$busqueda%' " , $connexion);
 $num_thread =mysqli_num_rows($search_thread);  


 
$id_thread_tot = $id_thread; 



?>

 
<script type="text/javascript">

$().ready(function(){
	//$('#content_search').lionbars();
	}); // end ready
	function show_query_box_search(obj_v){
		$(".box_results_part").hide();		
		$("#"+obj_v).fadeIn(200);		
				$('.box_results_part').sbscroller('refresh');
			
$("#menu_search li").removeClass("item_menu_selected");
$("#menu_search li").addClass("item_menu_normal");

 
$("#li_"+obj_v).removeClass("item_menu_normal");	
$("#li_"+obj_v).addClass("item_menu_selected");	
				
				
}



</script>

<style>

.item_users_search{
		margin:0px;
		
}
		
</style>
<ul id="menu_search" class="menu_base" style="width:100%;padding:0px;margin:0px;">

<li class="item_menu_selected" id="li_results_users" onClick="show_query_box_search('results_users')"  style="width: 105px;"><span style="font-size:15px;"><b><?php echo $num_user; ?></b></span><br>People</li>

<li  class="item_menu_normal" id="li_results_posts" onClick="show_query_box_search('results_posts')"  style="width: 105px;"><span style="font-size:15px;"><b><?php echo $num_panels; ?></b></span><br>Posts</li>

<li  class="item_menu_normal" id="li_results_topics" onClick="show_query_box_search('results_topics')"  style="width: 105px;"><span style="font-size:15px;"><b><?php echo $num_thread; ?></b></span><br>Conversations</li>

</ul>


<div id="content_search" style="padding-top:10px;width:320px;height:220px;">

<div id="results_users" style="width:320px;height:240px;display:block;margin:0px;left:0;float:left;text-align:left;" align="left"  class="box_results_part">
<?php

if ($num_user >=1){
 
 while($lista_search_user = mysqli_fetch_array($search_user)){
 
		$name_user =  $lista_search_user['name_user'] ;
		$id_user =  $lista_search_user['id_user'] ;
		$fb_id =  $lista_search_user['fb_id'] ;
		$bio_user =  $lista_search_user['bio'] ;  $bio_user = substr($bio_user,0,200);
		$fb_id_user = $fb_id;
 									
$comprueba_exists_panelsu = Requete ("SELECT title, id_myf FROM myfive_panels  WHERE autor  = '$id_user'  AND privacy ='0'  ORDER BY id_myf DESC" , $connexion);
$num_postsu=mysqli_num_rows($comprueba_exists_panelsu);
  
$query_followers_u = mysqli_query($connexion,"SELECT id_to_follow FROM follow WHERE  id_to_follow='$fb_id'  "  );
$num_followersu=mysqli_num_rows($query_followers_u);
 
		?>
		

<a href="javascript:void_()"; onclick="show_user('<?php echo $fb_id; ?>');"  class=" negro"  style="float:left;" >	
 <div id="image_user" style="float:left; padding:4px;width:40px;"><img src="https://graph.facebook.com/<?php echo $fb_id; ?>/picture" width="40" align="absmiddle" alt="<?php echo ($name_user); ?>" style="-webkit-border-radius: .5em;-moz-border-radius: .5em;	border-radius: .5em;border:0px;">
</div>
</a>	

<a href="javascript:void_()"; onclick="show_user('<?php echo $fb_id; ?>');"  style="float:left;"   >
<div   class="texto_14  "  ><?php echo ($name_user); ?>&nbsp;&nbsp;<div style="float:right;"> <?php include("fonction/action_follow.php"); ?></div>       </a>
<br> <div style="padding-top:0px; " class="texto_12 negro"> 
 	<?php echo $num_followersu; ?> followers   |   <?php echo $num_postsu; ?> posts  
 </div>
 <div style="position:relative; width:250px; float:right;right:4px;padding-top:0px;" class="texto_10 gris">

  <?php echo $bio_user;?> 

  

 </div>
          </div>                                                                                      
					 
<div style="width:310px;clear:both;border-top:1px solid #ddd;margin-top:5px;height:10px;"> </div>
 
		<?php

} 
}       else {

echo '     <div>Sorry, nothing found.</div> ' ;

}

 ?>
</div>


<div id="results_posts" style="width:320px;height:240px;display:none;margin:0px;left:0;float:left;text-align:left;" align="left"  class="box_results_part">
<?php

if ($num_panels >=1){


 
 while($lista_search_panels= mysqli_fetch_array($search_panels)){
 
		$title =  $lista_search_panels['title'] ;
		$id_post =  $lista_search_panels['id_myf'] ;
		$autor =  $lista_search_panels['autor'] ;
		$loves =  $lista_search_panels['loves'] ;
		$f_creado =  $lista_search_panels['f_creado'] ;
		                                                         
$f_creado = time_ago($f_creado);
	
$search_userp = Requete ("SELECT id_user,email,name_user,  fb_id FROM users WHERE id_user='$autor'" , $connexion);

$lista_search_userp = mysqli_fetch_array($search_userp);	 
		$name_user =  $lista_search_userp['name_user'] ;
		$id_user =  $lista_search_userp['id_user'] ;
		$fb_id =  $lista_search_userp['fb_id'] ;  
		$fb_id_user = $fb_id;
		
		?>
		 
<div id="image_user"  style="float:left; padding:4px;width:40px;height:70px;" ><img src="https://graph.facebook.com/<?php echo $fb_id_user;?>/picture" width="40" align="absmiddle" alt="<?php echo $name_user; ?>"  style="-webkit-border-radius: .5em;-moz-border-radius: .5em;	border-radius: .5em;border:0px;"></div>


		
				 
<div style="position:relative; width:210px; float:left;left:0px;padding-top:0px;text-align:left;"  class="texto_10 gris">

<a  href="javascript:void_()" onclick="show_panel_main('<?php echo $id_post; ?>');"  class="texto_13 negro"> <?php echo $title; ?> </a>
 </div>		           
  <div class="texto_10 negro" style="float:left;width:185px;display:inline-block;letter-spacing:0px;padding:0px;padding-top:0px; " > by<a href="javascript:void_()"; onclick="show_user('<?php echo $fb_id; ?>');"   ><?php echo " <span class=\"texto_10 azul\">".($name_user)."</span> </a> <br /><span class=\"texto_10 gris\">&#9638; ".$f_creado; ?></span></div>
   <div id="ico_love_box<?php echo $id_post; ?>" style="margin:0px;display:inline-block;float:right; height:18px;margin-right:15px;"  class="  ico_love_base"> 
<div  class=" negro  "   style="display:inline-block;height:19px;"><?php echo $loves; ?></div> 
</div>
	 
 
<div style="width:305px;clear:both;border-top:1px solid #ddd;margin-top:5px;height:10px;"> </div>
 
		<?php

} 
}           else {

echo '     <div>Sorry, nothing found.</div> ' ;

}

 ?>
</div>


<div id="results_topics" style="width:100%;height:240px;display:none;margin:0px;left:0;float:left;text-align:left;" align="left"  class="box_results_part">
<?php

if ($num_thread >=1){
 
 while($view_search_threads = mysqli_fetch_array($search_thread)){
 
		$name_th =  $view_search_threads['name_th'] ;
		$autort =  $view_search_threads['autor_th'] ;
		$urlt =  $view_search_threads['url_th'] ;
		$id_th =  $view_search_threads['id_th'] ;
		                                 
		$f_creadot =  $view_search_threads['f_th'] ;                      
$f_creadot = time_ago($f_creadot);
	
$search_usert = Requete ("SELECT id_user,email,name_user,fb_id FROM users WHERE id_user='$autort'" , $connexion);

$lista_search_usert = mysqli_fetch_array($search_usert);	 
		$name_usert =  $lista_search_usert['name_user'] ;
		$id_usert =  $lista_search_usert['id_user'] ;
		$fb_idt =  $lista_search_usert['fb_id'] ;  
		$fb_id_usert = $fb_idt;
		
		
$search_rel_posts = Requete ("SELECT id_th FROM rel_threads WHERE rel_threads.id_th='$id_th'" , $connexion);
$num_posts_rel = mysqli_num_rows($search_rel_posts);	 
		
		?>
		 
		 
		 
<div id="image_user"  style="float:left; padding:4px;width:40px;height:70px;" ><img src="https://graph.facebook.com/<?php echo $fb_id_usert;?>/picture" width="40" align="absmiddle" alt="<?php echo $name_usert; ?>"  style="-webkit-border-radius: .5em;-moz-border-radius: .5em;	border-radius: .5em;border:0px;"></div>


		
				 
<div style="position:relative; width:230px; float:left;left:0px;padding-top:0px;text-align:left;"  class="texto_10 gris">

<a  href="javascript:void_()" onclick="show_thread('<?php echo $id_th; ?>');"  class="texto_13 negro"> <?php echo $name_th; ?> </a>
 </div>		           
  <div class="texto_10 negro" style="float:left;width:185px;display:inline-block;letter-spacing:0px;padding:0px;padding-top:0px; " > by<a href="javascript:void_()"; onclick="show_user('<?php echo $fb_id_usert; ?>');"   ><?php echo " <span class=\"texto_10 azul\">".$name_usert."</span> </a> <br /><span class=\"texto_10 gris\"> &#9638;  ".$f_creadot; ?></span></div>
  	

<div id="ico_love_box<?php echo $id_th; ?>" style="float:right; height:18px;"  >
<div  class=" negro  "   style="display:inline-block;height:19px;"><img src="img/ico_post.png" valign="absmiddle"></div>
<div  class=" negro  "   style="display:inline-block;height:19px; text-align:right;"><?php echo $num_posts_rel; ?></div> </div>
 
	 
 
<div style="width:99%;clear:both;border-top:1px solid #ddd;margin-top:5px;height:5px;"> </div>


		<?php

} 
}          else {

echo '     <div>Sorry, nothing found.</div> ' ;

}

 ?>
</div>
</div> 
   <script type="text/javascript"> $('.box_results_part').sbscroller();</script>


