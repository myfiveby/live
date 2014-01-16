<?php
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
 
require ('../APICall.php');

$user = new APICall("comments");

if (!$user){
	echo '[{"status":404,"message":"no id data.","response":404}]';
} else {
	if ($user->getId() && $user->getDataArr()) {
		echo '[{"status": 200,"message": "ok","usercomments": '.json_encode($user->getDataArr()).' }]';
	} else {
		echo '[{"status":404,"message":"user not found.","response":404}]';
	}
}
?>