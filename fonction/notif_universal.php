<?php
require ('conf/sangchaud.php');  
$connexion = Connexion ($login_base, $password_base, $base, $host_base); 

 

 
$user_to_notiff = Requete ("SELECT  *  FROM  users  WHERE   notif_universal = '1'" , $connexion);


	if (mysqli_num_rows($user_to_notiff) > 0 ){

 $email_user  = Array();
  

 $datos_user_to_notif = mysqli_fetch_array($user_to_notiff);

         

        $email_user[]  = $datos_user_to_notif['email'];

        $id_user = $datos_user_to_notif['id_user'];

        $name_user = $datos_user_to_notif['name_user'];

        $bio_user = $datos_user_to_notif['bio'];

        

        $notif_start_followed = $datos_user_to_notif['notif_start_followed'];

        $notif_conversation_created = $datos_user_to_notif['notif_conversation_created'];

        $notif_are_fav = $datos_user_to_notif['notif_are_fav'];

        $notif_comment = $datos_user_to_notif['notif_comment'];
        $notif_universal = $datos_user_to_notif['notif_comment'];

        $notif_contribute_mytopic = $datos_user_to_notif['notif_contribute_mytopic'];

        



$comprueba_exists_th = Requete ("SELECT * FROM threads  WHERE id_th  = '$user_to_notif' " , $connexion);

$datos_th = mysqli_fetch_array($comprueba_exists_th) ;

        $tit_universal = $datos_th['name_th'];
        $url_universal = $datos_th['url_th'];



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

        'Subject.Data' =>  'Join the Conversation!',

        'Body.Html.Data' =>'

				 

				 

				 

				 

				 

				   <html>



<title></title>



<body ">



<div style="margin:auto 0px; width:550px; padding:10px;border:1px dotted #ccc;background:#f0f0f0;" align="center">



<div style="margin:auto 0px; width:100%;height:350px;padding:10px;margin-top:20px; " align="center">



		<div style="margin-bottom:10px;" align="left"><a href="'.$url_production.'"><img src="http://www.myfiveby.com/myfiveby_logo.png" alt="myFIVEby.com"></a></div>







<div style="width:99%;text-align:left;font-family:Arial, Sans;color:#333;font-size:1.1em;padding:15px;padding-left:0px;border-bottom:0px solid #dfdfdf;margin-bottom:5px"  align="center"><a href="'.$url_production.$url_userr.'"  style="text-decoration:none;"><span style="color:#19a5da;"><strong>'.$_SESSION['username'].'</strong></span></a> added a new Universal conversation:</div>

		

		

		



<div style="width:100%;text-align:left;padding:10px;border-bottom:0px solid #dfdfdf;margin-bottom:20px;">
 


<div style="float:left; display:inline-block;width:100%;text-align:left;font-family:Arial,Helvetica Sans;color:#999;font-size:0.75em; "  align="center">

<a href="'.$url_production.$url_universal.'" style=" "><span style="font-size:2.2em;color:#333;"><strong><u>'.$tit_universal.'</u></strong></span></a>  
 
</div>

		

		

		<div style="clear:both;width:100%;height:40px;color:#a1a1a1;font-size:0.9em;font-family:Arial,Helvetica Sans;border-top:1px solid #dfdfdf;margin-top:100px;padding-top:5px;text-align:left;">To change your notifications settings,  <a href="http://myfiveby.com/">click here</a>.<br>

		

		<span style="color:#a1a1a1;font-size:0.8em;">myFIVEby.com &copy; 2012 Barcelona</span>

		

		</div>

		

		

		

		                                                                    </div>

		

		 





</div>







</div>









</body>

</html >

' )
    );

 
            } else {
              
                return false;}

	
 
 ?>