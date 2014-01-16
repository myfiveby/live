<?php

if (!session_id() || session_id()==""){
	session_start();
}

$path=dirname(__FILE__).'/';
include_once $path.'client_browser_detection.php';

$browser=new clientBrowserDetection();

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Browser detection</title>
<?=$browser->getCssLoadingJsCode('style_main.css.php')?>
</head>

<body>
<script type='text/javascript'>
<!-- BEGIN
//<![CDATA[

document.write('<h5>'+rbd_output+'</h5>');

//]]>
// End -->
</script>

<pre>
<h3>$browser->getBrowserInformation()</h3><?php print_r($browser->getBrowserInformation()); ?>
<h3>$browser->browser_info_php</h3><?php print_r($browser->browser_info_php); ?>
</pre>
<div class="test_div">this is a test div that automatically control thorugh dynamic css of this browser detection control</div>
</body>
</html>
