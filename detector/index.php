<?php

if (!session_id() || session_id()==""){
	session_start();
}


?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Browser detection</title>
</head>

<body>
<h2>Browser mechanism machanism by Session, JavaScript, CSS &amp; PHP</h2>
<h3>Author: Shahadat Hossain Khan Razon (razonklnbd@hotmail.com)</h3>
<h3>Additional Feature from: Harald Hope (http://techpatterns.com/downloads/php_browser_detection.php)</h3>
<h2>Example Index</h2>
<h3>1. <a href="example1.php">Detection &amp; Settings by Redirection (its not recommended at index page)</a></h3>
<h3>2. <a href="example2.php">Detection and pass into CSS</a></h3>
</body>
</html>
