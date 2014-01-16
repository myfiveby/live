<?php 

if (!session_id() || session_id()==""){
	session_start();
} 

  

require ('conf/sangchaud.php');



require ('fonction/fonction_connexion.php');

require ('fonction/fonction_requete.php');

require ('fonction/fonction_formato_fecha.php');

require ('fonction/time_ago.php');



 $connexion = Connexion ($login_base, $password_base, $base, $host_base);




?>



<div  style="width:252px;height:97%;margin:0px;left:0;margin-top:2px;float:left;text-align:left;" align="left" id="col_featured_scroll"> 

<?php


$list_limit = 50;
//$result = mysqli_query($connexion,"SELECT id_myf,title,autor,loves,f_creado,privacy,dofrom FROM myfive_panels LEFT JOIN users ON id_user = autor WHERE privacy = '0' ORDER BY f_creado DESC LIMIT 0,5000");
$result = mysqli_query($connexion,"SELECT id_myf,title,autor,loves,f_creado,privacy,dofrom FROM myfive_panels WHERE privacy = '0' AND dofrom!='RSS' ORDER BY f_creado DESC LIMIT 0,50");
$d_feed = array();
$autors = array();
$rss_at_limit = array();
$native_at_limit = array();
$counter = 0;

while(($row = mysqli_fetch_array($result)) && ($counter < $list_limit)){
	$discard = false;
	$author = $row['autor'];
	if ($row['dofrom']=="RSS") {
		if (!isset($rss_at_limit[$author])) {
			$rss_at_limit[$author] = 1;
		} else {
			$rss_at_limit[$author]++;
		}
		if ($rss_at_limit[$author] == 3) {
			$discard = true;
		}
	} else {
		if (!isset($native_at_limit[$author])) {
			$native_at_limit[$author] = 1;
		} else {
			$native_at_limit[$author]++;
		}
		if ($native_at_limit[$author] == 6) {
			$discard = true;
		}
	}
	if (!$discard) {
		$d_feed[$counter] = array (
			"id" => $row['id_myf'],
			"title" => $row['title'],
			"author" => $row['autor'],
			"loves" => $row['loves'],
			"date" => $row['f_creado']
		);
		$autors[$counter] = $row['autor'];
		$counter++;
	}
}
$result->close();
$idlist = implode(",",$autors);
$sql = "SELECT id_user,name_user,fb_id FROM `users` WHERE `id_user` IN (" . $idlist . ") ORDER BY FIELD(id_user," . $idlist . ")" ;
$resultset = Requete ($sql , Connexion (DB_USERNAME, DB_PASSWORD, DB_DATABASE, DB_SERVER));
$counter=0;
$autors = array();
if ($resultset) {
	// Cycle through the results and populate the array of user objects
	while ($row = $resultset->fetch_array()) {
		$autors[$row['id_user']] = array (
			'name_user' => $row['name_user'],
			'fb_id_user' => $row['fb_id']
		);
	}
	$resultset->close();
}
foreach ($d_feed as $d) {
	$id_user = $d['author'];
	$name_user = $autors[$id_user]['name_user'];
	$fb_id_user = $autors[$id_user]['fb_id_user'];
	$title=$d['title'];
	$f_creado = time_ago($d['date']);
	$id_myf=$d['id'];
	$loves=$d['loves'];
	if (!empty($title)){
		include ("templates/template_item_post2.php");
	}
}
?>



 </div>


<script type="text/javascript">

 	$('#col_featured_scroll').sbscroller(); 

</script>



  <script type="text/javascript">
  
  $('#col_featured_scroll').sbscroller('refresh'); 


  </script>
 