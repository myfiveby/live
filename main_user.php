   <noscript>
    <style>
      /**
       * Reinstate scrolling for non-JS clients
       * 
       * You coud do this in a regular stylesheet, but be aware that
       * even in JS-enabled clients the browser scrollbars may be visible
       * briefly until JS kicks in. This is especially noticeable in IE.
       * Wrapping these rules in a noscript tag ensures that never happens.
       */
      .tse-scrollable {
        overflow-y: scroll;   cursor:pointer;
      }
      .tse-scrollable.horizontal {
        overflow-x: scroll;
        overflow-y: hidden;   cursor:pointer;
      }
      
      /**
 * TrackpadScrollEmulator
 * Version: 1.0
 * Author: Jonathan Nicol @f6design
 * https://github.com/jnicol/trackpad-scroll-emulator
 */
 .tse-scrollable {
  position: relative;
  width: 200px; /* Default value. Overwite this if you want. */
  height: 300px; /* Default value. Overwite this if you want. */
  overflow: hidden;   cursor:pointer;
  }
  .tse-scrollable .tse-scroll-content {
    overflow: hidden;
    overflow-y: scroll;   cursor:pointer;
    }
    .tse-scrollable .tse-scroll-content::-webkit-scrollbar,
    .tse-scrollable .tse-scroll-content::scrollbar {
      width: 0;   cursor:pointer;
      }
.tse-scrollbar {
  z-index: 99;
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  width: 11px;
  
    cursor:pointer;
  }
  .tse-scrollbar .drag-handle {
    position: absolute;
    right: 2px;
    -webkit-border-radius: 7px;
    -moz-border-radius: 7px;
    border-radius: 7px;
    min-height: 10px;
    width: 7px;
    opacity: 0;
    -webkit-transition: opacity 0.2s linear;
    -moz-transition: opacity 0.2s linear;
    -o-transition: opacity 0.2s linear;
    -ms-transition: opacity 0.2s linear;
    transition: opacity 0.2s linear;
    background: #6c6e71;
    -webkit-background-clip: padding-box;
    -moz-background-clip: padding;
    
    cursor:pointer;
    }
  .tse-scrollbar:hover .drag-handle {
    /* When hovered, remove all transitions from drag handle */
    opacity: 0.7;
    -webkit-transition: opacity 0 linear;
    -moz-transition: opacity 0 linear;
    -o-transition: opacity 0 linear;
    -ms-transition: opacity 0 linear;
    transition: opacity 0 linear;
    
    cursor:pointer;
    }
    .tse-scrollbar .drag-handle.visible {
     
    cursor:pointer;
      opacity: 0.7;
      }
/* Horizontal scroller */
.tse-scrollable.horizontal .tse-scroll-content {
  overflow-x: scroll;
  overflow-y: hidden;
  }
  .tse-scrollable.horizontal .tse-scroll-content::-webkit-scrollbar,
  .tse-scrollable.horizontal .tse-scroll-content::scrollbar {
    width: auto;
    height: 0;
    }
.tse-scrollable.horizontal .tse-scrollbar {
  top: auto;
  left: 0;
  width: auto;
  height: 11px;
  }
  .tse-scrollable.horizontal .tse-scrollbar .drag-handle {
    right: auto;
    top: 2px;
    height: 7px;
    min-height: 0;
    min-width: 10px;
    width: auto;
    
    cursor:pointer;
    
    
    }
    
  .drag-handle {    cursor:pointer;}
    
    </style>
  </noscript>
  
  <!--
     <script src="http://f6design.com/projects/trackpad-scroll-emulator/js/jquery.trackpad-scroll-emulator-1.0.min.js"></script>
-->
  
<SCRIPT type="text/javascript" src="js/trackpad_scroll_em.js"></SCRIPT>
  
  
  

<SCRIPT type="text/javascript" src="js/popup/js/alertbox.js"></SCRIPT>

<LINK rel="stylesheet" type="text/css" media="all" href="js/popup/js/style.css">
 
<script  type="text/javascript" language="javascript">




function largestZindex(element) {

    var allObjects = $(element);

    var allObjectsArray = $.makeArray(allObjects);

    var zIndexArray = [0];

    var largestZindex = 0;

    for (var i = 0; i < allObjectsArray.length; i++) {

          var zIndex = $(allObjectsArray[i]).css('z-index');

          zIndexArray.push(zIndex);

    }

    var largestZindex = Math.max.apply(Math, zIndexArray);

    return largestZindex;

};





		

 	
 
 
 function look_updates_notif (user){
 

$.ajax({ 
 data:  { "user":user },
   url:    'action_look_notif_new.php',
  type:  'post',

   success:  function (response) { 
		if (response>1){
		    
   $("#box_notif_colfeed").html("("+response+") ");

   var old_title = "";
   var old_title = sessionStorage.title;

 var text_notif_extra =" ";

	 text_notif_extra = $("#box_notif_colfeed").text();
	 
	 
	 var title_old = old_title;
	 
	 var titele_new = old_title.replace(text_notif_extra,' ');

	var old_title = ' myfiveby - Create, Converse, Share';
	 
	 var titele_new = '('+response+')  '+old_title;
	 
         $(document).attr('title', titele_new); 
	 
 

 
//var title = '<?php echo $_SESSION['username']." at myFIVEby - Create, converse, share." ?>';
		}
   if (response > 0)$("#box_notif_colfeed").fadeIn(500);
   
   
 }  

  }); // end ajax  

   
  
 }
 
 

	$(function() { 
 	$( ".panel" ).draggable({  cursor: "move", stack:"div", scrollSensitivity:1,containment: "#escenario" , handle:".tit_box", opacity: 1  }); 	}); 

 

var currentRotation=null;



function checkOrientAndLocation(){

	if(currentRotation != window.orientation){

		setOrientation();

	}

}



function setOrientation(){

	switch(window.orientation){

		case 0:

			orient = 'portrait';

			break;

		case 90:

			orient = 'landscape';

			break;

		case -90:

			orient = 'landscape';

			break;

			 

	}

	currentRotation = window.orientation;

	document.body.setAttribute("orient",orient);

	setTimeout(scrollTo,0,0,1);

}



$().ready(function(){











	setInterval(checkOrientAndLocation,1000);

	$('.panel').touch({

		animate: false,

		sticky: true,

		dragx: true,

		dragy: true,

		rotate: true,

		resort: true,

		scale: true

	});

	

	}); // end ready







	</script>



<?php

 

 

if (!empty($_SESSION['id'])){

 

 $follow_arr = Array();

		$cont=0;

$query_friends = mysqli_query($connexion,"SELECT id_to_follow,name_user, id_user FROM follow LEFT JOIN users ON fb_id = id_to_follow WHERE  id_user_f='$_SESSION[id]' ORDER BY name_user"  ); 

 

 while($lista_amigos_view = mysqli_fetch_array($query_friends)){

		$id_user_f = $lista_amigos_view['id_to_follow'];

		$name_user =  $lista_amigos_view['name_user'] ;

		$id_user =  $lista_amigos_view['id_user'] ;

		

		

		$follow_arr[$cont]= "($id_user,$name_user,$id_user_f)" ;

		$cont++;

		

	//	echo $id_user_f."<br /><br />";

		

 }



} // end SESSION[id]





//print_r($follow_arr);



?>

<?php 



if( empty($_SESSION['background_user'])){ $_SESSION['background_user']="005.jpg";}

		if(!empty($_SESSION['background_user'])){?>

 

 <style>

/*#escenario{*/

body{

background :#f1f1f1 url('img/bg/<?php echo $_SESSION['background_user']; ?>')  center ;



        -webkit-background-size: cover;

        -moz-background-size: cover;

        -o-background-size: cover;

        background-size: cover; 

				 

background-attachment:fixed;

background-repeat: repeat;

 }



</style>

   

<?php

}

?>



      

    	     <div id="fb-root" style="position:absolute;top:0;left:0;"></div>

 

<div  id ="escenario" >

 

								

<div id="col_fbpages"   style="display:none;" ><?php include("col_fbpages.php");  ?></div> 



<div id="user_over_box"   style="display:none;" ><?php include("fonction/function_show_user_over.php");  ?></div> 









<div id="right_col_col" style="width:265px;height:97%;">

<?php

if (!empty($_SESSION['id'])){  ?>



<div id="col_lat_right_d" style="display:none;"><?php /*include("col_posts.php");*/  ?></div> 



<div id="col_conversations_d" style="display:none;"><?php /*include("col_conversations.php");*/  ?></div> 



<div id="col_feed"  style="display:none;width:260px;height:84%;"><?php include("col_feed.php");  ?></div> 









 

<?php

$comprueba_exists_fix = Requete ("SELECT  id_panel_fix,autor_fix FROM fix_panel  WHERE autor_fix  = '$_SESSION[id]'  " , $connexion);



while($datos_fix = mysqli_fetch_array($comprueba_exists_fix)){



$id_panel_fix = $datos_fix['id_panel_fix'];



?>

 <script  type="text/javascript" language="javascript">

show_panel_main('<?php echo $id_panel_fix; ?>');

</script>

<?php

  }





 } else {

 

 

 ?>

<div id="col_feed">





<?php 

include('fb_login/lib/db.php');

require 'fb_login/lib/facebook.php';

require 'fb_login/lib/fbconfig.php';

// Connection...

$user = $facebook->getUser();

if ($user)

{



$logoutUrl = $facebook->getLogoutUrl();

try {

$userdata = $facebook->api('/me');

} catch (FacebookApiException $e) {

error_log($e);

$user = null;

}

$_SESSION['facebook']=$_SESSION;

$_SESSION['userdata'] = $userdata;

$_SESSION['logout'] =  $logoutUrl;

?>

<script>

 window.location="action_guarda_datosuser.php";

</script>

<?php

}else

{ 

$loginUrl = $facebook->getLoginUrl(array('scope' => 'email'));//<div class="button blue big">Login</div>

echo '<div style=\"width:100%;text-align:center;\"><a href="https://www.facebook.com/dialog/oauth?client_id=set_up_your_own_facebook_key&redirect_uri=http%3A%2F%2F'.$_SERVER['SERVER_NAME'].'%2Findex.php&state=5ebfd7460a8d334921a16cfbfd70183a&scope=email,manage_pages,user_about_me" ><img src="img/fb_connect_small.png" border="0"></a></div>';



/*

<a href="javascript:void_()" rel="tipster" title="Using Facebook Connect is a <b>fast</b>, <b>simple</b> and <b>secure</b> method of accessing myFIVEby.<br><br >No activity is posted back to Facebook and it does not affect your Time Line!"><img src="img/ico_about_fblogin.png" border="0"></a>	

*/

 }



 

 

 

 

?> 

<div style="padding:15px;padding-top:0px;width:90%; text-align: center;" class="texto_12 gris">myFIVEby is the simplest place to write and share. Connect or sign-up through Facebook for free today! <br><br>


</div>   

<?php include("col_offline.php"); ?>      



<?php 

 

 } ?>





</div>





  

 

 



</div>

 

  <div id="menu_foot"  >

  

  <div id="box_selector_bg"   style="height:24px;-webkit-border-radius: .4em;-moz-border-radius: .4em;border-radius: .4em;width:20px;cursor:pointer;float:left;margin:0px;margin-left:10px;margin-top:5px;margin-left:10px;padding:5px;padding-top:6px;padding-bottom:0px;background:transparent url('img/barra_menu_background.png') no-repeat top center;display:inline-block;"><div id="bckg_button" style=""><a href="javascript:void_();" onClick="show_menu_background();" id="img_mini_background"><img src="img/bg/<?php echo $_SESSION['background_user'];?>" height="20" width="20"></a>  </div> <div style="display:none;margin-left:10px;" id="box_others_bckg" ></div></div>

  

  

  



    <div id="box_minimize" style="position:relative;left:20px;float:left;display:inline-block;border: 0px solid #ffffff;height:30px;margin-left:10px; top:2px;padding:2px;margin-top:2px;"></div>

    

   <div id="box_selector_topics"  style=" float:right;margin:0px;margin-left:10px;margin-top:5px;padding:0px;padding-left:0px;padding-top:6px; ">  
 
<?php   
if (!empty($_SESSION['id'])){ 
 
?>


<a href="javascript:void_();" onclick="hide_panels()"  title="Clear Screen"><img src="img/bot_clear_panels.png" alt="Clear Screen"></a>

   

   </div>
   
   <!-- Facebook icon to send to friends-->
   <div id="fb_send_friends_icon"  style="position:relative;float:right;margin:0px; margin-left:10px;margin-top:5px;padding:0px;padding-left:0px; padding-top:6px;"><a href="javascript:void_();" onclick="sendRequestViaMultiFriendSelector()"  title="Share myFIVEby with friends"><img src="img/facebook_share_icon.jpg" style="height: 25px; width: 25px;"></a></div>
 
   
   <!-- facebook icon ends-->
   
   <?php  } ?>

  

 <?php if ( isset($_SESSION['id']) AND $_SESSION['id'] !==""){ ?>   

  <div id="box_selector_topics"  style="position:relative;top:0;height:40px;background:transparent;float:right;margin:0px;padding:5px;padding-left:15px;margin-top:0px;padding-top:3px; ">

  

  <div id="menu_foot_box" style="height:20px;margin-top:0px;padding-top:10px;">

<li><a href="javascript:void_()" id="button_menu_posts"  class="button_mr texto_12  " onClick="show_boxl('col_posts')"  >Posts</a></li>

<li><a href="javascript:void_()" id="button_menu_conversations" class="button_mr texto_12  " onClick="show_boxl('col_conversations')"  >Conversations</a></li>

<li><a href="javascript:void_()" id="button_menu_universal" class="button_mr texto_12  "  onClick="show_boxl('col_universals')"  >Universal</a></li>     

<li><a href="javascript:void_()" id="button_menu_feed" class="button_mr texto_12  " onClick="show_boxl('col_feed')"  >Activity</a></li> 



  </div>

 
 <div id="start_panel"   style="display:none;" align="center">

 <div style="margin:0 auto;  "><?php include("start_page.php"); ?></div>

 </div> 


<?php  }  ?>

       

  

      

  </div>  

  

  </div>  

 <?php

 

if (isset($_GET['u'])){ 
require ('fonction/function_show_obj.php');

show_obj($_GET['u']);

 } // end GET u

  

 

  ?> 


<?php   
if ( $_SESSION['tourm'] == 1){ 
 
?>
  
 

<script  type="text/javascript" language="javascript">

open_tour();


</script>

<?php } ?>

<?php   
if ( $_SESSION['tourm'] == 0){ 
 
?>


<script>

skip_tour();

$("#col_feed").fadeIn(600);
 

$("#col_lat_right").fadeIn(600);

</script>
<?php }

if (isset($_SESSION['id'])){

?>
 	<script type="text/javascript">
  
$(function() {
setInterval("look_updates_notif('<?php echo $_SESSION['id'] ?>')",2000);
});
</script>
	
	
	
	<?php } ?> 
	
<script type="text/javascript">
$('#results_users').sbscroller();  
$('#results_posts').sbscroller();  
$('#results_topics').sbscroller();

window.sessionStorage.title = "<?php echo $_SESSION['username']?>";


$(".drag-handle").css("cursor","pointer");

</script>