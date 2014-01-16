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

<script type="text/javascript"> 
function select_menu_trend_top_item(itemf){
   
$("#menu_trend_top li").removeClass("item_menu_selected");
$("#menu_trend_top li").addClass("item_menu_normal");
$("#f_"+itemf).removeClass("item_menu_normal");
$("#f_"+itemf).addClass("item_menu_selected");


$("#scrollcolpost").hide();

if (itemf == 'col_trend_posts'){var item_incl="col_trend_posts";   }
if (itemf == 'trend_universal'){var item_incl="col_trend_universal"; }
if (itemf == 'trend_featured'){var item_incl="col_trend_featured"; }

$.ajax({ 
   url:   item_incl+'.php',
   type:  'post',
   beforeSend: function () {
$("#trendersations_bottom").show();
   $("#trendersations_bottom").html("<div  class=\"texto_18 gris  \" style=\"width:100%;text-align:center;font-size:22px;padding-top:30px;    text-shadow: #fff 1px 1px 1px;color:#999;font-family: 'Satisfy', cursive; \"><img src=\"img/loader.gif\"><br>Just a sec</div>");

   },  success:  function (response) {                   
$("#trendersations_bottom").show();
     $("#trendersations_bottom").html(response);
   }  
  }); // end ajax  
}

</script>
<style>
#menu_trend_top    {float:left; margin:0px; padding:0px;display:inline-block;}
#menu_trend_top  li { cursor:pointer;margin:0px;padding:0px;padding-top:10px;font-size:12px;text-align:center;width:84px;display:inline-block;border-right:0px solid #ccc;height:30px; }

</style>
<div class="tit_box" style=" height:30px;border-top:1px solid #ccc;">
<div id="" style="display:inline-block;float:left;height:25px;padding:4px;padding-left:4px;text-shadow:1px 1px 1px #ffffff;" class=" texto_14 azul tit_col_box"><b>Trending</b></div>

</div>

<div id="menu_trend_box" style="width:100%;text-align:left;margin-bottom:4px;" >
<ul id="menu_trend_top">
<li id="f_trend_featured" class="item_menu_selected"     onClick="select_menu_trend_top_item('trend_featured')">Discover</li>
<li id="f_col_trend_posts" class="item_menu_normal" onClick="select_menu_trend_top_item('col_trend_posts')">Trending</li>
<li id="f_trend_universal" class="item_menu_normal" onClick="select_menu_trend_top_item('trend_universal')">Universal</li>


</ul>

</div>

	<script type="text/javascript">
 
  $('#trendersations_bottom').sbscroller();
 
</script>

<div id="trendersations_bottom"  style="width:260px;min-height:100px;height:72%;" >
 </div>






	<script type="text/javascript">
 
  $('#trendersations_bottom').sbscroller('refresh');
  
  
  select_menu_trend_top_item('trend_featured');
 
   
</script>