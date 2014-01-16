<?php 
if (!session_id() || session_id()==""){
	session_start();
}
require ('conf/sangchaud.php');
require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php');
$connexion = Connexion ($login_base, $password_base, $base, $host_base);


if ($_SESSION['id']==$_POST['izt']){ 

  	$query_new_panel_user = mysqli_query($connexion,"SELECT * FROM users WHERE id_user = '$_POST[izt]'"  );
  	
  	
  	if (mysqli_num_rows($query_new_panel_user) >0 ){
  	
      	$query_new_panel_imf = mysqli_query($connexion,"SELECT * FROM  myfive_panels WHERE id_myf = '$_POST[imf]'"  );
      	
      	
  		if (mysqli_num_rows($query_new_panel_imf) >0 ){
  	
    		$result_panel = mysqli_fetch_array($query_new_panel_imf);		
		$_POST['id_user'] = $result_panel['autor'];
 
    
    
   
if ( $_POST['izt'] == $_POST['id_user'] ){  
 	$del_panel = mysqli_query($connexion,"DELETE  FROM myfive_panels  WHERE id_myf = '$_POST[imf]'"  );
 	$del_panel = mysqli_query($connexion,"DELETE  FROM myfive_content  WHERE id_myf = '$_POST[imf]'"  );


    
    }
    
    
    
    
    
    
    
    
    
    } // end mysqli_num_rows($query_new_panel_imf) >0
      else {

echo "ERROR!";

}
    
    
 	$del_panel_feed = mysqli_query($connexion,"DELETE  FROM feed  WHERE tipo ='p' AND id_location = '$_POST[imf]'"  );
 	$del_panel_fav = mysqli_query($connexion,"DELETE  FROM fav  WHERE fav_panel = '$_POST[imf]'"  );
 	$del_panel_fix_panel = mysqli_query($connexion,"DELETE  FROM  fix_panel  WHERE id_panel_fix = '$_POST[imf]'"  );
 	$del_panel_loves = mysqli_query($connexion,"DELETE  FROM  loves  WHERE love_panel = '$_POST[imf]'"  );
 	$del_panel_comments = mysqli_query($connexion,"DELETE  FROM   comments  WHERE relacionado_coment = '$_POST[imf]'"  );
 	$del_panel_rel_threads = mysqli_query($connexion,"DELETE  FROM   rel_threads  WHERE id_panel	 = '$_POST[imf]'"  );
 	$del_panel_history = mysqli_query($connexion,"DELETE  FROM history  WHERE object ='p'  AND id_object = '$_POST[imf]'"  );
    
    
  	   } // end (mysqli_num_rows($query_new_panel_user) >0
  	
  	  else {
echo "ERROR!";
}
   
       
 
?>
 
<?php } else {

echo "ERROR!";

}?>