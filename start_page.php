<?php
require ('conf/sangchaud.php');
require ('lib/myfiveby.php');
$query = mysqli_query($connexion,"SELECT id_user,email,url_user,bio, fb_id FROM users WHERE   id_user = '$_SESSION[id]'");

		$result = mysqli_fetch_array($query);

		

 			$_POST['id_user'] = $result['id_user']; 

 			$_POST['email_user'] = $result['email']; 

 			$_POST['url_user'] = $result['url_user']; 

 			$_POST['bio_user'] = $result['bio']; 

 			$_POST['fb_id'] = $result['fb_id']; 


		 ?>
    <script src="http://connect.facebook.net/en_US/all.js"></script>
    
<style>
#menu_start {   padding:0px;clear:both; width:290px;margin:0 auto; margin-top:-20px;top:-40px;}

#menu_start ul { padding:0px;clear:both; width:290px;margin:0 auto; }

#menu_start li { cursor:pointer;margin:0px;margin-right:10px;padding:0px;padding-top:1px;font-size:12px;
text-align:left;width:20px;display:inline-block; height:20px;
border-bottom:0px solid #a1a1a1;background: transparent url('img/button_slider.png')no-repeat top center;}
#menu_start li a:hover { background-color:#fff; color:#19a5da; }
#menu_start li a { display:block; float:left; padding:0px; font-size:12px; background-color:#fff;
color:#333; text-decoration:none;
}

.item_start_selected{color:#19a5da; border-bottom:0px solid #19a5da;background: transparent url('img/button_slider_on.png')no-repeat top center;}	
 
.box_steps_tour{
margin-top:0px;
display:none;
height:360px;
margin: 0 auto;
margin-top:0px;
/*background: transparent url('fons_panel.png') repeat-x  top center;*/
}

.col_step_2{
position:relative;
top:0;
margin-top:0px;  
display:inline-block; 
border:0px solid #ccc;  }

.col_step_3{
position:relative;
top:0;
margin-top:0px;
margin-left :15px; 
display:inline-table; 
border:0px solid #ccc; }

</style>

<script type="text/javascript">
$(document).ready(function(){
$("#step_tour_1").show();
	$("#start_menu_1" ).css("background-image","  url(img/button_slide_on.png)").addClass("item_start_selected"); 
	 
 });
 
 function goto_tour(step_to){  				
				
 var actual_step = $("#input_tour_step").val();

 var actual_step = step_to;

$(".box_steps_tour").hide();
	                   
 	$("#menu_start li ").css("borderColor","#a1a1a1");

 	$("#menu_start li ").css("color","#333");
	 
 	$("#menu_start li ").css("background-image","  url(img/button_slider.png)");
 
	$("#start_menu li" ).removeClass("item_start_selected"); 
          
	$("#start_menu_" + actual_step).removeClass("item_start_selected"); 
	$("#start_menu_" + actual_step).addClass("item_start_selected"); 
 	 	$("#start_menu_" + actual_step).css("background-image","  url(img/button_slide_on.png)").addClass("item_start_selected"); 
 
$("#step_tour_" + actual_step).show();
 
    $("#input_tour_step").val(actual_step); 


     if (actual_step == 3){load_step5();}

  //   if (actual_step == 6){load_rss_box();}
   
 if (actual_step == 5){
    actual_step=5;
    
    $("#boton_next").fadeOut(400);
 } else {
    
    
    $("#boton_next").fadeIn(400);
    
 }
 

 if (actual_step == 1){
    actual_step=1;
    
    $("#boton_back").fadeOut(400);
    
    
    
 } else {
    
    
    $("#boton_back").fadeIn(400);
    
 }
 }


function load_step5(){
							  
			var url_user = $("#perso_url").val();
			var description_url = $("#perso_description").val();
			var email_user = $("#perso_email").val();		 
   $.ajax({ 
 url:   'step5_tour.php',
 type:  'post',
 beforeSend: function (response) { 

 $("#box_step_5_prev").html("<div  class=\"texto_18 gris  \" style=\"width:100%;text-align:center;font-size:22px;padding-top:30px;    text-shadow: #fff 1px 1px 1px;color:#999;font-family: 'Satisfy', cursive; \"><img src=\"img/loader.gif\"><br>Just a sec</div>"); 
 },
 success:  function (response) { 
 $("#box_step_5_prev").html(response);
 
 }
 });

}
       
function get_started_5(){
	 skip_tour();
	 show_user_offline('<?php echo $_POST['fb_id'];?>'); 
	}
 
 

 function next_tour(){
				
				
 var actual_step = $("#input_tour_step").val();

 actual_step++;	                   
goto_tour(actual_step);

 
 } 

 function back_tour(){

 
		// alert(actual_step);
 

 var actual_step = $("#input_tour_step").val();

 actual_step--;	                   
goto_tour(actual_step);

 

 }
 
 
 
$(document).ready(function(){

$("#perso_url").keyup(function(event) {
 									 

var n_usr = $(this).val();



var usr = '<?php echo $_SESSION['url_user'];?>';



//alert(usr+"-"+ n_usr);





$("#status").html('');

if(usr.length >= 2)

{

$("#status").html('<img src="img/loader.gif" align="absmiddle">');

    $.ajax({  

    type: "POST",

    data: {"username":n_usr, "current_username":usr},   

    url: "check_username.php",    

    success: function(msg){  

   

   $("#status").ajaxComplete(function(event, request, settings){ 

	if(msg == 'OK')

	{ 

		 

        $("#perso_url").removeClass('object_error'); // if necessary

		$("#perso_url").addClass("object_ok");

 		$(this).html('');

	}  

	else  

	{  

	 

		$("#perso_url").removeClass('object_ok'); // if necessary

		$("#perso_url").addClass("object_error");

		$(this).html(msg);

	}  

   

   });

 } 

   

  }); 

} else {

	$("#perso_url").html('<font color="red">The user name is required.</font>');

	$("#username").removeClass('object_ok'); // if necessary

	$("#username").addClass("object_error");

	}

});



});
 
</script>

	<div id="step_tour_1" class="box_steps_tour" style="width:90%;margin:0 auto;">
            
 <div style="float:left;padding:10px;padding-left:0px;"><img src="img/icon_myfiveby_start.png" width="60" ></div>
 
 <div style="width:450px;float:left;text-align:left;text-shadow: #fff 1px 1px 1px; font-family: 'Satisfy', cursive; font-size:42px;padding-top:15px;"  class="  azul  " >A Great Big Welcome!</div>
 

 <div style="clear:both;"></div>
  <div style="float:left;text-align:left;text-shadow: #fff 1px 1px 1px;   font-size:14px;padding-top:15px;width:100%;"  class="gris"  >Hi <span class="  azul  "><?php echo $_SESSION['username']; ?>,<br></span></div>
  
  
  
	<div style="width:100%;text-align:left;display:inline-block;float:left;   " class="texto_14 gris">     <br>
        
Thanks for joining myFIVEby, a dedicated place for your stories, ideas and experiences!
   <br>   <br>
We've made myFIVEby simple and comfortable to use, enabling you to easily preserve and share the content you create. This short guide provides an intro, but if you have any questions please do contact us at <a href="mailto:engage@myfiveby.com"target="_blank" class="azul">engage@myfiveby.com</a>.

  <br>    
 <br>
<div class="texto_14 gris" style="width:100%;text-align:left;">
Happy posting!<br><br>
<img src="img/signature.png"></div>

											</div>
</div>  <!-- end step_tour_1  -->



 <!-- 

	<div id="step_tour_2" class="box_steps_tour" style="padding:0px;margin:0px;"> 
 <iframe src="http://player.vimeo.com/video/46823270?title=0&amp;byline=0&amp;portrait=0&amp;color=a80a0d&amp;" width="640" height="358" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
</div>  end step_tour_2  -->
 
<!--	
	<div id="step_tour_2" class="box_steps_tour" style="padding:0px;margin:0px;">
	
	 
<img src="img/WP_Image_1.jpg">
</div> 	

	
	<div id="step_tour_3" class="box_steps_tour" style="padding:0px;margin:0px;">
 
<img src="img/WP_Image_3.jpg">
</div> 	
	
	<div id="step_tour_4" class="box_steps_tour" style="padding:0px;margin:0px;">
 
<img src="img/WP_Image_2.jpg">
</div> 	

<!-- 
	<div id="step_tour_3" class="box_steps_tour" style="width:90%;">            
 <div style="float:left;padding:10px;padding-left:0px;"><img src="img/icon_myfiveby_start.png" width="60" ></div>
 
 <div style="width:450px;float:left;text-align:left;text-shadow: #fff 1px 1px 1px; font-family: 'Satisfy', cursive; font-size:42px;padding-top:15px;"  class="  azul  " >Your username</div>
 

 <div style="clear:both;height:65px"> </div>
		
<table width="100%" cellpadding="6" cellspacing="6" class="texto_13">
 
<tr>
    
    
    <td colspan="2" class="texto_18 gris" style="font-size:22px;" align="center">www.myfiveby.com/<span name="perso_url" id="perso_url"   style="  border:0px solid #ddd;width:330px;padding-right:0px;padding:2px;height:35px;-webkit-border-radius: .3em;-moz-border-radius: .3em;border-radius: .3em;font-size:22px;border:none:display:none;" class=" azul" ><b><?php echo $_POST['url_user']; ?></b></span>    </td> </tr>

<tr><td colspan="2" class="texto_14 gris" >
    You can always change this later in Settings
    
    
</td></tr>

 

</table>
</div>  end step_tour_3  -->

 	<!--

	<div id="step_tour_4" class="box_steps_tour" style="width:90%;">
	            
 <div style="float:left;padding:10px;padding-left:0px;"><img src="img/icon_myfiveby_start.png" width="60" ></div>
 
 <div style="width:450px;float:left;text-align:left;text-shadow: #fff 1px 1px 1px; font-family: 'Satisfy', cursive; font-size:42px;padding-top:15px;"  class="  azul  " >Invite your friends</div>
	 

 <div style="clear:both;height:15px"> </div>
 
</div>   end step_tour_4  -->



<!-- Harry attempt -->
<?php
/* create a loop of 9 "interesting" (relatively) users that new users are encouraged to follow to avoid having nothing in their feed.
following the grand tradition of myFIVEby some of this will be a messy hack.
the following data will be used: thumbnail, username, bio (might be a cut-down bio, might be one we make up altogether), and a "subscribe" button.
First create a list of the 9 user's ids:
*/
$follow_these_ids = array(0=>6,1=>118,2=>207,3=>18,4=>8,5=>107,6=>103,7=>10,8=>218);
$hacky_descriptions = array("CEO at myFIVEby, avid photographer.","Whisky fueled thinker and dreamer.","Writer at TechCrunch.","Award winning photographer and writer.","I keep things running smooothly!","Your Social Closet!","Kiva - Loans that change lives.","Computer whisperer at myFIVEby","Trust me. I'm a web developer.");
// userArray is an array of users...
$user_array = getUsersByIds($follow_these_ids);
$follow_buttons_array = getFollowButtons($follow_these_ids);

?>
	<div id="step_tour_2" class="box_steps_tour" style="width:90%;">
	<div style="float:left;padding:10px;padding-left:0px;"><img src="img/icon_myfiveby_start.png" width="60" ></div>
	<div style="width:560px;float:left;text-align:left;text-shadow: #fff 1px 1px 1px; font-family: 'Satisfy', cursive; font-size:42px;padding-top:15px;"  class="  azul  " >People to follow</div>        
	<div id="box_wp">
		<?php
		$hackycounter = 0;
		foreach ($user_array as $this_user) {
		?>
			<div class="person_container_wp">
				<div class="photo_wp">
					<div class="picture_wp ">
						<img src="https://graph.facebook.com/<?php echo ($this_user->get_fb_id()); ?>/picture" width="40" align="absmiddle" alt="<?php echo ($this_user->get_name_user()); ?>" style="-webkit-border-radius: .5em;-moz-border-radius: .5em;	border-radius: .5em;border:0px;">
					</div>
				</div>
				<div class="name_wp"><?php echo ($this_user->get_name_user()); ?></div>
				<div class="description_wp"><?php echo($hacky_descriptions[$hackycounter]); ?></div>
				<div class="button_box_wp">
					<div class="button_wp" id="bot_follow_panel_<?php echo ($this_user->get_fb_id()); ?>"><?php echo($follow_buttons_array[$hackycounter]); ?></div>
				</div>
			</div>
		<?php
			$hackycounter++;
		}
		?>
	</div>
 
    
             
</div>  <!-- end step_tour_5  -->

<!-- End of Harry attempt -->	 
    <div id="step_tour_3" class="box_steps_tour" style="width:90%;">
            
 <div style="float:left;padding:10px;padding-left:0px;"><img src="img/icon_myfiveby_start.png" width="60" ></div>
 
 <div style="width:450px;float:left;text-align:left;text-shadow: #fff 1px 1px 1px; font-family: 'Satisfy', cursive; font-size:42px;padding-top:15px;"  class="  azul  " >Invite your friends</div>
 
 
 <div style="clear:both;height:15px"> </div>
<div id="box_step_5_prev"></div>
    
    
    
    </div>




	    <div id="step_tour_4" class="box_steps_tour" style="width:90%;">
				
				
		
            
 <div style="float:left;padding:10px;padding-left:0px;"><img src="img/icon_myfiveby_start.png" width="60" ></div>
 
 <div style="width:450px;float:left;text-align:left;text-shadow: #fff 1px 1px 1px; font-family: 'Satisfy', cursive; font-size:42px;padding-top:15px;"  class="  azul  " >Connect an existing blog	</div>
	
 

 <div style="clear:both;height:15px"> </div>
<?php include("xml_connection/connect_rss_wp.php"); ?>
			 	
				
                 
     </div>  <!-- end step_tour_7  -->
	

    <div id="step_tour_5" class="box_steps_tour" style="width:90%;">
            
 <div style="text-align:center;padding:0px;padding-left:0px;padding-top:0px;"><img src="img/icon_myfiveby_start.png"  ></div>
        
        
   	<div style="width:100%;text-align:center;display:inline-block;float:left;   " class="texto_13 gris"> 
 
        
        Our aim is to make myFIVEby a truly great place to
    <br> 
    <span class="texto_18 gris" style="font-family: 'Satisfy', cursive; font-size:35px;" >Create, Converse, Share</span>
        
          </div>
        
                
   	<div style="width:190px;text-align:center;height:35px;margin:20px;" class="texto_14   button green medium blanco" onclick="get_started_5()"> 
 <div style="text-shadow: #15637f 1px 1px 1px; font-family: 'Open sans', sans; font-size:25px;padding-top:10px;">Get started!</div>
   </div> 
        
        
                
   	<div style="width:100%;text-align:center;" class="texto_12 gris"> 
 
    </div> 
             
     </div>  <!-- end step_tour_8  -->

<!--
<div style="clear:both;border-top:1px solid #19a5da;margin-bottom:10px;"></div>-->
 
  
<!-- Skip Tour Button

<div style=" position:relative;left:0;width:100px; margin:0px;margin-left:10px;float:left;display:inline; padding-top:0;padding-right:20px;text-align:left; ">
<a href="javascript:void_()" class="texto_11 gris" onclick="skip_tour()"  >Skip tour</a>
</div>-->        
            
            
            <div style=" position:relative;left:0;width:230px; margin:0px;margin-right:0px;float:right;padding:0px;padding-top:0px;padding-right:10px;text-align:right;display:inline; ">


<div style="width:60px;display:inline;">
<a href="javascript:void_()" class="button white medium blanco" onclick="back_tour()" style="display:none;" id="boton_back">Back</a>
</div>



<div style="width:60px;display:inline;">
<a href="javascript:void_()" class="button blue medium blanco" onclick="next_tour()"  id="boton_next">Next</a>

</div>

<input type="hidden" style="width:20px;" value="1" id="input_tour_step">

</div>


 
 <ul id="menu_start" style="position:relative;top:-22px;height: 27px; ">
<li id="start_menu_1" onClick="goto_tour(1)"  class="" ></li>
<li id="start_menu_2" onClick="goto_tour(2)"  class="" ></li>
<li id="start_menu_3" onClick="goto_tour(3)"  class="" ></li>
<li id="start_menu_4" onClick="goto_tour(4)"  class="" ></li>

<li id="start_menu_5" onClick="goto_tour(5)"  class="" ></li>


</ul> 		   