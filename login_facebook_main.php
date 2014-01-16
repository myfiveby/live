

 
 <?php
define('FACEBOOK_APP_ID', '216857658359417');
define('FACEBOOK_SECRET', 'ddfc1370fc9f168858c4b63d7196c5c8');
    
function get_facebook_cookie($app_id, $application_secret) {
  $args = array();
  parse_str(trim($_COOKIE['fbs_' . $app_id], '\\"'), $args);
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
 
  if ($cookie) { 
    
     
    ?>
    
     <div id="fb-root" style="display:inline-block;margin:0px;"></div>
            <div id="c_fb_login" style="display:inline-block;margin:0px;"></div> 
    <script src="http://connect.facebook.net/en_US/all.js"></script>
    
    <script>
                                            
                    	 function salir_fb(user){
           FB.logout(function(response) {window.location = "http://www.sioque.es/myfiveby/exit.php"; });
          }
                  
           //alert(elementfb);
    
    
      FB.init({appId: '<?= FACEBOOK_APP_ID ?>', status: true,
               cookie: true, xfbml: true, oauth : true});
     
      FB.getLoginStatus(function(response) {
      
      
  if (!response.session) {
    //alert("Not logged at Facebook, please reload and login.");
      
      $("#datos_user_facebook").html('<a href="https://graph.facebook.com/oauth/authorize?client_id=<?= FACEBOOK_APP_ID ?>&redirect_uri=http://www.sioque.es/myfiveby/login_facebook.php&scope=manage_pages" style="margin-top:5px;"><img src="button_connect_fb.png"  width="20" border="0"></a>');
      
 } else {
// alert("session!");
      
            FB.api('/<?php echo $cookie['uid']; ?>/?access_token=<?php echo $cookie['access_token']; ?>', function(data) {
 	 
 $('#datos_user_facebook').prepend('<br><br> <a href="javascript:void_();"   onClick="muestra_box_fb_lista(\'<?php echo $cookie['uid']; ?>\',\'<?php echo $cookie['access_token']; ?>.\', \''+  data.name + '\')" class=" texto_16 blanco "  > <img src="https://graph.facebook.com/' + data.id + '/picture" width="80" class="encuadre"/></span >  <br><span class=" texto_16 negro ">' +  data.name + ' <u> <b><?php echo $l_entrar; ?></b></u></a> <br> </span><a href=\"javascript:salir_fb()\" class=\"texto_12 rojo\"><span style="color:#ff0000; ">Exit</span></a> '	); 
  

          
        	 });  
        	 
       }
       
       
       
      	 });  
              </script>    
              
              <?php } else  {  ?> <div  style="display:inline-block;padding-left:0px;margin:0px;">
               <a href="https://graph.facebook.com/oauth/authorize?client_id=<?= FACEBOOK_APP_ID ?>&redirect_uri=http://www.sioque.es/myfiveby/login_facebook.php&scope=manage_pages"><img src="button_connect_fb.png" border="0"></a> 
               </div>
                     
       <?php } ?>
              
              
              
              
                                 <div id="datos_user_facebook" style="display:inline-block;"> </div> 




