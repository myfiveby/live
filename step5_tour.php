<?php 

require 'conf/sangchaud.php';
require 'fb_login/lib/db.php';
require 'fb_login/lib/facebook.php';
require 'fb_login/lib/fbconfig.php';


define('FACEBOOK_APP_ID', FB_KEY);
define('FACEBOOK_SECRET', FB_SECRET);
 
	// $friends_query = $facebook->api('/me/friends?access_token='.$accessToken.'&limit=5000&offset=0');
	 
	 
  $friendsapp_query =$facebook->api(array('method' => 'friends.getAppUsers'));
	 

	
 if (!function_exists('Requete')) {

 
require ('conf/sangchaud.php');
require ("fonction/fonction_connexion.php");
require ("fonction/fonction_requete.php");

$connexion = Connexion ($login_base, $password_base, $base, $host_base);


      }
 

			 ?>                               

<link rel="stylesheet" type="text/css" href="js/lionsbar/lionbars.css" />

<script type="text/javascript" src="js/lionsbar/jquery.lionbars.0.3.js"></script>
 

 <script type="text/javascript">
$().ready(function(){ 
		$('#scrollfriendsapp').lionbars(); 
	}); // end ready

</script>


 
			 <div style="width:290px;padding-top:10px;height:180px;float:right;text-align:center;cursor:pointer;" valign="middle" align="center" > 
		
			 <img src="img/bot_invite_facebook.png" onclick="sendRequestViaMultiFriendSelector()">
 
									     </div>
												 
			 <div  style="width:300px;height:30px;float:left;text-align:left;margin-left:10px; " valign="top" class="texto_14 gris"> Friends already using myFIVEby: </div>   
			                                                                                      
			 <div id="scrollfriendsapp" style="width:300px;height:200px;float:left;margin-left:10px;" valign="top"> 
			 <?php
 
//var_dump($friendsapp_query);
 
foreach ( $friendsapp_query  as $key => $value){

//$friends_query_name = $facebook->api($value."?fields=name");
 
$query_friends = mysqli_query($connexion,"SELECT  * FROM users   WHERE  fb_id='$value'");
 

$lista_amigos_view = mysqli_fetch_array($query_friends);


		$id_user_fw = $lista_amigos_view['id_user']; 
		$bio_user = $lista_amigos_view['bio'];
		
	 $name_user = $lista_amigos_view['name_user'];
	
 	
	$fb_id_user =    $value;
	 $id_user_f =    $value;
							
$comprueba_exists_panelsu = Requete ("SELECT title, id_myf FROM myfive_panels  WHERE autor  = '$id_user_fw'    ORDER BY id_myf DESC" , $connexion);
$num_postsu=mysqli_num_rows($comprueba_exists_panelsu);
  
$query_followers_u = mysqli_query($connexion,"SELECT id_to_follow FROM follow WHERE  id_to_follow='$fb_id_user'  "  );
$num_followersu=mysqli_num_rows($query_followers_u);

	                    $fb_id =  $id_user_f;     
	                    $fb_id_user =  $id_user_f;
	
	if ($name_user){
	
	
	                              ?>
<a href="javascript:void_()"; onclick="show_user('<?php echo $id_user_f; ?>');"  class=" negro"  style="float:left;" >	
 <div id="image_user" style="float:left; padding:4px;width:40px;"><img src="https://graph.facebook.com/<?php echo $id_user_f; ?>/picture" width="40" align="absmiddle" alt="<?php echo $name_user; ?>" style="-webkit-border-radius: .5em;-moz-border-radius: .5em;	border-radius: .5em;border:0px;"></div>
		</a>	

<a href="javascript:void_()"; onclick="show_user('<?php echo $id_user_f; ?>');"  style="float:left;" >
<div   class="texto_18 negro"   ><?php echo utf8_decode($name_user); ?>&nbsp;&nbsp;<div style="float:right;margin-right:10px;"> <?php include("fonction/action_follow.php"); ?></div>       </a>
<br> <div style="padding-top:0px;text-align:left; width:210px;" class="texto_12 negro"> 
 	<?php echo $num_followersu; ?> followers   |   <?php echo $num_postsu; ?> posts  
 </div>
 <div style="position:relative; text-align:left;width:210px; float:left;left:0px;padding-top:0px;" class="texto_10 gris">
  <?php echo $bio_user;?> 
 </div>
          </div>                                                                                      
					 
<div style="width:95%;clear:both;border-top:1px solid #ddd;margin-top:5px;height:10px;"> </div>
 
	                    <?php
	                                }
																							//var_dump($friends_query_name);

/*echo '<div style="display:inline-table;text-align:center;width:60px;border:0px solid #ccc;margin-right:5px;word-wrap:break;height:120px;" class="texto_10 gris"><img src="https://graph.facebook.com/'.$value.'/picture" width="50" align="absmiddle" alt="'.$friends_query_name['name'].'" style="-webkit-border-radius: .3em;-moz-border-radius: .3em;	border-radius: .3em;border:0px;"><br />'.$friends_query_name['name']; include("fonction/action_follow.php"); echo'</div>';
	print_r($id); */

}
 
									?>
									     </div>
 
		