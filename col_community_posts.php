<?php 
if (!session_id() || session_id()==""){
	session_start();
}
$extra_clause="";
if (!empty($_SESSION['id'])){
require ('conf/sangchaud.php');

require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php');
require ('fonction/fonction_formato_fecha.php');
require ('fonction/time_ago.php');
 $connexion = Connexion ($login_base, $password_base, $base, $host_base);

?>
 <script type="text/javascript">
	
		
 
 
 function look_updates_feed (user){
   
 
  //action_look_activity_new.php
  
  
	var from_idfeed = $("#fromfeed_id").val(); 
  
	var from_ids_user= $("#fromfeed_ids").val();

$.ajax({ 
 data:  { "user":user,"from_idfeed":from_idfeed,"from_ids_user":from_ids_user },
   url:    'action_look_posts_new.php',
  type:  'post',

   success:  function (response) {
var s_post_ex = "";
		if (response>1)var s_post_ex = "s";
   $("#scrollcolfeed_newupdates").html(""+response+" new post"+s_post_ex);
   
   if (response > 0)$("#scrollcolfeed_newupdates").fadeIn(500);
   
   
 }  

  }); // end ajax  

   
  
 }
 
 
</script>




<div  style="width:100%;margin:0px;left:0;margin-top:0px;float:left;text-align:left;" align="left"  class="box_results_feed">
<div id="scrollcolfeed_newupdates" style="display:none;cursor:pointer;padding:10px;width:220px;text-align:center; border-bottom:1px solid #ddd; background: #eee;margin-bottom:10px;margin-left:5px;text-shadow:1px 1px 1px #ffffff;font-weight:bold;" class="texto_11 gris"  onClick="select_menu_post_top_item('posts_community')"></div>
<?php
		  
$query_friends = mysqli_query($connexion,"SELECT id_user_to_follow  FROM follow  WHERE  id_user_f='".$_SESSION['id']."' "  );

		    	 $id_your_friends=Array('2');
		 
$num_friends=mysqli_num_rows($query_friends);
		 while ($your_friends = mysqli_fetch_array($query_friends)){
		 
		 
		 $id_your_friends []= $your_friends['id_user_to_follow'];
		 
		 }
		 
 	 $ids = join(',',$id_your_friends);   
 	if ($num_friends > 0  ){

			 
	$query_new_panel_imf = mysqli_query($connexion,"SELECT id_myf,title,autor,loves,f_creado,privacy FROM  myfive_panels WHERE autor IN ($ids) AND  privacy = '0' ORDER BY f_creado DESC LIMIT 0,50");
$cont=1;

$num_posts_feed=mysqli_num_rows($query_new_panel_imf);

 	if ($num_posts_feed !== 0  ){


  while($result_panel = mysqli_fetch_array($query_new_panel_imf)){		
		
if ($cont == 1){
		 
$id_feed = $result_panel['id_myf'];

		
		
}
	

  

$id_myf = $result_panel['id_myf'];
$titulo_panel = $result_panel['title'];
$autor_panel = $result_panel['autor'];
$loves = $result_panel['loves'];
$privacy_post = $result_panel['privacy'];
														
		$f_creado =  $result_panel['f_creado'] ;



if (($privacy_post == 0) OR ( $privacy_post == 1  AND $autor_panel == $_SESSION['id'])){


$consulta_user_datos = Requete ("SELECT id_user,name_user,fb_id  FROM users  WHERE id_user  = '$autor_panel'  $extra_clause " , $connexion);
$datos_user = mysqli_fetch_array($consulta_user_datos) ;
$id_user = $datos_user['id_user'];
$name_user = $datos_user['name_user'];
$fb_id_user = $datos_user['fb_id'];

	 	/*$fb_id_user="";
	$name_user=""; 
	$id_post="";  
	$title=""; 
	$loves="";
	$f_creado="";  */
	
	$title=$titulo_panel;                                    
$f_creado = time_ago($f_creado);
 
 if (!empty($titulo_panel)){
 include ("templates/template_item_post.php");
 }
 
 } // if privacy$cont++;
 } // end while
 
 
 
 }    else {
 
 echo "<div class=\"texto_13 gris  \" style=\"margin:0 auto;text-align:center;width:79%;\"><br><br><br><br>When you follow someone,<br>the posts they publish will appear here.</div>";

   }
 }

?>

</div>

 
<?php

 
 }
 

?> 
<input id="fromfeed_id" type="hidden" value="<?php echo $id_feed; ?>">
<input id="fromfeed_ids" type="hidden" value="<?php echo $ids; ?>">





 	<script type="text/javascript">
  
$(function() {
 setInterval("look_updates_feed('<?php echo $_SESSION['id'] ?>')",10000);
});


	
	 
$().ready(function(){
 
  $('#scrollcolpost').sbscroller();
  
	}); // end ready

 
 
	</script>
