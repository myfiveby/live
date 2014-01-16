<?php
if (!session_id() || session_id()==""){
	session_start();
}
 require ('conf/sangchaud.php');
 
require ('fonction/fonction_connexion.php'); 
require ('fonction/fonction_requete.php'); 

 $connexion = Connexion ($login_base, $password_base, $base, $host_base);


$query_num_notif = Requete("SELECT * FROM  notifications   WHERE readit = '1' AND id_user_owner = '".$_SESSION['id']."'    " , $connexion );
$num_notif = mysqli_num_rows($query_num_notif);
 
?>





<script type="text/javascript">
 
 
 
$().ready(function(){
 

 
 $('#feed_content').lionbars();  
		
		 select_menu_feed_item('community');
		 				 
	$("#menu_foot_box a").removeClass("button_mr_active");
 $("#button_menu_feed").addClass("button_mr_active");

		 
		 
	}); // end ready




function select_menu_feed_item(itemf){

$("#menu_feed li").removeClass("item_menu_selected");
$("#menu_feed li").addClass("item_menu_normal");
$("#f_"+itemf).removeClass("item_menu_normal");
$("#f_"+itemf).addClass("item_menu_selected");
 
$("#community_content").hide();

if (itemf == 'community'){var item_incl="col_community_feed";
}
if (itemf == 'history'){var item_incl="col_history";
}
if (itemf == 'notifications'){var item_incl="col_notifications";
}
if (itemf == 'trending'){var item_incl="col_trending";
}

	
$.ajax({ 
   url:   item_incl+'.php',
   type:  'post',
   beforeSend: function () {
   $("#feed_content").html("<div  class=\"texto_18 gris  \" style=\"width:100%;text-align:center;font-size:22px;padding-top:30px;    text-shadow: #fff 1px 1px 1px;color:#ccc;font-family: 'Satisfy', cursive; \"><img src=\"img/loader.gif\"><br>Just a sec</div>");
  
   }, 
   success:  function (response) {
     $("#feed_content").html(response);
  
   }  
  }); // end ajax  
 

}
 
 
<?php if ($num_notif !== 0){ ?>var title = document.title;
$(document).attr('title', '(<?php echo $num_notif; ?>) '+title);
<?php  } ?>


</script>
<style>

#menu_feed ul   {float:left; margin:0px; padding:0px;display:inline-block;}

#menu_feed li { cursor:pointer;margin:0px;padding:0px;padding-top:10px;font-size:12px;text-align:center;width:84px;display:inline-block;border-right:0px solid #ccc;height:30px; }
 

</style>


<div class="tit_box" style=" height:30px;">
<div  style="display:inline-block;float:right; height:20px;padding:4px;padding-top:2px; ">

<!--<a href="javascript:void_()" class=" button white small bigrounded" ><b>O</b></a>-->

<a href="javascript:void_()" class=" button white small bigrounded" onClick="close_box('col_feed')"><b>x</b></a></div>


<div id="" style="display:inline-block;float:left;height:25px;padding:4px;padding-left:4px;" class="tit_col_box">
<b>Activity</b></div>

</div><style>

.badge {
    background:             radial-gradient( center -9px, circle closest-side, white 0, red 26px );
        background:    -moz-radial-gradient( center -9px, circle closest-side, white 0, red 26px );
        background:     -ms-radial-gradient( center -9px, circle closest-side, white 0, red 26px );
        background:      -o-radial-gradient( center -9px, circle closest-side, white 0, red 26px );
        background: -webkit-radial-gradient( center -9px, circle, white 0, red 26px );
    background-color: red;
    border: 3px solid white;
    border-radius: 50%; 
    box-shadow: 1px 1px 1px black;
    color: white;
    font-size:   11px  ;
    height: 15px; /* height + padding-top must equal width */
    padding-top: 3px; /* height + padding-top must equal width */
    text-align: center;
    font-weight:bold;
    width: 15px;
    position:relative;
    top:0px;
    left:0px;
    z-index:2000;
}
 </style>

<div style="width:100%;margin-bottom:4px;" id="menu_feed">
<ul id="menu_feed_top">
<li id="f_community" class="item_menu_selected" onClick="select_menu_feed_item('community')">Community</li>
<li id="f_history" class="item_menu_normal"  onClick="select_menu_feed_item('history')" style="width: 60px;">History</li>
<li id="f_notifications" class="item_menu_normal"    onClick="select_menu_feed_item('notifications')" style="width:105px;">Notifications <div  style="display:inline-block;font-size:10px;" id="box_notif_colfeed"><?php if ($num_notif !==0) {?>(<?php echo $num_notif; ?>)<?php } ?></div> </li>
</ul>

</div>
 
 
 <div id="feed_content"  style="width:258px;height:92%;"></div> 
 

</div>