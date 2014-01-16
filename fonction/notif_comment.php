<?php      
require ('conf/sangchaud.php');  
$connexion = Connexion ($login_base, $password_base, $base, $host_base); 



                $id_commment    =   $user_to_notif;
        
                        
            $comment_to_notif = Requete ("SELECT *, myfive_panels.autor, myfive_panels.url  FROM  comments
						 LEFT JOIN users ON autor_coment = id_user
						 LEFT JOIN  myfive_panels ON id_myf = relacionado_coment
						  WHERE id_coment  = '$id_commment' " , $connexion);

	if (mysqli_num_rows($comment_to_notif) > 0 ){
	
	
  
 $datos_comment_to_notif = mysqli_fetch_array($comment_to_notif);
          
        $id_user = $datos_comment_to_notif['id_user']; 
        $fb_idr = $datos_comment_to_notif['id_fb_autor']; 
        $texto_coment = $datos_comment_to_notif['texto_coment'];  
        $f_coment = $datos_comment_to_notif['f_coment']; 
        
        $url_userr = $datos_comment_to_notif['url_user'];
        
        $title_post = $datos_comment_to_notif['title']; 
				
        $url_post = $datos_comment_to_notif['url']; 
				
				        
        $id_post = $datos_comment_to_notif['relacionado_coment'];
        
        
        
        $dest_user_post = $datos_comment_to_notif['autor'];
                        
      
$user_owner_notif_ow = Requete ("SELECT id_user,email  FROM  users  WHERE id_user  = '$dest_user_post' AND notif_comment ='1' " , $connexion);


	if (mysqli_num_rows($comment_to_notif) > 0 ){

	


$datos_user_owner_notif_ow = mysqli_fetch_array($user_owner_notif_ow);
    
 
$email_user= Array();       
        $email_user []= $datos_user_owner_notif_ow['email'];                  
                      
											
										 
                        
              //

																			 /*
<div style="width:99%;text-align:left;font-family:Arial, Sans;color:#666;font-size:1.1em;padding:15px;padding-left:0px;border-bottom:1px solid #dfdfdf; "  align="center"><a href="'.$url_production.$url_userr.'"  style="text-decoration:none;"><span style="color:#19a5da;"><strong>'.$_SESSION['username'].'</strong></span></a> commented on one of your posts.</div>*/          
                        
                        
	// Include the SDK
	require_once 'sdk-aws/sdk.class.php';

// Instantiate the class
$email = new AmazonSES();
  $response = $email->list_verified_email_addresses();
 
$response = $email->send_email(
    'myFIVEby <do_not_reply@myfiveby.com>', // Source (aka From)
    array('ToAddresses' =>  $email_user ),
    array( // Message (short form)
        'Subject.Data' =>  $_SESSION['username'].' commented on your post: '.$title_post.'.',
        'Body.Html.Data' =>'
				   <html>

<title></title>

<body >

<div style="margin:auto 0px; width:650px; padding:10px;border:1px dotted #dddddd;background:#f0f0f0;" align="center">

<div style="margin:auto 0px; width:500px;padding:10px;margin-top:30px; " align="center">

		<div style="margin-bottom:20px;" align="left"><a href="'.$url_production.'"><img src="http://www.myfiveby.com/myfiveby_logo.png" alt="myFIVEby.com"></a></div>

		
		                                  

<div style="width:99%;text-align:left;font-family:Arial, Sans;color:#333;font-size:1.1em;padding:15px;padding-left:0px;border-bottom:0px solid #dfdfdf;margin-bottom:20px"  align="center"><span style="color:#333;">In response to your post:<a href="'.$url_production.$url_post.'"  style="text-decoration:none; color: #19A5DA;" ><strong> '.$title_post.'</strong></span></a>, <a href="'.$url_production.$url_userr.'"  style="text-decoration:none; color: #19A5DA;" >'.$_SESSION['username'].'</a> said:</div>		

<div style="width:100%;text-align:left;padding:10px;border-bottom:0px solid #dfdfdf;margin-bottom:20px;height:100px;">


<div style="float:left;width:45px;text-align:left;display:inline-block;"  align="center"><img src="https://graph.facebook.com/'.$fb_idr.'/picture" width="40"></div>


<div style="float:left;padding-left:20px;display:inline-block;width:400px; text-align:left;font-family:Arial, Sans;color:#999;font-size:1em;padding-bottom:10px;"  align="center">
<a href="'.$url_production.$url_userr.'" style="text-decoration:none;"><span style="font-size:1em; color: #19A5DA; "><strong>'.$_SESSION['username'].'</strong></span></a>    <br>
'.$texto_coment.'</div>
		
		
		<div style="clear:both;width:450px;height:40px;color:#a1a1a1;font-size:0.9em;font-family:Arial,Helvetica Sans;border-top:1px solid #dfdfdf;padding-top:10px;">To change your notifications settings, <a href="http://myfiveby.com/">click here</a>.<br>
		
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
         
} 
        
} else { return false;}
 ?>