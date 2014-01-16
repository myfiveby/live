<?php
if (!session_id() || session_id()==""){
	session_start();
}
require ('conf/sangchaud.php');
require 'fb_login/lib/db.php';
require 'fb_login/lib/facebook.php';
require 'fb_login/lib/fbconfig.php';

/* 
html5 storage

IE 8+
Firefox 3.5
Safari 4.0+
Chrome 4.0+
Opera 10.5+
IPhone
Android
*/


 $_SESSION['user_panels_open'] = 0;
 $_SESSION['panels_open'] = 0;
 $_SESSION['tags_panels_open'] = 0;
 
 
 
$facebook=$_SESSION['facebook'];
$userdata=$_SESSION['userdata'];
$logoutUrl=$_SESSION['logout'];
$access_token_title='fb_'.$facebook_appid.'_access_token';
$access_token=$facebook[$access_token_title];
 
$facebook_id=$userdata['id'];
$name=$userdata['name'];
$email=$userdata['email'];
$gender=$userdata['gender'];
$birthday=$userdata['birthday'];
$location=mysqli_real_escape_string($connection,$userdata['location']['name']);
$hometown=mysqli_real_escape_string($connection,$userdata['hometown']['name']);

$bio=mysqli_real_escape_string($connection,$userdata['bio']);

 $bio = substr($bio,0,200);

$relationship=$userdata['relationship_status'];
$timezone=$userdata['timezone'];

 

$_POST['idfb'] = $facebook_id;
$_POST['nfb'] = $name;


require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php');
 

$connexion = Connexion ($login_base, $password_base, $base, $host_base);



# Let's see if we have an active session  
$facebook_access_token=$_POST['acct'];
		 
//$_SESSION['friends_comun'] = $facebook2->api(array('method' => 'friends.getAppUsers'));


if ( !empty($facebook_id)) {

# We have an active session, let's check if we have already registered the user

  	$query = mysqli_query($connexion,"SELECT * FROM users WHERE oauth_provider='facebook' AND fb_id = '". $facebook_id."'");
  	
 
$result = mysqli_fetch_array($query);
		
 
# If not, let's add it to the database
		if(mysqli_num_rows($query) == 0){


if (!isset($name)){$name="";}


		require("fonction/fonction_url.php");
		$url_user  = urls_($name);
		
		
	//	 $comprueba_exists_url_user = Requete ("SELECT url FROM myfive_panels  WHERE url_user  = '$url_user' " , $connexion);
  //if (mysqli_num_rows($comprueba_exists_url_user) >0 ){ 
  //$tiempo_UNIX=time(); $prefix_url_user = substr($tiempo_UNIX, -3); $url_user=$url_user.$prefix_url_user;}
 
 
		
		
		
		
$query2 = mysqli_query($connexion,"INSERT INTO users (f_alta,oauth_provider, fb_id, name_user, url_user, url, acc_tkn) VALUES (NOW(),'facebook', '$_POST[idfb]', '$_POST[nfb]','$url_user','$url_user','$access_token' )");

		$id_user = mysqli_insert_id($connexion);


		if ($id_user!==0){
		
$query_panel_follow = mysqli_query($connexion,"INSERT INTO follow (id_to_follow, id_user_f, f_creado,id_user_to_follow) VALUES ('232269453464398','$id_user',NOW(), '2' )");
      
      
      
$save_connection = mysqli_query($connexion,"INSERT INTO connections_providers (id_user, oauth_provider, id_provider, access_token, f_alta, user_name) VALUES ('$id_user','facebook','$_POST[idfb]', '$facebook_access_token', NOW(),'')");
						
						
                }     
                                                
						$query = mysqli_query($connexion,"SELECT * FROM users WHERE oauth_provider = 'facebook' AND fb_id = ". $_POST['idfb']);
		$result = mysqli_fetch_array($query);
				
 
 


require_once("fonction/fucntion_5mailer_aws.php"); 
send_notif_5('4', $_SESSION['fb_id']);


 
 
 			$_SESSION['id'] = $result['id_user'];
		$_SESSION['fb_id'] = $_POST['idfb'];
		$_SESSION['oauth_provider'] = "facebook";
		$_SESSION['username'] =  $_POST['nfb'];
		$_SESSION['acctkn'] =  $_POST['acct'];
		$_SESSION['background_user'] =  $result['background_user'];
		$_SESSION['url_user'] =  $result['url'];
		$_SESSION['email_user'] =  $result['email'];
                
                 $bio = substr($result['bio'],0,200);

		$_SESSION['bio_user'] = $bio;
		
 	$_SESSION['fold_up']="1";		
 	$_SESSION['tourm']=1;
		
						$resultat_update =  mysqli_query  ($connexion,"UPDATE users SET 
                                             email = '$email',gender = '$gender',birthday = '$birthday',location = '$location',hometown = '$hometown',bio = '$bio',relationship = '$relationship',timezone = '$timezone' WHERE fb_id = '$facebook_id' AND id_user='$_SESSION[id]' ");

 
header("Location: index.php");
 
  	} 		else   {
						
						
		$_SESSION['fold_up']="1";
		$_SESSION['tourm']=0;

 		$_SESSION['id'] = $result['id_user'];
		$_SESSION['fb_id'] = $_POST['idfb'];
		$_SESSION['oauth_provider'] = "facebook";
		$_SESSION['username'] =  $_POST['nfb'];
		$_SESSION['acctkn'] =  $_POST['acct'];
		$_SESSION['background_user'] =  $result['background_user'];
		$_SESSION['url_user'] =  $result['url'];
		$_SESSION['email_user'] =  $result['email'];
		$_SESSION['bio_user'] =  $result['bio'];
		
                
         


//require_once("fonction/fucntion_5mailer_aws.php"); 
//send_notif_5('4', $_SESSION['fb_id']);
       
                
                
                 
	/*	 
		 if (empty($_SESSION['bio_user']) ){  $bio = $bio; } else { $bio = $_SESSION['bio_user'];}
		 

$resultat_update =  mysqli_query($connexion,"UPDATE users SET 
                                             email = '$email',gender = '$gender',birthday = '$birthday',location = '$location',hometown = '$hometown',bio = '$bio',relationship = '$relationship',timezone = '$timezone' WHERE fb_id = '$facebook_id' AND id_user='$_SESSION[id]' ", $connexion);
*/
	 
		

 	 
header("Location: index.php");
			 
			}
			
  	} 		else   {
		 
header("Location: index.php");
		 
			}
			
			?>