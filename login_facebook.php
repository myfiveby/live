<?php
if (!session_id() || session_id()==""){
	session_start();
}
header("Location: action_guarda_datosuser.php");
 $cache_expire = 60*60*24*365;
 header("Pragma: public");
 header("Cache-Control: max-age=".$cache_expire);
 header('Expires: ' . gmdate('D, d M Y H:i:s', time()+$cache_expire) . ' GMT');


define('FACEBOOK_APP_ID', FB_KEY);
define('FACEBOOK_SECRET', FB_SECRET);

function get_facebook_cookie($app_id, $application_secret) {
  $args = array();
  parse_str(trim($_COOKIE['fbs_' . $app_id], '"'), $args);
  ksort($args);
  $payload = '';
  foreach ($args as $key => $value) {
    if ($key != 'sig') {
      $payload .= $key . '=' . $value;
    }
  }
  if (md5($payload . $application_secret) != $args['sig']) {
    return null;
  }
  return $args;
}
$cookie = get_facebook_cookie(FACEBOOK_APP_ID, FACEBOOK_SECRET);


var_dump($cookie);

?><!DOCTYPE HTML> 
<html xmlns="http://www.w3.org/1999/xhtml"  xmlns:fb="http://www.facebook.com/2008/fbml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />  
<title>myfiveby </title> 
<base href="http://www.sioque.es/myfiveby/" /> 

  <META name="title" content="myfiveby.com "> 
  <META name="author" content="myfiveby.com "> 
  <META name="copyright" content="&copy; myfiveby.com "> 
  <META name="description" content=""> 
  <META name="keywords" content=""> 
  <META name="distribution" CONTENT="Global"> 
  <META NAME="robots" CONTENT="all"> 
   
 
 
<link rel="icon" href="/favicon.ico" type="image/x-icon" /> 
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />  
 
  
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>

<link rel="stylesheet" href="css/myfiveby.css" type="text/css" media="screen" />


    <script src="js/jquery.js"></script>
    
    
    <script src="js/core_myfiveby.js"></script> 
    
    
	<link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
 
    <script src="js/jquery.js"></script>
    <script src="js/core_myfiveby.js"></script> 
    
    
    
    <script src="http://connect.facebook.net/en_US/all.js"></script>
    
    
    
<style>
body{background:#ffffff;}
</style>

  <body>
  
  
  <div  id ="head_completed">  

<div  id ="head">  
<div  id ="logo">
<a href="index.php" title="myfiveby.com"><img src="/img/logo_myfiveby.png"  border="0" alt="myfiveby.com"></a>
</div>
<div id ="menu_top"><a href="#">About</a>&nbsp;&nbsp;&nbsp;<a href="#">Blog</a>&nbsp;&nbsp;<a href="exit.php">Exit</a></div>

</div></div>

<div style="clear:both;"></div>
  
  
  

<div style="clear:both;background:#fff;"  id ="escenario">
  
    <div  style="" ><br><br><br>
    <h2>Select your profile</h2>
   
    <div id="logoff_user_facebook"></div>
      </div>
     <br><br> 
    <div id="fb-root"></div>
  
    <?php   if ($cookie) {
    
    
  //  print_r($cookie);
    
    
     ?>
    
    
    
    <?php
       
require ('conf/sangchaud.php');
require ("fonction/fonction_connexion.php");
require ('fonction/fonction_requete.php');

$connexion = Connexion ($login_base, $password_base, $base, $host_base);
  	 
    
     ?>
    
                     <div id="datos_user_facebook"></div>
                     
                     <div id="fb-root"></div>
                     
    <script src="http://connect.facebook.net/en_US/all.js"></script>
        <script>
      FB.init({appId: '<?= FACEBOOK_APP_ID ?>', status: true,
               cookie: true, xfbml: true,oauth : true});
      FB.Event.subscribe('auth.login', function(response) {
       
 window.location = "https://graph.facebook.com/oauth/authorize?client_id=<?= FACEBOOK_APP_ID ?>&redirect_uri=http://www.sioque.es/myfiveby/login_facebook.php&scope=manage_pages"; 
	  
    
    
     });
    </script>
    <script>
                                            
                    	 function salir_fb(user){
           FB.logout(function(response) {window.location = "http://www.sioque.es/myfiveby/exit.php"; });
          }
                                         
                                            
                                            
                                            
                                            
    function muestra_box_fb_lista(elementfb, acfb, nfb){
    //$('html, body').animate({scrollTop:0}, 'slow');
                $(".lista_acc").css('background-color','#ffffff');
               $("#acc_" +  elementfb).css('background-color','#b2dbf8');
  
    //alert(elementfb +" - "+acfb);
   $.ajax({
   data:  { "idfb":elementfb,   "acct": acfb, "nfb": nfb},
   url:   'action_guarda_datosuser.php',
   type:  'post',
   beforeSend: function () { 
                               $("#box_respuesta").html('<div align="center"  style="width:200px;"  ><br><br><img src="img/indicator.gif"><br><br>Loading...</div>');
 
    $("#val_accesst").val(acfb);
   $("#val_idfb").val(elementfb);  
   },
   error: function(response) { alert(response + " error!"); },
   success:  function (response) {
 
   window.location ="index.php";
   }  
  }); // end ajax 
            
               
               
               
    
                                               //alert(elementfb);
    }
    
    
    
    
    
    
    
    
    
    
    
      FB.init({ appId: '<?= FACEBOOK_APP_ID ?>', 
	    status: true, 
	    cookie: true,
	    xfbml: true,
	    oauth: true});
     
     
     
      FB.getLoginStatus(function(response) {
      
      alert(response.status);
      
  if (response.status !== 'connected') {
  
 
    //  alert("Not logged at Facebook, please reload and login.");
      
   //  window.location ="index.php";
   
  } else {
  
 alert("session!");
  
  	 
 
          
          
            FB.api('/<?php echo $cookie['uid']; ?>/?access_token=<?php echo $cookie['access_token']; ?>', function(data) {


				
		$("#logoff_user_facebook").css("background","#f1f1f1");
 $("#logoff_user_facebook").html("Aren't <b>" + data.name+ "</b> ?   <span class=\"texto_gris_11\" align=\"left\"><a href=\"javascript:salir_fb()\" class=\"texto_gris_11 gris\"><u> Exit and reload </u></a></span>");
  
 $('#datos_user_facebook').prepend('<a href="javascript:void();"  onClick="muestra_box_fb_lista(\'<?php echo $cookie['uid']; ?>\',\'<?php echo $cookie['access_token']; ?>.\', \''+  data.name + '\')"><li class="lista_acc" id="acc_'+ data.id +'"  > <span style="display:inline-block; padding:4px; "></span><img src="https://graph.facebook.com/' + data.id + '/picture" width="50" align="absmiddle"/> <span >' +  data.name + '</span></li></a>'	);
   
        	 });  
 				 
 
            FB.api('/<?php echo $cookie['uid']; ?>/accounts?access_token=<?php echo $cookie['access_token']; ?>', function(response) {
            
            
var entradas_acc = response.data;

if (  entradas_acc.length == 0  ){  


            FB.api('/<?php echo $cookie['uid']; ?>/?access_token=<?php echo $cookie['access_token']; ?>', function(copia_data) {



  muestra_box_fb_lista(copia_data.id,'<?php echo $cookie['access_token']; ?>', copia_data.name);
  });  
  
  
  
   }



for (var x = 0 ; x < entradas_acc.length ; x++) {

if (entradas_acc[x].category !== "Application"){
	$('#datos_user_facebook').append('<a href="javascript:void();"  onClick="muestra_box_fb_lista(\''+ entradas_acc[x].id +'\',\''+  entradas_acc[x].access_token + '\', \''+  entradas_acc[x].name + '\')"><li class="lista_acc" id="acc_'+ entradas_acc[x].id +'"  > <span style="display:inline-block; padding:4px; "></span><img src="https://graph.facebook.com/'+ entradas_acc[x].id +'/picture" width="50" align="absmiddle"/><span style=" "> ' + entradas_acc[x].name + '</span></li></a>'	);
  
                            }  // end if
                            } //end for

 
   
                                           });        // end     FB.api('/me/accounts', function(response 


 

  } 
  
  
  
});
     



     
    </script>
    
      <!-- <img src="https://graph.facebook.com/<?php echo $cookie['uid']; ?>/picture" width="250"/> -->
       
          <?php //echo $cookie['uid']; ?>
 
 
              
<?php   } else {

     
    

echo '<a href="https://graph.facebook.com/oauth/authorize?client_id=216857658359417&redirect_uri=http://www.sioque.es/myfiveby/login_facebook.php&scope=manage_pages"><img src="button_connect_fb.png" border="0"></a> ';


  }  ?>


    

     <ul id="datos_user_facebook"></ul>
    
    <div id="box_respuesta"></div>
    
    
<br><br><br>

</div>
  
  
  </body>
</html>