<?php

if (!session_id() || session_id()==""){
	session_start();
}

$path=dirname(__FILE__).'/';
include_once $path.'client_browser_detection.php';

if(isset($_GET['dochk'])){
	unset($_SESSION);
	header('location: '.$_SERVER['PHP_SELF']); exit();
}

$browser=new clientBrowserDetection(true);


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Browser detection</title>
<?=$browser->browser_detection_js_meta?>
</head>

<body>
<p><a href="<?=$_SERVER['PHP_SELF']?>?dochk=yes">Check Again</a> | <a href="index.php">Back to Example Index</a></p>
<pre>
<?php #print_r($browser_info_php); ?>
<?php print_r($browser->getBrowserInformation()); ?>
</pre>

</body>
</html>
