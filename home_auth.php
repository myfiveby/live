<?php
# this script require authentication
if (!session_id() || session_id()==""){
	session_start();
}

if(empty($_SESSION)){
	header("Location: login_facebook.php");
}
?>
<h2>Welcome back, authenticated user</h2>