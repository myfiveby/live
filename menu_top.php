 
<script>
$(function() {
$("#querytext").keyup(function(e) {
  
	if(e.keyCode == 13) {
		 do_search();
	}
	

});
 

$("#bot_newpanel_top").hover(
function(){ 
			$("#bot_newpanel").toggle().fadeOut('slow');
			
			$("#item_menu_crear_post").toggle().fadeIn('slow');
			
			$("#item_menu_crear_conv").toggle().fadeIn('slow');


},
function(){ 
			$("#bot_newpanel").toggle().fadeIn('slow');
			
			$("#item_menu_crear_post").toggle().fadeOut('slow');
			
			$("#item_menu_crear_conv").toggle().fadeOut('slow');


}

);



});



function do_search(){
 
 var querytext= $("#querytext").val(); 
 
 
 if (querytext ==""){
	
$("#querytext").animate( {opacity: 0.1},400 ).animate( {opacity: 1}, 100 );
	
	} else {
 
$("#caja_search_box").remove();

   var randomnumber=Math.floor(Math.random()*10);
   var randomnumbert=Math.floor(Math.random()*10);

$.ajax({
   data:  { "querytext":querytext},
   url:   'search.php',
   type:  'post',
   beforeSend: function () {
 
   
   
   $("#escenario").prepend('<div id="caja_search_box"  > <div class="tit_box" style=" height:30px;"><div  style="display:inline-block;float:right; height:20px;padding:4px;padding-top:0px; "><a href="javascript:void_()" class=" button white small bigrounded" onClick="close_box(\'caja_search_box\')"><b>x</b></a></div><div style="display:inline-block;float:left;height:25px;padding:4px;padding-left:4px;"  class=" tit_col_box "><img src="img/ico_search_min.png"   alt="Search" align="absmiddle"> Search </div></div><div align="center" id="search_results"  style="width:100%;height:300px;"  ><br><br><br> <img src=\"img/loader.gif\">  <span style="width:100%;text-align:center;font-size:22px;padding-top:30px;    text-shadow: #fff 1px 1px 1px;color:#ccc;font-family:Satisfy, cursive; ">Just a second</span> ...</div></div>');
  
   },
   error: function(response) { alert(response + " error!"); },
   success:  function (response) {
  $("#search_results").html(response);
 
} 


 
  }); // end ajax 





}


}





</script>
<?php 


// $num_paginas = count($_SESSION['uaccounts']['data']);



   
    if (!empty($_SESSION['id'])  ){?>
    
<div  id ="head_completed">  

               


<div  id ="head">  
<div  id ="logo" >
<a href="index.php" title="myFIVEby.com"><img src="/img/logo_myfiveby.png" border="0" alt="myFIVEby.com" ></a>
</div>


<?php
/* $num_char_username = strlen(['username']);
if ($num_char_username >=20 ){  $end_username="";} */?>


<div id="caja_search" style="display:inline-block;width:221px;position:relative;top:2px;padding:0px;background: transparent url('img/search_bar.png') top center;float:left;" >
 <input type="text" id="querytext" style=" outline: none;position:relative;border:0px solid transparent;background:transparent;padding:3px;margin:0px;margin-left:-2px;padding-left:12px;top:-4px;width:160px; " placeholder="Search" value=""><div class="item_bot_search " style="position:relative;top:4px;margin-left:18px;width:25px;cursor:pointer;border:0px solid #fff;"  onClick="do_search()"  ></div></a> 
 </div> 
     				 <script>
				 
				 

function crear_new_conversation() {  
  $("#box_new_conversation").remove();
 
	$.ajax({
   data:  {"id_user":'<?php echo $_SESSION['id']; ?>'},
   url:   'create_new_conversation.php',
   type:  'post',
   beforeSend: function () {
	   
   $("#escenario").append('<div id="thread_prev0" class="thread thread_drag"  style="height:120px;position:absolute;left:50%;top:20%;z-index:20001;"><div id="caja_frases" style="height:35px;width:150px;"><img src=\"img/loader.gif\"> <span style="width:100%;text-align:center;font-size:18px;padding-top:30px;    text-shadow: #fff 1px 1px 1px;color:#333;font-family:Satisfy, cursive; "> Just a second</span>  </div></div>');  
   
    $('#thread_prev0').topZIndex();

   },
   success:  function (response) {
   
    $("#escenario").append('<div id="box_new_conversation" style="display:none;" ></div>');
 
    $('#thread_prev0').remove();
   
   var randomnumber  = Math.floor(Math.random()*20);
   var randomnumbert = Math.floor(Math.random()*5);

$('#box_new_conversation').fadeIn(200);
    
  $('#box_new_conversation').animate({left:'+='+randomnumber+'%', opacity:1},500);
 
    
   $("#box_new_conversation").html(response);
 
    // $("#scroll_list_panels"+thread).append(response); 
    
   $('#box_new_conversation').topZIndex();

   }  
  }); // end ajax 
  



}
				 
				 

function crear_a_panel_post() { 
var $prev_new_panel = $("#box_new_panel");
if ($prev_new_panel.parent().length) {   }
else { $("#box_new_panel").fadeOut().remove(); }



  $("#escenario").append('<div id="panel_prev0" class="panel panel_drag"  style="border:0px solid #fff;height:120px;position:absolute;left:50%;top:30%;z-index:20001;"><div id="caja_frases" style="height:35px;width:150px;"><img src=\"img/loader.gif\"> <span style="width:100%;text-align:center;font-size:18px;padding-top:30px;    text-shadow: #fff 1px 1px 1px;color:#333;font-family:Satisfy, cursive; "> Just a second</span>   </div></div>');    
    

    $('#panel_prev0').topZIndex();
    
    
	$.ajax({
   data:  {"id_user":'<?php echo $_SESSION['id']; ?>'},
   url:   'crear_a_panel_post.php',
   type:  'post',
   beforeSend: function () {

    $("#escenario").append('<div id="box_new_panel"    ></div>');
 	   

   },
   success:  function (response) {

    $('#panel_prev0').remove();
       
    $("#escenario").append('<div id="box_new_panel" style="display:none;" ></div>');
   $("#box_new_panel").html(response);

   

   $('#panel_0').topZIndex();

 
  var randomnumber  = Math.floor(Math.random()*20);
   var randomnumbert = Math.floor(Math.random()*20);

//$('#box_new_panel').fadeIn(500);
    
  $('#box_new_panel').animate({left:'+='+randomnumber+'%',top:'+='+randomnumbert+'%', opacity:1},2000);
    
    
    

   }  
  }); // end ajax 
  



}
				 </script>
				 
																																									 <!--  -->
                         
                              
                             <div id="bot_newpanel_top"  style="width:450px;position:absolute;top:3px;left:40%;z_index:9500;border:0px solid #fff;">
    	 <div  style="top:-5px;width:100px; cursor:pointer;display:inline-block;border:0px solid #fff;line-height:12px; text-shadow:0px 1px 1px #333;"  onClick="crear_a_panel_post('<?php echo $_SESSION['id'];?>');"  class="item_menu_crear texto_14 blanco shine texto" >  <span class="texto_10" style="padding:0px;color:#fff;text-shadow:1px 1px 1px #cea9a6;">Create a</span> 
     <br><b>New Post</b> </div>
														
     	 <div    style="top:0px;width:5px;display:inline-block;border:0px solid #fff; " ><img src="img/barra_separa.png" ></div>     
                            
                            	<div   style="top:-5px;width:100px; cursor:pointer;display:inline-block;border:0px solid #fff;line-height:12px; text-shadow:1px 1px 2px #333;" onClick="crear_new_conversation('<?php echo $_SESSION['id'];?>');" class="item_menu_crear  texto_14 blanco "  ><span class="texto_10"  style="padding:0px;color:#fff;text-shadow:0px 1px 1px #cea9a6;">Start a</span> <br> <b>Conversation</b></div>																						 

   </div>
                                                        
                                                        
              
              
              
              
                                                        
<div style="position:relative;display:inline-block;float:right;right:5px;top:5px;">
<img src="img/barra_separa.png" >&nbsp;<a href="javascript:void_()" onClick="show_settings()"  ><div class="item_menu_top " id="bot_settings" align="center"><img src="img/ico_settings_top.png" alt="Settings" id="img_settings"></div></a>&nbsp;<img src="img/barra_separa.png" >&nbsp;<a href="exit.php"  class=" item_menu_top"  id=""   ><img src="img/ico_nexit_top.png" ></a></div> 


       <?php
			 
			 if ( !empty($_SESSION['uaccounts']['data'])  ){
			 
			  ?>
<div style="position:relative;display:inline-block;float:right;right:5px;top:5px;"  >
<img src="img/barra_separa.png" >&nbsp;<a href="javascript:void_()" onClick="show_fbpages_menu()"  ><div class="item_menu_top " id="bot_settings" align="center"><img src="img/ico_arrow_pages.png" alt="Your pages on Facebook" id="img_fbpages"></div></a></div> 
<?php } ?>


<div id="caja_user_datos" valign="middle" style="float:right;padding-right:15px;">

<div id="image_user_top" ><a href="javascript:void_()" class="texto    "  onclick="show_user('<?php echo $_SESSION['fb_id']; ?>');"   title="<?php echo $_SESSION['username']; ?>"><img src="https://graph.facebook.com/<?php echo $_SESSION['fb_id']; ?>/picture" width="22" align="absmiddle" alt="<?php echo $_SESSION['username']; ?>" ></a></div>
<a href="javascript:void_()" class="texto  shine  " style="position:relative;top:0px;padding-top:15px;"  onclick="show_user('<?php echo $_SESSION['fb_id']; ?>');"   title="<?php echo $_SESSION['username']; ?>"><span style="position:relative;top:8px;padding-top:15px;color:#eee;font-size:12px;" class=" shine "> <strong><?php echo $_SESSION['username'];?></strong></span></a></div>
 
<!--
<script>
	
	
$(function() {

$("#caja_user_datos").hover(
	function(){
		 
		$("#user_over_box").fadeIn(100);
		

 $.ajax({ 
 url:   'fonction/function_show_user_over.php',
 type:  'post',
 beforeSend: function (response) {
   $("#user_over_box").html("<div style=\"width:100%;padding-top:30px;\" align=\"center\"><img src=\"img/loader.gif\"> Loading...</div>"); 

 },
 success:  function (response) {
 $("#user_over_box").html(response); 

 }
 }); 
	
	},	function(){
		 
		$("#user_over_box").fadeOut(100);
		
		
	}
	
	);


});



	
</script>
-->
</div><div id="user_over_box" style="display:none;position:fixed;float:right;right:0;top:40px;z-index: 11;display:none;height:50px;width:40px;"> </div>
 
</div>
<?php } ?>








<?php
/* ****************************************************** 


   no user session

*/

 
    if (empty($_SESSION['id'])  AND !empty($_GET['u']) ){?>
    
<div  id ="head_completed">  

<div  id ="head">  
<div  id ="logo">
<a href="index.php" title="myfiveby.com"><img src="/img/logo_myfiveby.png" border="0" alt="myfiveby.com" ></a>
</div>

<div id="caja_search" style="display:inline-block;width:321px;position:relative;top:0px;height:35px;padding:0px;background: transparent url('img/search_bar.png') no-repeat top left;float:left;" >
 <input type="text" id="querytext" style=" outline: none;position:relative;border:0px;background:transparent;padding:0px;margin:0px;margin-left:10px;padding-left:0px;top:10px;width:170px;float:left; " placeholder="Search" value=""><div class="item_bot_search " style="background:transparent;position:relative;top:5px;margin-left:0;width:25px;cursor:pointer;float:left;"  onClick="do_search()"  ></div></a> 
 </div> 
     			
 
 
</div>
</div>
<?php } ?>
 