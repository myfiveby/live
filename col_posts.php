<?php 
if (!session_id() || session_id()==""){
	session_start();
} 
require ('conf/sangchaud.php');
require ("fonction/fonction_connexion.php");
require ("fonction/fonction_requete.php");

$connexion = Connexion ($login_base, $password_base, $base, $host_base);
?>
<?php include("fonction/functions_myfiveby.php"); ?>
<script type="text/javascript"> 
	$().ready(function(){
  
$("#menu_foot_box a").removeClass("button_mr_active");
 $("#button_menu_posts").addClass("button_mr_active");
 
	}); // end ready
 
					 




</script>
<style>

#menu_post_top    {float:left; margin:0px; padding:0px;display:inline-block;}

#menu_post_top  li { cursor:pointer;margin:0px;padding:0px;padding-top:10px;font-size:12px;text-align:center;width:84px;display:inline-block;border-right:0px solid #ccc;height:30px; }

		
</style>

<div class="tit_box" style=" height:30px;">

<div  style="display:inline-block;float:right; height:20px;padding:4px;padding-top:2px; ">

<a href="javascript:void_()" class=" button white small bigrounded" onClick="close_box('col_feed')"><b>x</b></a>

</div>


<div id="" style="display:inline-block;float:left;height:25px;padding:4px;padding-left:4px;text-shadow:1px 1px 1px #ffffff;" class="tit_col_box">
<b>Posts</b></div>

</div>



							
<div id="menu_posts_box" style="width:100%;text-align:left;margin-bottom:4px;" >
<ul id="menu_post_top">
<li id="f_posts_community" class="item_menu_selected" onClick="select_menu_post_top_item('posts_community')">Community</li>
<li id="f_posts_fav" class="item_menu_normal"  onClick="select_menu_post_top_item('posts_fav')">Favourites</li>
<li id="f_post_featured" class="item_menu_normal"  onClick="select_menu_post_top_item('post_featured')">Discover</li>

</ul>

</div>








<div id="scrollcolpost" style="margin-top:5px;padding:4px;width:250px;height:87%;">

<?php  include("col_community_posts.php");?>
  </div> 