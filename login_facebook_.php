<?php
if (!session_id() || session_id()==""){
	session_start();
}
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

$uaccounts= $facebook->api('/me/accounts');
} catch (FacebookApiException $e) {
error_log($e);
$user = null;
}
$_SESSION['facebook']=$_SESSION;
$_SESSION['userdata'] = $userdata;
$_SESSION['uaccounts'] = $uaccounts;
$_SESSION['logout'] =  $logoutUrl;


$_SESSION['iduser_propietario_fbpages'] = $_SESSION['userdata'][id];
$_SESSION['acuser_propietario_fbpages'] = $_SESSION['userdata'][access_token];
$_SESSION['nuser_propietario_fbpages'] = $_SESSION['userdata'][name];


header("Location: action_guarda_datosuser.php");
}else
{ 
$loginUrl = $facebook->getLoginUrl(array( 'scope' => 'email'));
header("Location:".$loginUrl);
 }

 

?>