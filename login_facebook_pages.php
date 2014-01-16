<?php
if (!session_id() || session_id()==""){
	session_start();
}
include('conf/sangchaud.php');
include('fb_login/lib/db.php');
require 'fb_login/lib/facebook.php';
require 'fb_login/lib/fbconfig.php';
// Connection...
$user = $facebook->getUser();
if ($user)
{
$logoutUrl = $facebook->getLogoutUrl();
try {
$userdata = $facebook->api('/'.$_POST['idfb']);
 
$uaccounts= $facebook->api('/me/accounts');
} catch (FacebookApiException $e) {
error_log($e);
$user = null;
}
$_SESSION['facebook']=$_SESSION;
$_SESSION['userdata'] = $userdata;
$_SESSION['uaccounts'] = $uaccounts;
$_SESSION['logout'] =  $logoutUrl;
header("Location: action_guarda_datosuser.php");
}else
{ 
$loginUrl = $facebook->getLoginUrl(array( 'scope' => 'email'));
header("Location:".$loginUrl);
 }

 

?>