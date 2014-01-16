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
$("#button_menu_universal").addClass("button_mr_active");

 

	}); // end ready



function select_menu_universal_top_item(itemf){



$("#menu_universal_top li").removeClass("item_menu_selected");

$("#menu_universal_top li").addClass("item_menu_normal");

$("#f_"+itemf).removeClass("item_menu_normal");

$("#f_"+itemf).addClass("item_menu_selected");





$("#scrollcoluniversal").hide();



if (itemf == 'universal_fav'){var item_incl="col_fav";   }



if (itemf == 'conv_featured'){var item_incl="col_trend_universal"; }



if (itemf == 'universal_community'){var item_incl="col_community_universal"; }



	

$.ajax({ 

   url:   item_incl+'.php',

   

   type:  'universal',

   

   beforeSend: function () {

                               

$("#scrollcoluniversal").show();

   $("#scrollcoluniversal").html('<div align="center"  style="width:300px;"  ><br><br><img src=\"img/loader.gif\">  Loading ...</div>');

  

   },

   

   error: function(response) { alert(response + " error!"); },

   

   success:  function (response) {

                   

$("#scrollcoluniversal").show();





     $("#scrollcoluniversal").html(response);

  

   }  

  }); // end ajax  







}

 

 

					 









</script>

<style>



#menu_universal_top    {float:left; margin:0px; padding:0px;display:inline-block;}



#menu_universal_top  li { cursor:pointer;margin:0px;padding:0px;padding-top:10px;font-size:12px;text-align:center;width:84px;display:inline-block;border-right:0px solid #ccc;height:30px; }



		

</style>



<div class="tit_box" style=" height:30px;">



<div  style="display:inline-block;float:right; height:20px;padding:4px;padding-top:2px; ">



<a href="javascript:void_()" class=" button white small bigrounded" onClick="close_box('col_feed')"><b>x</b></a>



</div>





<div id="" style="display:inline-block;float:left;height:25px;padding:4px;padding-left:4px;text-shadow:1px 1px 1px #ffffff;" class="tit_col_box">

<b>Universal Conversations</b></div>



</div>


 



<div id="scrollcoluniversal" style="margin-top:0px;width:260px;height:100%;"> 




<?php  include("col_community_universal.php");?>

  </div> 