<?php if (!session_id() || session_id()==""){
	session_start();
} if (!empty($_SESSION['id'])){ 
//**********************************************************************************************

require ('conf/sangchaud.php');

require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php');
require('fonction/fonction_formato_fecha.php');

$connexion = Connexion ($login_base, $password_base, $base,$host_base);


$consulta_user_datos = Requete ("SELECT *  FROM users  WHERE id_user  = '$_SESSION[id]'  $extra_clause " , $connexion);
 


$datos_user = mysqli_fetch_array($consulta_user_datos) ;

$id_user = $datos_user['id_user'];
$name_user = $datos_user['name_user'];
$fb_id_user = $datos_user['fb_id'];
$url_user = $datos_user['url_user'];
$bio_user = $datos_user['bio'];
  $bio_user = substr($bio_user,0,200);



$notif_start_followed = $datos_user['notif_start_followed'];

$notif_conversation_created = $datos_user['notif_conversation_created'];

$notif_are_fav = $datos_user['notif_are_fav'];

$notif_universal = $datos_user['notif_universal'];
$notif_comment = $datos_user['notif_comment'];
$notif_contribute_mytopic = $datos_user['notif_contribute_mytopic'];
$modif_url = $datos_user['modif_url'];


$location = $datos_user['location'];
$website = $datos_user['website'];?>

<script type="text/javascript" src="js/jquery.wordcount.js"></script>
 
	
	
	

<style>





.js .checkbox{ display:none; }

.toggle{ background:url('toggle.png') bottom left; display:block; width:70px; height:22px; }

.toggle.checked{ background-position:top left; }

#box_settings_base{ width: 600px;}



ul.tabs_settings {width:600px; margin:0; padding:0; padding-top:5px;   margin-left:0px;}

ul.tabs_settings li {  cursor:pointer;margin:0px;padding:0px;padding-top:10px;font-size:12px;
text-align:center;width:93px;display:inline-block; height:30px;
border-bottom:4px solid #a1a1a1;}

ul.tabs_settings li a:hover { background-color:#fff; color:#19a5da; }

ul.tabs_settings li a { display:block; float:left; padding:0px; font-size:12px; background-color:#fff	;
color:#333; text-decoration:none;

}

.selected  { color:#19a5da; border-bottom:4px solid #19a5da;}

.tabscontenido { clear:both; padding:5px; height:200px;}
 .defaulttab li{ background-color:#fff;color:#19a5da;}




    .cb-enable, .cb-disable, .cb-enable span, .cb-disable span { border:0px;background: url(img/switch.gif) repeat-x; display: block; float: left;  }
    .cb-enable span, .cb-disable span { line-height: 15px; display: block; background-repeat: no-repeat; font-weight: bold; }
    .cb-enable span { background-position: left -45px; padding: 0 8px; }
    .cb-disable span { background-position: right -90px;padding: 0 8px; }
    .cb-disable.selected { background-position: 0 -15px; }
    .cb-disable.selected span { background-position: right -105px; color: #fff; }
    .cb-enable.selected { background-position: 0 -30px; }
    .cb-enable.selected span { background-position: left -75px; color: #fff; }
    .switch label { cursor: pointer; }
    .switch input { display: none; }
    
    .switch p {  border:0px; }
															 
    .field {  border-bottom:0px; }



</style>



 <script type="text/javascript" >
function show_tab_set(obje) {

$(".tabscontenido").hide();

$("#"+obje).fadeIn(300);


    var que =  obje;
 

$('.tabs_settings li  ').css("color","#333333");

$('.tabs_settings li  ').css("borderColor","#a1a1a1"); 



$('#t_'+que).css("color","#19a5da"); 

$('#t_'+que).css("borderColor","#19a5da"); 



$('#boton_save_settings').hide();




if(que == "box_settings_base" ) { $("#boton_save_settings").show(); }

if(que == "box_account" ) { $("#boton_save_settings").show(); }

if(que == "box_notifications" ) { $("#boton_save_settings").show(); }
 



}  
$(document).ready( function(){
     

          
$("#perso_description").charCount({
    allowed: 200,		
    warning: 20,
    counterText: ''	
});


    $(".cb-enable").click(function(){
        var parent = $(this).parents('.switch');
        $('.cb-disable',parent).removeClass('selected');
        $(this).addClass('selected');
        $('.checkbox',parent).attr('checked', true);
    });
    $(".cb-disable").click(function(){
        var parent = $(this).parents('.switch');
        $('.cb-enable',parent).removeClass('selected');
        $(this).addClass('selected');
        $('.checkbox',parent).attr('checked', false);
    });



/*
$('.tabs_settings  li').click(function(){
    switch_tabs_settings($(this));
    var que = 	$(this).attr("id");  alert(que);
$('.tabs_settings li  ').css("color","#333333");
$('.tabs_settings li  ').css("borderColor","#a1a1a1"); 

$('#'+que).css("color","#19a5da"); 
$('#'+que).css("borderColor","#19a5da"); 

$('#boton_save_settings').hide();


if(que == "t1" ) { $("#boton_save_settings").show(); }
if(que == "t11" ) { $("#boton_save_settings").show(); }

if(que == "t2" ) { $("#boton_save_settings").show(); }

   });*/

	  

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

/*

function switch_tabs_settings(obje) {
    $('.tabscontenido').hide();
    $('.tabs_settings  ').removeClass("selected");
    var id =obje.attr("rel");
 // obj.css("border-bottom","4px solid #19a5da");
$('#scrollbars').lionbars();
$('#'+id).show();

obje.addClass("selected");

} 


//switch_tabs_settings('t11');

*/
/*    *******************************************************************    */

											
function modif_setings(autor,autorr){

var descript = $("#perso_description").val();

var perso_email = $("#perso_email").val();
 var perso_url = $("#perso_url").val();

var location = $("#location").val();

var website = $("#website").val();

var perso_name = $("#perso_name").val();




var checkeado2=$("#field2").attr("checked"); if(checkeado2) {var field2=1;} else {var field2=0;}
 

var checkeado3=$("#field3").attr("checked"); if(checkeado3) {var field3=1;} else {var field3=0;}

var checkeado4=$("#field4").attr("checked"); if(checkeado4) {var field4=1;} else {var field4=0;}
var checkeado5=$("#field5").attr("checked"); if(checkeado5) {var field5=1;} else {var field5=0;}
var checkeado6=$("#field6").attr("checked"); if(checkeado6) {var field6=1;} else {var field6=0;}


	if (!perso_email){
	
		alert("Email is needed. Thank you.");
	
	} else {
		
		
		
		$.ajax({ 
			data:  { 
				"perso_url":perso_url,
				"autor":autor,
				"perso_name":perso_name,
				"location":location, 
				"website":website, 
				"perso_email":perso_email, 
				"autorr":autorr, 
				"field2":field2,
				"field3":field3, 
				"field4":field4,
				"field5":field5,
				"field6":field6, 
				"bio":descript
			},
			url:   'action_guarda_settings.php',
			type: 'post', 
			beforeSend: function () {
				$("#boton_save_settings").html('Wait ...');
			},
			error: function(response) {
				alert(response + " error!");
			},
			success:  function (response) {
				$("#boton_save_settings").delay(5000).html('Saved!'); 
			}
		}); // end ajax
	 
	}  // end email true


} 


</script>


<div class="tit_box"  style=" height:29px;">

<div  style="display:inline-block;float:right; height:20px;padding:4px;padding-top:0px;margin-top:1px; "> <a href="javascript:void_()" class=" button white small bigrounded"
onClick="close_settings('settings_prev')"><b>x</b></a></div>
<div id="" style="display:inline-block;float:left;height:25px;padding:4px;padding-left:4px;" class="tit_col_box"><img src="img/ico_settings_top.png"  align="absmiddle"><b>Settings</b>
<div style="font-size:12px;display:inline-block;margin-left:15px;font-weight:normal;"><a href="javascript:void_()" onclick="open_tour();"  class="texto_12 negro">Open Tour</a></div>
</div>

</div>
<ul class="tabs_settings">

<li id="t_box_settings_base" onclick="show_tab_set('box_settings_base')" rel="box_settings_base" class="defaulttab" style="border-bottom:4px solid #19a5da;">Profile</li>    
<li id="t_box_account"  onclick="show_tab_set('box_account')"  rel="box_account">Account</li>  
<li id="t_box_notifications" onclick="show_tab_set('box_notifications')" rel="box_notifications">Notifications</li>
<li id="t_box_connections" onclick="show_tab_set('box_connections')" rel="box_connections">Connections</li>   
<li id="t_box_developers" onclick="show_tab_set('box_developers')" rel="box_developers">Developers</li>    
<li id="t_box_upgrade" onclick="show_tab_set('box_upgrade')" rel="box_upgrade">Labs</li>
</ul>



<div id="box_settings_base" class="tabscontenido"   align="center">
 
		<?php
		
			
		$query = mysqli_query($connexion,"SELECT id_user,email,url_user,bio,name_user FROM users WHERE   id_user = '$_SESSION[id]'");
		$result = mysqli_fetch_array($query);
				
 
 			$_POST['id_user'] = $result['id_user']; 
 			$_POST['email_user'] = $result['email']; 
 			$_POST['name_user'] = $result['name_user']; 
 			$_POST['url_user'] = $result['url_user']; 
 			$_POST['bio_user'] = $result['bio'];
                        
                        $_SESSION['username'] = $_POST['name_user'] ;
                        
                        $_SESSION['email_user'] = $_POST['email_user'] ;
                        
		 ?>
 
		
 		

<table width="100%" cellpadding="10" cellspacing="10" class="texto_14">
<!--
 
<tr>

<td  align="right"   width="80" >Name:</td> <td colspan="2" class="texto_14 gris">
<input type="text"

name="perso_name" id="perso_name"   style="margin-right:-10px; border:1px solid #ddd;width:280px;padding-right:0px;padding:2px;height:25px;-webkit-border-radius: .3em;-moz-border-radius: .3em;border-radius: .3em;" class=" texto_14 azul" value="<?php echo $_POST['name_user']; ?>">
</td>
</tr>

 -->

<tr>



<td  align="right"   width="80" >Profile:</td> <td colspan="2" class="texto_14 gris">www.myfiveby.com/ <input type="text"
name="perso_url" id="perso_url"   style="margin-right:-10px; border:1px solid #ddd;width:230px;padding-right:0px;padding:2px;height:25px;-webkit-border-radius: .3em;-moz-border-radius: .3em;border-radius: .3em;" class=" texto_14 azul" value="<?php echo $_POST['url_user']; ?>"><div id="status" class=" texto_12" style="margin-left:12px;display:inline-block;"></div>  </td> </tr>





<tr> <td  align="right"  valign="top">Bio:<br>

</td> <td  colspan="2" ><textarea
name="perso_description" id="perso_description" style="width:420px;height:70px;border:1px solid #dddddd;-webkit-border-radius: .3em;-moz-border-radius: .3em;border-radius: .3em;resize: none; " maxlength="200" class="texto_12 gris" ><?php echo $_POST['bio_user'];
?></textarea>
	 
	 <br>
	<div style="padding-top:5px;float:left;margin-right:5px; text-align:center;" class="texto_11 gris">Chars. left: <div id="box_chars_left" class="texto_14 gris"  style=" display:inline-block;text-align:center;"  ></div></div>

</td>

</tr>



</table>


</div>   <!--  end box settings base -->
			
<div id="box_account" class="tabscontenido"  style="display:none;"  align="center">
					 
 		
<table width="100%" cellpadding="10" cellspacing="10" class="texto_14">
 
<tr> <td     width="80"  align="right">Email:</td> <td  colspan="2" class="texto_16 azul"><span
class="texto_11 gris"><!--Would you like to receive notifications for this Profile? If so, please
provide an email address:--></span> <input type="email" name="perso_email" id="perso_email"
style="margin-right:-10px;border:0px; border:1px solid #ddd;width:350px;padding-right:0px;padding:1px;height:23px;-webkit-border-radius: .3em;-moz-border-radius: .3em;border-radius: .3em;" class="
texto_13 gris" value="<?php echo $_POST['email_user'] ?>" placeholder="Your email address.">  </td>
</tr> 
 



<tr> <td  align="right" >Location:<br>



</td> <td  colspan="2" >
 <input type="text" name="location" id="location"

style="margin-right:-10px;border:0px; border:1px solid #ddd;width:350px;padding-right:0px;padding:1px;height:23px;-webkit-border-radius: .3em;-moz-border-radius: .3em;border-radius: .3em;" class="

texto_13 gris" value="<?php echo $location; ?>" placeholder="Your location.">  


</td>



</tr> 




<tr> <td  align="right"  >Website:<br>



</td> <td  colspan="2" >
 <input type="text" name="website" id="website" style="margin-right:-10px;border:0px; border:1px solid #ddd;width:350px;padding-right:0px;padding:1px;height:23px;-webkit-border-radius: .3em;-moz-border-radius: .3em;border-radius: .3em;" class="texto_13 gris" value="<?php echo $website; ?>" placeholder="Your website.">
</td></tr>
 </table>
<div style="padding:1px;margin:0; margin-left: 35px;cursor:pointer; z-index:200;float:left;">
<a href="javascript:void_()" class=" texto_11 azul " onclick="show_delete_account()"  id="boton_delete_account">Delete my account</a>


<span id="sure_delete" style="padding:1px;margin:0; cursor:pointer; z-index:200; display:none;">
<a href="javascript:void_()" class=" texto_11 rojo " onclick="delete_account('<?php echo $_SESSION['id'];?>','<?php echo $_SESSION['fb_id'];?>')"  id="boton_delete_account"><u>Yes, delete my account</u></a></span>

</div>


</div>







<div id="box_connections" class="tabscontenido"  style="display:none;"   valign="top"  > 
 
<!--
<div style="text-align:left;width:294px;height:260px;float:left;border-right:1px solid #eee;">
<div id="box_settings_twitterconn" style="height:260px;text-align:left;width:280px;float:left;">
<?php //include("tw_connection/connect_twitter.php"); ?>
</div>
 </div>-->
 
<div style="text-align:left;width:580px;float:left;"> 
<div  id="box_settings_rssconn" style="height:270px;text-align:left;width:100%;float:left;">
<?php include("xml_connection/connect_rss.php"); ?>
</div>
</div>




</div>
 
<div id="box_developers" class="tabscontenido"  style="display:none;"  align="center">

<div style="padding-top:40px;text-align:center;font-size:14px;color:#999;"><br>If you would like to build tools or applications that work with myFIVEby, or you have a specific suggestion or request, please email engage@myfiveby.com.</div>
</div>


<div id="box_upgrade" class="tabscontenido"  style="display:none;"  align="center">

<div style="padding-top:40px;text-align:center;font-size:14px;color:#999;"><br>Coming soon</div>
</div>


<div id="box_delete" class="tabscontenido"  style="display:none;"  align="center">



</div>   <!--  end box settings base -->

		 
<div id="box_notifications" style="display:none;"  class="tabscontenido">
 
			 <br>
<table width="400" cellpadding="2" cellspacing="2" class="texto_12 " style="margin-left:90px;" align="center">

<tr><td  colspan="2" align="left"><span class="texto_14 negro" >Receive a notification when somebody:</span></td> </tr>

<tr> <td width="40" align="right" valign="top">






 
			 <p class="field switch">
    <label class="cb-enable   <?php if ( $notif_start_followed ==  1 ){ echo "  selected ";}?>"><span>&nbsp;</span></label>
    <label class="cb-disable  <?php if ( $notif_start_followed == 0 ){ echo " selected ";}?>"><span>&nbsp;</span></label>
<input type="checkbox"   class="checkbox" name="field2" value="<?php echo
$notif_start_followed;?>" id="field2" <?php if ( $notif_start_followed ==1 ){ echo "checked";}?> />
</p>


</td> <td align="left"  width="360" valign="bottom" class="gris">Follows me.</td> </tr>

						<!--
<tr> <td  valign="top">

 

 			 <p class="field switch">
    <label class="cb-enable   <?php if ( $notif_conversation_created ==  1 ){ echo "  selected ";}?>"><span>&nbsp; </span></label>
    <label class="cb-disable  <?php if ( $notif_conversation_created == 0 ){ echo " selected ";}?>"><span>&nbsp; </span></label>
<input type="checkbox"   class="checkbox" name="field3" value="<?php echo
$notif_conversation_created;?>" id="field3" <?php if ( $notif_conversation_created ==1 ){ echo "checked";}?> />
</p>




</td> <td align="left" valign="bottom">A conversation is created with one of my panels.</td> </tr>
				 -->
<tr> <td  valign="top">
 

 			 <p class="field switch">
    <label class="cb-enable   <?php if ( $notif_are_fav ==  1 ){ echo "  selected ";}?>"><span>&nbsp; </span></label>
    <label class="cb-disable  <?php if ( $notif_are_fav == 0 ){ echo " selected ";}?>"><span>&nbsp; </span></label>
<input type="checkbox"  class="checkbox" name="field4" value="<?php echo
$notif_are_fav;?>" id="field4" <?php if ( $notif_are_fav ==1 ){ echo "checked";}?> />
</p>

</td> <td align="left" valign="bottom" class="gris">Marks one of my posts as a favorite.</td> </tr>

<tr> <td  valign="top">
  			 <p class="field switch">
    <label class="cb-enable   <?php if ( $notif_comment ==  1 ){ echo "  selected ";}?>"><span>&nbsp; </span></label>
    <label class="cb-disable  <?php if ( $notif_comment == 0 ){ echo " selected ";}?>"><span>&nbsp; </span></label>
<input type="checkbox"   class="checkbox" name="field5" value="<?php echo
$notif_comment;?>" id="field5" <?php if ( $notif_comment ==1 ){ echo "checked";}?> />
</p>

</td> <td align="left" valign="bottom" class="gris">Comments on one of my posts.</td> </tr>
<tr> <td  valign="top" ><p class="field switch">
    <label class="cb-enable   <?php if ( $notif_contribute_mytopic ==  1 ){ echo "  selected ";}?>"><span>&nbsp; </span></label>
    <label class="cb-disable  <?php if ( $notif_contribute_mytopic == 0 ){ echo " selected ";}?>"><span>&nbsp; </span></label>
<input type="checkbox"   class="checkbox" name="field6" value="<?php echo
$notnotif_contribute_mytopicif_comment;?>" id="field6" <?php if ( $notif_contribute_mytopic ==1 ){ echo "checked";}?> />
</p>
</td> <td align="left" valign="bottom" class="gris">Contributes to a conversation I started</td> </tr>




<tr> <td  valign="top">

 



 			 <p class="field switch">

    <label class="cb-enable   <?php if ( $notif_universal ==  1 ){ echo "  selected ";}?>"><span>&nbsp; </span></label>

    <label class="cb-disable  <?php if ( $notif_universal == 0 ){ echo " selected ";}?>"><span>&nbsp; </span></label>

<input type="checkbox"  class="checkbox" name="field7" value="<?php echo

$notif_universal;?>" id="field7" <?php if ( $notif_universal ==1 ){ echo "checked";}?> />

</p>


</td> <td align="left" valign="bottom" class="gris">Universal conversation is added.</td> </tr>


</table>

</div>


<div id="box_connections" style="display:none;"  class="tabscontenido"></div>
<div style="clear:both;position:relative;left:0;width:450px; margin:0px;margin-right:0px;float:right;pading:10px;padding-top:20px;padding-right:20px;text-align:right; ">

<a href="javascript:void_()" class="button blue medium blanco" onclick="modif_setings('<?php echo $_SESSION['id'];?>','<?php echo $_SESSION['fb_id'];?>')"  id="boton_save_settings" style="clear:both;position:relative;left:0;width:50px; margin:0px;margin-right:0px;float:right; ">Save</a>
 
</div>
 




<?php } ?>