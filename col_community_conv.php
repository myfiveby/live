<?php 
if (!session_id() || session_id()==""){
	session_start();
} 
require ('conf/sangchaud.php');
require ("fonction/fonction_connexion.php");
require ("fonction/fonction_requete.php");
require ("fonction/time_ago.php");
 
$connexion = Connexion ($login_base, $password_base, $base, $host_base);

?>
 


<script>


  $('#conversations_bottom').sbscroller();

 
 function look_updates_feed (user){
   
 
  //action_look_activity_new.php
  
  
  
	var from_ids_user= $("#fromfeed_ids").val();
	var from_idfeed = $("#fromfeed_id").val();

$.ajax({ 
 data:  { "user":user,"from_idfeed":from_idfeed, "from_ids_user":from_ids_user },
   url:    'action_look_conversations_new.php',
  type:  'post',

   success:  function (response) {
var s_post_ex = "";

		if (response>1)var s_post_ex = "s";
   $("#scrollcolfeed_newupdates").html(""+response+" new conversation"+s_post_ex);
   
   if (response > 0)$("#scrollcolfeed_newupdates").fadeIn(500);
   
}  

  }); // end ajax  

   
  
 }
 
 

$().ready(function(){

				 

	$("#menu_foot_box a").removeClass("button_mr_active");

 $("#button_menu_conversations").addClass("button_mr_active");


	}); // end ready



	</script>   

<div id="conversations_bottom"  style="width:260px;height:84%;" >

 
<div id="scrollcolfeed_newupdates" style="display:none;cursor:pointer;padding:10px;width:220px;text-align:center; border-bottom:1px solid #ddd; background: #eee;margin-bottom:10px;margin-left:5px;margin-top:5px;text-shadow:1px 1px 1px #ffffff;font-weight:bold;" class="texto_11 gris" onClick="select_menu_conv_top_item('conv_community')"></div>



<?php

 
$query_friends = mysqli_query($connexion,"SELECT id_user_to_follow  FROM follow  WHERE  id_user_f='".$_SESSION['id']."' "  );


		    	 $id_your_friends=Array();

$num_friends=mysqli_num_rows($query_friends);

		 while ($your_friends = mysqli_fetch_array($query_friends)){

		 $id_your_friends []= $your_friends['id_user_to_follow'];

		 

		 }

		 

 	 $ids = join(',',$id_your_friends);   

 	if ($num_friends > 0  ){




$query_new_panel_imf = mysqli_query($connexion,"SELECT * FROM  threads LEFT JOIN users   ON id_user = autor_th  WHERE autor_th IN ($ids)  ORDER BY f_th DESC LIMIT 0,50");
$cont=1;


while($result_panel = mysqli_fetch_array($query_new_panel_imf)){		


		
if ($cont == 1){
		 
$id_feed = $result_panel['id_th'];
 		
}
	



$id_myf = $result_panel['id_th'];

$titulo_panel = $result_panel['name_th'];

$autor_panel = $result_panel['autor'];





$id_user = $result_panel['id_user'];

$name_user = $result_panel['name_user'];

$f_creado = $result_panel['f_th'];

$fb_id_user = $result_panel['fb_id'];





$loves = $result_panel['loves'];

	

$f_creado = time_ago($f_creado);

?>



<div style="width:245px;padding:4px;padding-left:8px;border-bottom:1px solid #eee;margin-bottom:5px;margin-top:5px;" id="item_thread_col_convers_<?php echo $id_myf; ?>"><a href="javascript:void_()" onclick="show_thread('<?php echo $id_myf; ?>')"  class="texto_13 negro "><?php echo $titulo_panel;?></a><br />  



 <div id="image_user" style="float:left; padding:4px;padding-left:0px;width:20px;height:20px;display:inline-block;cursor:pointer;"  ><img src="https://graph.facebook.com/<?php echo $fb_id_user?>/picture" width="20" align="absmiddle" alt="<?php echo $name_user; ?>"></div>



 <div class="texto_10 negro" style="margin-left:0px;width:200px;display:inline-block;letter-spacing:0px;padding:0px;padding-top:0px; " > by<a href="javascript:void_()"; onclick="show_user('<?php echo $fb_id_user; ?>');"   ><?php echo " <span class=\"texto_10 azul\">".$name_user."</span> </a> <br /><span class=\"texto_10 gris\">".$f_creado; ?></span>


   

  <div  class=" negro ico_love_base"   style="float:right;display:inline-block;height:19px;"><?php echo $loves; ?></div> 

 

 </div>

 

</div>

<?php 

$cont++;

 }

 


 }    else {

 

 echo "<div class=\"texto_13 gris  \" style=\"margin:0 auto;text-align:center;width:79%;\"><br><br><br><br>When you follow someone,<br>the conversations they publish will appear here.</div>";

   }






?>

</div>
 
<input id="fromfeed_id" type="hidden" value="<?php echo $id_feed; ?>">

<input id="fromfeed_ids" type="hidden" value="<?php echo $ids; ?>">


 	<script type="text/javascript">
  
$(function() {
 setInterval("look_updates_feed('<?php echo $_SESSION['id'] ?>')",50000);
});
	</script>