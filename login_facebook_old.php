<?php 
if (!session_id() || session_id()==""){
	session_start();
}

if(!empty($_SESSION)){
 header("Location: index.php");
}

mysql_connect('localhost', 'avieylka_myf', 'OSoaLl(O9NS[');
mysql_select_db('avieylka_myfiveby');

# We require the library
require("facebook.php");

# Creating the facebook object
$facebook = new Facebook(array(
	'appId'  => FB_KEY,
	'secret' => FB_SECRET,
	'cookie' => true
));

# Let's see if we have an active session
$session = $facebook->getSession(); 


$facebook_access_token=$session['access_token'];

//echo $facebook_access_token;

if(!empty($session)) { 
 
	# Active session, let's try getting the user id (getUser()) and user info (api->('/me'))
	try{
		$uid = $facebook->getUser();
		$user = $facebook->api('/me');
		
	} catch (Exception $e){}
	
    if(!empty($user)){
		# We have an active session, let's check if we have already registered the user
  	$query = mysqli_query($connexion,"SELECT * FROM users WHERE oauth_provider = 'facebook' AND fb_id = ". $user['id']);
		$result = mysqli_fetch_array($query);
		
		# If not, let's add it to the database
		if(empty($result)){
		
		
		print_r($user);
		
		require("fonction/fonction_url.php");
		$url_user  = urls_($user['name']);
		
			$query2 = mysqli_query($connexion,"INSERT INTO users (f_alta,oauth_provider, fb_id, name_user, url_user, acc_tkn) VALUES (NOW(),'facebook', {$user['id']}, '{$user['name']}','$url_user','$facebook_access_token' )");
		$id_user = mysqli_insert_id($connexion);
			
			
			$query_panel = mysqli_query($connexion,"INSERT INTO myfive_panels (f_creado,autor,title) VALUES (NOW(),'$id_user','Personal panel myFIVEby')");
			$id_panel= mysqli_insert_id($connexion);
			
			for ($i = 1; $i <= 5; $i++) {
			$query_frase = mysqli_query($connexion,"INSERT INTO myfive_content (f_creado,frase_mf, autor_mf,id_myf) VALUES (NOW(),'Put your sentence #$i.','$id_user','$id_panel')");
			
      }
						$save_connection = mysqli_query($connexion,"INSERT INTO connections_providers (id_user, oauth_provider, id_provider, access_token, f_alta, user_name) VALUES ('$id_user','facebook','{$user['id']}', '$facebook_access_token', NOW(),'')");
						
						
						
						
						
						
						
						
		 $query3 = msyql_query("SELECT * FROM users WHERE id_user = '$id_user'");
		 $result3 = mysqli_fetch_array($query3);
 			$_SESSION['id'] = $result['id_user'];
		$_SESSION['fb_id'] = $result['fb_id'];
		$_SESSION['oauth_provider'] = $result['oauth_provider'];
		$_SESSION['username'] = $result['name_user'];
		$_SESSION['acctkn'] = $facebook_access_token;
			
			
	  	} 
		
		
		 
	$_SESSION['friends_comun'] = $facebook->api(array('method' => 'friends.getAppUsers'));
	
		
		// this sets variables in the session 
		$_SESSION['id'] = $result['id_user'];
		$_SESSION['fb_id'] = $result['fb_id'];
		$_SESSION['oauth_provider'] = $result['oauth_provider'];
		$_SESSION['username'] = $result['name_user'];
		
		$_SESSION['acctkn'] = $result['acc_tkn'];
 	header("Location:index.php ");
		
		
	} else {
		# For testing purposes, if there was an error, let's kill the script
			$login_url = $facebook->getLoginUrl();
 	header("Location: ".$login_url);
	}
} else {
	# There's no active session, let's generate one
	$login_url = $facebook->getLoginUrl();
 	header("Location: ".$login_url);
}

 