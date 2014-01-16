<?php
//session_cache_expire(1);
if (!session_id() || session_id()==""){
	session_start();
}
//ini_set("session.cache_expire", 360);
//error_reporting(30719);
require ('conf/sangchaud.php');
require ("fonction/fonction_connexion.php");
require ('fonction/fonction_requete.php');
require ('fonction/fonction_formato_fecha.php');
require ('fonction/fucntion_obj_elements.php');
require ('fonction/googleize.php');

$title = "myFIVEby - Create, Converse, Share";
$cont_array = null;
$fulltxt = "";

$connexion = Connexion ($login_base, $password_base, $base, $host_base);
 
include_once  'detector/client_browser_detection.php';
 

$browser=new clientBrowserDetection(true);

$info_brow = $browser->getBrowserInformation();  

 $title = "myFIVEby";
 $goog_excerpt = "";
 $access_content = "";
 
 if (isset($_GET['state'])){include("login_facebook_.php");}

 if (isset($_GET['u']) AND !empty($_GET["u"])) {

 $title = get_obj_elements($_GET["u"]);
 
 $title.= " - myfiveby.com";
 
 $cont_array = googleize($_GET["u"]);
  
 } else {
 

 
  $title .="";
 }

   if (isset($_SESSION['id'])){ $title =$_SESSION['username']."";
 
 ?>
 <?php
 
 } 

if ($cont_array) {
	$title		= $cont_array["title"];
	$fulltxt	= $cont_array["full-text"];
}
?>

 

<!DOCTYPE HTML> 
<html xmlns="http://www.w3.org/1999/xhtml"  xmlns:fb="http://www.facebook.com/2008/fbml" itemscope itemtype="http://schema.org/">
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  

 
<title><?php //echo $title; ?>myfiveby - Create, Converse, Share</title>   
  <META name="title" content="myfiveby - Create, Converse, Share<?php //echo($title); ?>"> 
  <META name="author" content="myfiveby.com "> 
  <META name="copyright" content="&copy; myfiveby.com "> 
  <META name="description" content="<?php echo(trim(substr(str_replace("&nbsp;"," ",strip_tags($fulltxt)),0,300))); ?>..."> 
  <META name="keywords" content=""> 
  <META name="distribution" CONTENT="Global"> 
  <META NAME="robots" CONTENT="all"> 
   
   
   <!--   meta g+ -->
   <meta itemprop="name" content="myFIVEby - Create, converse, share.   ">
   <meta itemprop="image" content="/img/logo_myfiveby.png">
   
   
 
<meta name="viewport" content="width=320; initial-scale=1.0; minimum-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>
<meta name="apple-touch-fullscreen" content="false" />

<meta name="viewport" content="width=320; initial-scale=1.0; minimum-scale=1.0; maximum-scale=1.0; user-scalable=0;"/>

    <meta name="apple-touch-fullscreen" content="false" />

 
<link rel="icon" href="/favicon.ico" type="image/x-icon" /> 

<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />  
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Anonymous+Pro' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Bitter' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Satisfy' rel='stylesheet' type='text/css'>

																																		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
			<script src="http://code.jquery.com/ui/1.8.20/jquery-ui.min.js" type="text/javascript"></script> 
 
<script type="text/javascript" src="js/jquery.mousewheel.js"></script>

 
<script type="text/javascript" src="js/jquery.touch.js"></script>

<script type="text/javascript" src="js/jquery.tools.min.js"></script> 

<script src="js/core_myfiveby.js"></script> 

 

<script src="js/waypoints.min.js"></script>

	<link href="js/select_browser/css/jquery.reject.css" rel="stylesheet" />
	<script type="text/javascript" src="js/select_browser/js/jquery.reject.js"></script>
	
	
	
<!--<link type="text/css" href="css/cupertino/jquery-ui-1.8.14.custom.css" rel="stylesheet" />	--> 

<script type="text/javascript" src="js/apprise-1.5.min.js"></script>
<link rel="stylesheet" href="js/apprise.min.css" type="text/css" />



<script src="js/jquery.sbscroller.js"></script> 
<link rel="stylesheet" href="js/jquery.sbscroller.css" />

 
 <script type="text/javascript" src="js/jquery.topzindex.min.js"></script>
 

<script type="text/javascript" src="js/jeditable.mini.js"></script>
<script type="text/javascript" >


  $('.scrolledcontent').sbscroller();

/*		
$(function() {
    $(window).focus(function() {
        console.log('Focus');
    });

    $(window).blur(function() {
        console.log('Blur');
    });
}); */
</script>

    <script src="http://connect.facebook.net/en_US/all.js"></script>
    
    <script>
      FB.init({
        appId  : 'set_up_your_own_facebook_key',
        frictionlessRequests: true,
	redirect_uri :'http://<?php echo($_SERVER['SERVER_NAME']); ?>'
      });

      function sendRequestToRecipients() {
        var user_ids = document.getElementsByName("user_ids")[0].value;
        
        FB.ui({method: 'apprequests',
          message: 'Invite friends.',
	redirect_uri :'http://<?php echo($_SERVER['SERVER_NAME']); ?>',
          to: user_ids, 
        }, requestCallback);
      }
      function sendRequestToRecipients5(user_ids) {
        //var user_ids = document.getElementsByName("user_ids")[0].value;
         var user_ids =   user_ids;
         
        FB.ui({method: 'apprequests',
          message: 'Invite friends.',
	redirect_uri :'http://<?php echo($_SERVER['SERVER_NAME']); ?>',
          to: user_ids, 
        }, requestCallback);
      }

      function sendRequestViaMultiFriendSelector() {
        FB.ui({method: 'apprequests',
        	display: 'popup',
          message: 'Invite friends.',
	redirect_uri :'http://<?php echo($_SERVER['SERVER_NAME']); ?>/autoclose.html'
	        }, requestCallback);
			
      }
      
      function requestCallback(response) {
        // Handle callback here
      }
    </script>

<link rel="stylesheet" href="css/myfiveby.css" type="text/css" media="screen" />



<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-33941853-1']);
  _gaq.push(['_setDomainName', 'myfiveby.com']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>

<script>
$(document).ready(function(){
  $(".accessibility").remove();
});
</script>

</head>
<body >
<?php if ($fulltxt && $fulltxt!="") { ?>
<div class="accessibility"><?php echo($fulltxt); ?></div>
<?php }
include("menu_top.php");
?>


<div style="clear:both;"></div>
 
<?php   

if (!isset($_GET['q'])){$_GET['q']=""; } 
           
switch ($_GET['q']){
 
  case '': include("main_n.php"); break; // portada
  case 'panelfb': include("panel_fb.php"); break; // portada
  case 'user': include("user.php"); break; // user
	
}       
                
?>
  
 
 <script type="text/javascript" src="tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
 
 
 
 <script type="text/javascript">
//if( localStorage.id_u )   // alert( localStorage.id_u );
   </script>
							 
  		<link rel="stylesheet" type="text/css" href="js/lionsbar/lionbars.css" />

<script type="text/javascript" src="js/lionsbar/jquery.lionbars.0.3.js"></script>



<script>localStorage['id_u']='<?php echo $_SESSION['id'];?>';</script> 
</body>
</html>

 
