<?php
//Facebook Application Configuration.
$facebook_appid='set_up_your_own_facebook_key';
$facebook_app_secret='set_up_your_own_facebook_secret';

$facebook = new Facebook(array(
'appId'  => $facebook_appid,
'secret' => $facebook_app_secret,
));


?>