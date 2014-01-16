<?php

require("function_get_rss_location.php"); 

$location = $_POST['url_blog'];

$html = getFile($location);

$rss_url =getRSSLocation($html, $location);

//echo json_encode($rss_url ); 

//var_dump($rss_url);



//echo $rss_url[0];
if (!$rss_url){ 

include_once('sp/simplepie.inc'); 
include_once('sp/idn/idna_convert.class.php');
$feed = new SimplePie();
if (!empty($feed))
{
  $rss_url=Array('0'=>$_POST['url_blog']);  
    
}
}

if (!$rss_url){ 



echo "No feed found.";





} else {



foreach ( $rss_url as $key){



echo "<li style=\"margin:10px;\" class=\"texto_11 negro\"><div style=\"cursor:pointer;\"  class=\"button white bigrounded small \" onClick=\"add_rss_to_my5_wp('$key')\">Add</div> ".$key."</li>";





}

}



?> 