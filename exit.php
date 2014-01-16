<?php
if (!session_id() || session_id()==""){
	session_start();
}

require ('conf/sangchaud.php');
include('fb_login/lib/db.php');
require 'fb_login/lib/facebook.php';
require 'fb_login/lib/fbconfig.php';

$user = $facebook->getUser();
$logoutUrl = $facebook->getLogoutUrl();

session_destroy();
unset($cookie);
unset($user);
unset($_SESSION['facebook']);
unset($_SESSION['id']);
while(list($cle, $val)=each($_SESSION)){ 
if ($cle !== "lang"){unset($_SESSION["$cle"]);}
}
//session_destroy();


unset($session);
echo"<script language=\"JavaScript\">
document.location.replace(\"index.php\");
</script>";
?>