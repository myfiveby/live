<?php  
require ('conf/sangchaud.php');  
$connexion = Connexion ($login_base, $password_base, $base, $host_base); 

 
 
$email_user= Array();

                        

            $panel_to_notif = Requete ("SELECT *, myfive_panels.url AS url_post  FROM  myfive_panels
                                       LEFT JOIN users ON id_user = autor
						  WHERE id_myf  = '$user_to_notif' " , $connexion);




	if (mysqli_num_rows($panel_to_notif) > 0 ){
	
	
  
 $datos_user_to_notif = mysqli_fetch_array($panel_to_notif);
         
        $email_user []= $datos_user_to_notif['email'];
        $id_user = $datos_user_to_notif['id_user'];
        $name_user = $datos_user_to_notif['name_user'];
        $bio_user = $datos_user_to_notif['bio'];
        
        $title_post = $datos_user_to_notif['title'];
        $url_post = $datos_user_to_notif['url_post'];
        
        $notif_start_followed = $datos_user_to_notif['notif_start_followed'];
        $notif_conversation_created = $datos_user_to_notif['notif_conversation_created'];
        $notif_are_fav = $datos_user_to_notif['notif_are_fav'];
        $notif_comment = $datos_user_to_notif['notif_comment'];
        $notif_contribute_mytopic = $datos_user_to_notif['notif_contribute_mytopic'];
        


$user_owner_notif = Requete ("SELECT *  FROM  users  WHERE id_user  = '$_SESSION[id]' " , $connexion);
$datos_user_owner_notif = mysqli_fetch_array($user_owner_notif);
          
        $name_usern = $datos_user_owner_notif['name_user'];
        $bio_usenr = $datos_user_owner_notif['bio'];
        $fb_idr = $datos_user_owner_notif['fb_id'];
        $url_userr = $datos_user_owner_notif['url_user'];
        
         
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
        'Subject.Data' =>  $_SESSION['username'].' marked one of your posts as a favorite.',
        'Body.Html.Data' =>' 
				 
				   <html>

<title></title>

<body ">

<div style="margin:auto 0px; width:550px; padding:10px;border:1px dotted #dddddd;background:#f0f0f0;" align="center">

<div style="margin:auto 0px; width:400px;height:350px;padding:10px;margin-top:30px; " align="center">

		<div style="margin-bottom:20px;" align="left"><a href="'.$url_production.'"><img src="http://www.myfiveby.com/myfiveby_logo.png" alt="myFIVEby.com"></a></div>
 
		
		
		

<div style="width:100%;text-align:left;padding:10px;border-bottom:1px solid #dfdfdf;margin-bottom:20px;height:100px;">


<div style="float:left;width:45px;text-align:left;display:inline-block;"  align="center"><img src="https://graph.facebook.com/'.$fb_idr.'/picture" width="40"></div>


<div style="float:left;padding-left:20px;display:inline-block;width:310px;text-align:left;font-family:Arial,Helvetica Sans;color:#333;font-size:1.1em;padding-bottom:10px;"  align="center">
<a href="'.$url_production.$url_userr.'" style="text-decoration:none;"><span style="font-size:0.9em; color: #19A5DA; ">'.$_SESSION['username'].'</span></a> marked your post: 

 <div style="width:99%;text-align:left;font-family:Arial, Sans;color:#333;font-size:1.1em;padding:15px;padding-left:0px;border-bottom:0px solid #dfdfdf;margin-bottom:20px"  align="center"><span style="color:#333;"><br> <a href="'.$url_production.$url_post.'"  style="text-decoration:none; color: #19A5DA;" ><strong> '.$title_post.'</strong></span></a> as a favorite.
</div>
		</div>
		 <div style="clear:both;width:450px;height:40px;color:#a1a1a1;font-size:1.0em;font-family:Arial,Helvetica Sans;border-top:0px solid #dfdfdf;padding-top:10px;">To change your notifications settings,  <a href="http://myfiveby.com/">click here</a>.<br>
		
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
//var_dump($response->isOK());
            } else { return false;}
	 
 ?>