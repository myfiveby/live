<?php

/*
javascript passed following query:
rbd_js_enable=enabled&rbd_width=1366&rbd_height=768&rbd_colorDepth=32&rbd_pixelDepth=32&rbd_availWidth=1366&rbd_availHeight=728&rbd_cookie_enable_status=enabled
*/

# height gutter is for browser menu, status bar etc.
$height_gutter=50;

$width=$height=500;
$border=1;
$padding=20;
$area_width=(isset($_REQUEST['rbd_availWidth'])?intval($_REQUEST['rbd_availWidth']):1024);
$area_height=(isset($_REQUEST['rbd_availHeight'])?intval($_REQUEST['rbd_availHeight']):768);


header ("Content-type: text/css");

?>/* CSS Document */
/* CSS designed by the Mad */

<!--

.test_div {
	position: absolute;
	left: <?=intval($area_width/2)-intval($width/2)-$border-$padding?>px;
	top: <?=intval($area_height/2)-intval($height/2)-$border-$padding-intval($height_gutter/2)?>px;
	width: <?=$width?>px;
	height: <?=$height?>px;
	border: <?=$border?>px solid #f00;
	background-color: #ff0;
	padding: <?=$padding?>px;
	}

<?php

print '/*';
print_r($_REQUEST);
print '*/';

?>


-->

