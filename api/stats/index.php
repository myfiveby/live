<?php
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
 
require ('../APICall.php');

$stats = new APICall("stats",1);

if (!$stats){
	echo '[{"status":404,"message":"unexpected APICall error - huh???.","response":404}]';
} else {
	if ($stats->getDataArr()) {
		echo '[{"status": 200,"message": "ok","stats": '.json_encode($stats->getDataArr()).' }]';
	} else {
		echo '[{"status":404,"message":"unexpected lack of data... er - help?","response":404}]';
	}
}
?>
