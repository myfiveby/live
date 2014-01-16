<?php
function send_notif_5 ($type_notif, $user_to_notif){


switch ($type_notif){
	
case '1':include("fonction/notif_followed.php");break;

case '2':include("fonction/notif_comment.php");break;


case '3':
	
include("fonction/notif_fav.php");
break;


case '4':
include("fonction/notif_first.php");
break;

case '5':
// include("fonction/notif_universal.php");
break;



}
 
}

?>