<?php

/* ******    Class  usuario myfibeby.com  Alex Garcia @holasoyalex  ******    */

class usuario { 
    var $id; 
    var $nombre;   
    var $lang="en"; 
    
    
public  function conectado ($user_conectado){

    
require ("conf/sangchaud.php");

// $connexion2 = mysql_connect($host_base,$login_base,$password_base); 
$connexion2 = mysqli_connect("p:".$host_base,$login_base,$password_base); 


 mysqli_select_db($connexion2,$base);
     $query3 =   mysqli_query($connexion2,"SELECT * FROM users WHERE id_user = '$this->user_conectado'");
		 $result3 = mysqli_fetch_array($query3);
 		$id= $result3['id_user'];
		$fb_id = $result3['fb_id'];
		$oauth_provider = $result3['oauth_provider'];
		$nombre = $result3['name_user'];
		$url = $result3['url_user'];
		
		
		
		return $id;
		return $fb_id;		
		return $oauth_provider;
		return $nombre;		
		return $url; 
} 
 
}  // end class
?>