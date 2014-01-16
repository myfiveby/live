<?php
require ('conf/sangchaud.php');  
$connexion = Connexion ($login_base, $password_base, $base, $host_base);

$email_user= Array();
$dbobj = Requete ("SELECT *  FROM  users  WHERE fb_id  = ".$user_to_notif , $connexion);

	if ($dbobj && mysqli_num_rows($dbobj) > 0 ){
 
 $datos_user_to_notif = mysqli_fetch_array($dbobj);
         
        $email_user []= $datos_user_to_notif['email'];
        $id_user = $datos_user_to_notif['id_user'];
        $name_user = $datos_user_to_notif['name_user'];
        $bio_user = $datos_user_to_notif['bio'];
        
        $notif_start_followed = $datos_user_to_notif['notif_start_followed'];
        $notif_conversation_created = $datos_user_to_notif['notif_conversation_created'];
        $notif_are_fav = $datos_user_to_notif['notif_are_fav'];
        $notif_comment = $datos_user_to_notif['notif_comment'];
        $notif_contribute_mytopic = $datos_user_to_notif['notif_contribute_mytopic'];
        
$user_owner_notif = Requete ("SELECT *  FROM  users  WHERE id_user  = '".$_SESSION[id]."' " , $connexion);
$datos_user_owner_notif = mysqli_fetch_array($user_owner_notif);
          
        $name_usern = $datos_user_owner_notif['name_user'];
        $bio_usenr = $datos_user_owner_notif['bio'];
        $fb_idr = $datos_user_owner_notif['fb_id'];
        $url_userr = $datos_user_owner_notif['url_user'];
        
 $comprueba_exists_panels = Requete ("SELECT title, id_myf FROM myfive_panels  WHERE autor  = '".$id_user."'  and privacy <> '1'  ORDER BY id_myf DESC" , $connexion);
$num_posts=mysqli_num_rows($comprueba_exists_panels);
$query_friends = mysqli_query($connexion,"SELECT id_user_f FROM follow LEFT JOIN users on id_user = id_user_f  WHERE  id_to_follow='".$user_to_notif."' "  );
$num_followers=mysqli_num_rows($query_friends);
$query_friendsfollowing = mysqli_query($connexion,"SELECT id_to_follow FROM follow LEFT JOIN users ON fb_id = id_to_follow WHERE  id_user_f='".$id_user."'  "  );
$num_following=mysqli_num_rows($query_friendsfollowing);
$query_friendsthreads = mysqli_query($connexion,"SELECT id_th FROM threads  WHERE  autor_th='".$id_user."'  and privacy <> '1' "  );
$num_topics=mysqli_num_rows($query_friendsthreads);
       
        
//echo  "$type_notif : $email_user - $name_user  >".$_SESSION['username'] ;
	// Include the SDK
	require_once 'sdk-aws/sdk.class.php';
// Instantiate the class
$email = new AmazonSES();
  $response = $email->list_verified_email_addresses();
 
$response = $email->send_email(
    'myFIVEby <do_not_reply@myfiveby.com>', // Source (aka From)
    array('ToAddresses' =>  $email_user ),
    array( // Message (short form)
        'Subject.Data' => 'Welcome to myFIVEby!',
        'Body.Html.Data' =>'
				 
				 
				 
				 
				 
				   <html>
<title></title>
<body ">
<div style="margin:auto 0px; width:550px; padding:10px;border:1px solid #dddddd;background:#f9f9f9;" align="center">
<div style="margin:auto 0px; width:400px;height:350px;padding:10px;margin-top:30px; " align="center">
		<div style="margin-bottom:20px;" align="left"><a href="'.$url_production.'"><img src="http://www.myfiveby.com/myfiveby_logo.png" alt="myFIVEby.com"></a></div>
 
		
		
<div style="width:100%;text-align:left;padding:10px;margin-bottom:20px;height:400px;">
Hi '.$_SESSION['username'].'<br><br>
We\'re excited you\'re joining myFIVEby, a dedicated place to write your own content, interact with others and discover more about the things that interest you most. It\'s blogging, reinvented!
<br><br>
A few tips to get the most out of myFIVEby:
<br><br>
<li> Be yourself and write the way you speak naturally.</li>
<li> Add your existing blog to myFIVEby by visiting Connections in the Settings menu.</li>
<li> Don\'t wait to feel inspired to contribute, just wait for the urge. </li>
<li> Be original, proud and make it your own.</li>
<br>
If you have any questions, we\'d love to hear from you. Email us at engage@myfiveby.com or follow us on twitter at @myfiveby. 
<br><br>
Happy posting!
<br><br>
The myFIVEby Team 
 <br><br>
</div>
		
		
		<div style="clear:both;width:450px;height:40px;color:#a1a1a1;font-size:0.9em;font-family:Arial,Helvetica Sans; padding-top:10px;"> 
		<span style="color:#a1a1a1;font-size:0.8em;">myFIVEby.com &copy; 2012 Barcelona</span>
		
		</div>
		
		
		
		                                                                    </div>
		
		 
</div>
</div>
</body>
</html >
				 
				  
				 
				
				' 
    )
);
// Success?
var_dump($response->isOK());
            } else { return false;}
 ?>