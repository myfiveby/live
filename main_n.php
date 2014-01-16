 <?php if (empty($_SESSION['id']) AND empty($_GET['u'])){
    $num_bg = rand(1,3);
  ?> 
 
<style>

* {
margin: 0;
}
html, body {
font-family:'Open Sans', sans-serif;
height: 100%;

background: #333 url('img/bg/005.jpg') no-repeat center center fixed;

 -webkit-background-size: cover;
	-moz-background-size: cover;
	-background-size: cover;
	background-size: cover;
} 
li {list-style-type:none;}

a{

text-decoration:none;}


.wrapper {
min-height: 100%;
height: 100%;
height: auto !important; 
margin: 0 auto  ;
width:100%;
}
.footer, .push {
height: 10px; 

}

#middle {
position: absolute;
height: 600px;
width: 980px;
top: 50%;
left: 50%;
margin-top: -300px;
margin-left: -490px;
}

li {list-style-type:none;}


#container_foot{

    width:100%; 
min-width:960px;

    margin:0 auto;

    padding: 0px; 

    height:300px;

background: #333 url('/img/foot.jpg') repeat-x top center;
}

#foot_box{ 

    margin: 0 auto;

    width:96%;

        padding:20px;

        height:150px;

        

     }

#box_social_buttons { width:160px; float:right;right:200px;}

     #box_rackspace_logo { width:160px; float:right;right:0;}

     

     #box_menu_foot {

     margin:0px auto; 
padding-left: 8%;

     font-size:14px;

     color:#f1f1f1;

    }

    

    #box_menu_foot a {

	display: inline-block;

     

     text-align:left;

     font-size:14px;

     color:#f1f1f1;

     padding:4px;

     padding-top:0px;

     margin:2px;

    }

     

     #box_signature{

	

	clear:both;

	margin: 0 auto;

	width:100%;

	text-align:center;

	font-size:10px;

	color:#eee;

	text-shadow: 1px 1px 1px #000;

	padding-top:50px;

     }

     

     

     a.shine{

text-shadow:#000000 1px 1px 1px;color:#fff; 

color:#fff;

}



a.shine:hover{

text-shadow: #dfe3a6 1px 0px 6px;

color:#fff;

text-decoration:none;

}
 
 #connect { 

    text-align:center; 
}



#logo {
    
width: 100%; 
    text-align:center;    
}

#text {
padding-left:25px;
font-size: 38px;
color:#ffffff; 
 height:50px;
font-weight:600;
text-shadow: 1px 1px #333;
letter-spacing: -1px;
line-height:40px; 
text-align:center;
    clear: both;
   margin: auto 0 ;

 }
#text_small {
padding-left:31px;
font-size: 26px; 
font-family: 'Satisfy';
color:#fff; 
 height: 50px; 
text-align:center;
    clear: both;
   margin: auto 0 ; 
 }

#fbnote {
font-size: 11px;
color:#f1f1f1;
}

#box {
    clear: both;
border-radius: 5px;
background: url('img/bckgnd.png')  ;
-webkit-background-size: cover;
-moz-background-size: cover;
-background-size: cover;
border: 1px #666; 
width: 300px;
height: 111px;
margin: auto 0;
}

#home_share_box {
position: fixed;
right: 0;
top: 350px;
height: 124px;
width: 110px;
background-color: rgba(255, 247, 234, 0.7);
border: 1px solid #ffffff;
-webkit-box-shadow: rgba(0, 0, 0, 0.3) 0 0 5px;
-moz-box-shadow: rgba(0,0,0,0.3) 0 0 5px;
box-shadow: rgba(0, 0, 0, 0.3) 0 0 5px;
border-top-left-radius: 5px;
border-bottom-left-radius: 5px;
opacity: 1;
-webkit-transition: opacity 1s;
-moz-transition: opacity 1s;
-o-transition: opacity 1s;
transition: opacity 1s;
}

.home_share_button_box {
position: relative;
height: 31px;
width: 110px;
}

.home_share_button_box_icon {
position: absolute;
padding-top: 5px;
padding-left: 5px;
}




</style> 

<script type="text/javascript" src="//assets.pinterest.com/js/pinit.js"></script>

<div class="wrapper">

<div id="home_share_box">

<div class="home_share_button_box"><div class="home_share_button_box_icon"><iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.myfiveby.com&amp;send=false&amp;layout=button_count&amp;width=100&amp;show_faces=false&amp;font&amp;colorscheme=light&amp;action=like&amp;height=21&amp;appId=set_up_your_own_facebook_key" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe></div></div>
<div class="home_share_button_box"><div class="home_share_button_box_icon"><a href="https://twitter.com/share" class="twitter-share-button" data-url="www.myfiveby.com" data-text="myFIVEby - Create, Converse, Share. Sign up today for free at www.myfiveby.com!" data-via="myfiveby">Tweet</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></div></div>
<div class="home_share_button_box"><div class="home_share_button_box_icon"><div class="g-plus" data-action="share" data-annotation="bubble"></div><script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script></div></div>
<div class="home_share_button_box"><div class="home_share_button_box_icon"><a href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fwww.myfiveby.com&media=http%3A%2F%2Fmyfiveby.com%2Fimg%2Flogo_home_1200.png&description=myFIVEby%20is%20a%20beautiful%2C%20simple%20place%20to%20share%20your%20stories%2C%20ideas%2C%20experiences%20and%20more%2C%20participate%20in%20conversations%20and%20discover%20novel%20content%20from%20the%20community.%20Sign%20up%20for%20free%20today!%20" class="pin-it-button" count-layout="horizontal"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a></div></div>


</div>
<div id="middle">
<div id="logo">
<img src="/img/logo_home_1200.png">
</div>
<div id="text">Dedicated to your Stories, Ideas and Experiences.</div>
<div id="text_small">Blogging, reinvented for thinkers and makers.</div>

<div class="push"></div>
  

   <div class="footer">
<center>   

    
 
    
<div style="border:0px solid #fff;width:100%;text-align:center;height:60px;"> 

    <?php
        
  $users_main = Array(2,8,6,113,98,103,85,10,118,108);  
   $users_main = join(',',$users_main);   
   

$consulta_user_datosmain = Requete ("SELECT id_user,name_user,fb_id,url_user  FROM users  WHERE id_user IN ($users_main)" , $connexion);

while($datos_user_main = mysqli_fetch_array($consulta_user_datosmain) ){

$id_user = $datos_user_main['id_user'];
$name_user = $datos_user_main['name_user'];
$url_user = $datos_user_main['url_user'];
$fb_id_user = $datos_user_main['fb_id'];

echo'

 <a href="http://myfiveby.com/'.$url_user.'" title="'.$name_user.'"><div  style="display:inline;padding:4px;width:40px;"><img src="https://graph.facebook.com/'.$fb_id_user.'/picture" width="40" align="absmiddle" alt="'.$name_user.'" style="-webkit-border-radius: .5em;-moz-border-radius: .5em;border-radius: .5em;border:0px;"></div></a>
';

}

   ?>
</div>

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
<style >
	
.alert_browser{
	background: #333;
	width: 400px;
	border:1px solid #dddddd;
	margin:10px;
	padding:10px;
	}	
	
</style>
<?php

} else

{ 

$loginUrl = $facebook->getLoginUrl(array('scope' => 'email'));//<div class="button blue big">Login</div>

 
if($info_brow['browser_name']   !== "msie"){
	

echo '
    <div id="box">
    
    ';








    
    echo'    
<center>
     <a href="https://www.facebook.com/dialog/oauth?client_id=set_up_your_own_facebook_key&redirect_uri=http%3A%2F%2F'.$_SERVER['SERVER_NAME'].'%2Findex.php&state=5ebfd7460a8d334921a16cfbfd70183b&scope=email,manage_pages,user_about_me" ><img src="img/connect_home.png" border="0"></a><center><div id="fbnote">
We never post back to Facebook</div></center>
</center>';


} else {
	
	
	echo "<div> <div style=\"width: 400px;border:1px solid #dddddd;margin:2px auto;padding:15px;line-height:17px;margin-bottom:90px;\"   class=\"alert_browser button_f white big  texto_14 \" >myFIVEby works best on <a href=\"https://www.google.com/chrome\" target=\"_blank\" alt=\"Update to Google Chrome\" class=\"azul\"><u>Google Chrome</u></a> or <a href=\"http://www.mozilla.org/en-US/firefox/new/\" target=\"_blank\" alt=\"Update to\" class=\"azul\" ><u>Mozilla Firefox</u></a>.<br> To connect, please update your browser to one of these.</div></div>";
	
	
}


/*

<a href="javascript:void_()" rel="tipster" title="Using Facebook Connect is a <b>fast</b>, <b>simple</b> and <b>secure</b> method of accessing myFIVEby.<br><br >No activity is posted back to Facebook and it does not affect your Time Line!"><img src="img/ico_about_fblogin.png" border="0"></a>	

*/

 }



 

 

 

 

?>    

            
    

 </center>

</div>
 </center>

</div>
</div>

<div id="container_foot">

    

    

          

        <div id="foot_box">

            

  
     

            <div id="box_rackspace_logo" style="top:0;margin-top:-15px; padding-left: 15px; padding-right: 8%;">
<img src="/img/rackspace_logo_myfiveby.png" alt="Powered by rackspace HOSTING">
	    </div>

            

            <div id="box_social_buttons" style="top:0;margin-top:-5px;">
      <a href="http://www.soooshial.com/myfiveby" title="soooshial" target="blank" rel="tipster" ><img src="/img/soooshial.png" alt="soooshial"></a>  

                <a href="https://twitter.com/myfiveby" title="Twitter" target="blank" rel="tipster"><img src="/img/twitter.png" alt="Twitter"></a> 

                <a href="https://www.facebook.com/myfiveby" title="Facebook" target="blank" rel="tipster"><img src="/img/facebook.png" alt="Facebook"></a>   



               
            </div><!-- end box_social_buttons div -->

            

           

<div id="box_menu_foot">
<a style="cursor:pointer;" href="about" class="shine"><li>About</li></a>
<a style="cursor:pointer;" href="content" class="shine lista_ul"><li>Content</li></a>
<a style="cursor:pointer;" href="team" class="shine lista_ul"><li>Team</li></a>
<a style="cursor:pointer;" href="brands" class="shine lista_ul"><li>Brands</li></a>
<a style="cursor:pointer;" href="resources" class="shine lista_ul"><li>Resources</li></a>
<a style="cursor:pointer;" href="press" class="shine lista_ul"><li>Press</li></a>
<a style="cursor:pointer;" href="privacy" class="shine lista_ul"><li>Privacy</li></a>
<a style="cursor:pointer;" href="terms"  class="shine lista_ul"><li>Terms</li></a>

</div>   

          <div id="box_signature">&copy; myFIVEby.com - 2012</div>

                 

        </div>  <!-- end foot_box div -->

         

       

    

    </div>
   

    </div>




<?php } else {



include("main_user.php");





}  

?>
 
