<?php
function do_feed($fb_id, $name_user, $action, $location, $tipo, $id_location, $you) {
if (!session_id() || session_id()==""){
	session_start();
}
 
require ('conf/sangchaud.php');  
$connexion = Connexion ($login_base, $password_base, $base, $host_base); 
/*
`id_feed` INT( 30 ) NOT NULL AUTO_INCREMENT ,
`name_user` TEXT NOT NULL ,
`fb_id` VARCHAR( 100 ) NOT NULL ,
`action` INT( 2 ) NOT NULL ,
`location` TEXT NOT NULL ,
`f_creado` DATETIME NOT NULL ,
`privacity` INT( 1 ) NOT NULL DEFAULT  '1*/

if ($_SESSION['id'] == $you  ){

           
switch ($action){
 
case 1: $action_text=" created a panel ";
  $comprueba_location = Requete ("SELECT title, privacy FROM myfive_panels  WHERE id_myf  = '$id_location'    " , $connexion);
  $datos_location = mysqli_fetch_array($comprueba_location) ; 
  $location = $datos_location['title'];
  $privacy = $datos_location['privacy'];
  break;
  
case 2: $action_text=" just start follow ";
  
  $comprueba_location = Requete ("SELECT name_user FROM users WHERE fb_id = '$id_location'    " , $connexion);
  $datos_location = mysqli_fetch_array($comprueba_location) ; 
  $location = $datos_location['name_user'];
  
  
   break;
	
	
	
case 3: $action_text=" love panel: ";
  $comprueba_location = Requete ("SELECT title,privacy,autor FROM myfive_panels  WHERE id_myf  = '$id_location'    " , $connexion);
  $datos_location = mysqli_fetch_array($comprueba_location) ; 
  $location = $datos_location['title'];          
  $privacy = $datos_location['privacy'];
  $autor = $datos_location['autor'];
  
  
  /**

  $comprueba_autor_post_loved = Requete ("SELECT name_user, fb_id FROM users WHERE id_user = '$autor'    " , $connexion);

  $datos_autor_post_loved= mysqli_fetch_array($comprueba_autor_post_loved) ; 

 $fb_id_loved =  $datos_autor_post_loved['fb_id'];
 $name_user =  $datos_autor_post_loved['name_user'];

  $action_text_n ="$_SESSION[user_name] loves your post: ".$location;
    
$query_paneldo_feed = Requete("INSERT INTO notifications
	(name_user,fb_id,id_action,action_text,extra_text,tipo, id_location, location, f_creado, privacity )                             VALUES
	('$name_user','$fb_id_loved','3','$action_text_n','$extra_text','$tipo','$id_location','$location',NOW(),'0')" , $connexion);
  */
 break;
 
 
case 4: $action_text=" set fav panel:";
  $comprueba_location = Requete ("SELECT title,privacy FROM myfive_panels  WHERE id_myf  = '$id_location'    " , $connexion);
  $datos_location = mysqli_fetch_array($comprueba_location) ; 
  $location = $datos_location['title'];    
  $privacy = $datos_location['privacy'];
  break;
  
  

case 5: $action_text=" start a conversation at ";


$comprueba_location = Requete ("SELECT name_th, privacy FROM threads  WHERE id_th  = '$id_location'    " , $connexion);

  $datos_location = mysqli_fetch_array($comprueba_location) ; 

  $location = $datos_location['name_th'];

  $privacy = $datos_location['privacy'];



break;

  

case 55:

$action_text=" contribute to conversation:  ";
$name_user = $_SESSION['username'];
$fb_id= $_SESSION['fb_id'];
 
$query_thread_notif = mysqli_query($connexion,"SELECT autor_th,id_th,name_th FROM  threads  WHERE id_th = '$id_location'");

$result_thread_notif = mysqli_fetch_array($query_thread_notif);		



$id_user = $result_thread_notif['autor_th'];

$id_location = $result_thread_notif['id_th'];

$location = $result_thread_notif['name_th'];


  $comprueba_autor_post = Requete ("SELECT name_user FROM users WHERE id_user = '$id_user'    " , $connexion);

  $datos_autor_post= mysqli_fetch_array($comprueba_autor_post) ; 

 $extra_text =  " by ".$datos_autor_post['name_user'];




break;

	
	
	
	
	

case 6: $action_text=" add a panel to this conversation: "; break; 

	
	

case 7: $action_text=" commented on ";
	
	
  $comprueba_location = Requete ("SELECT title,privacy,autor FROM myfive_panels  WHERE id_myf  = '$id_location'    " , $connexion);

  $datos_location = mysqli_fetch_array($comprueba_location) ; 

  $location = $datos_location['title'];          

  $privacy = $datos_location['privacy'];

  $autor_post = $datos_location['autor'];




  $comprueba_autor_post = Requete ("SELECT name_user FROM users WHERE id_user = '$autor_post'    " , $connexion);

  $datos_autor_post= mysqli_fetch_array($comprueba_autor_post) ; 

 $extra_text =  " by ".$datos_autor_post['name_user'];


	
	break; 

		

	

	case 8: $action_text=" love conversation: ";

  $comprueba_location = Requete ("SELECT name_th,privacy,autor_th FROM threads  WHERE id_th  = '$id_location'    " , $connexion);

  $datos_location = mysqli_fetch_array($comprueba_location) ; 

  $location = $datos_location['name_th'];          

  $privacy = $datos_location['privacy'];
  $autor = $datos_location['autor_th'];
 



  $comprueba_autor_post = Requete ("SELECT name_user FROM users WHERE id_user = '$autor'    " , $connexion);

  $datos_autor_post= mysqli_fetch_array($comprueba_autor_post) ; 

 $extra_text =  " by ".$datos_autor_post['name_user'];



 break;

	

	case 9: $action_text=" fav conversation: ";

  $comprueba_location = Requete ("SELECT name_th,privacy,autor_th FROM threads  WHERE id_th  = '$id_location'    " , $connexion);

  $datos_location = mysqli_fetch_array($comprueba_location) ; 

  $location = $datos_location['name_th'];          

  $privacy = $datos_location['privacy'];
  $autor = $datos_location['autor_th'];
 



  $comprueba_autor_post = Requete ("SELECT name_user FROM users WHERE id_user = '$autor'    " , $connexion);

  $datos_autor_post= mysqli_fetch_array($comprueba_autor_post) ; 

 $extra_text =  " by ".$datos_autor_post['name_user'];



 break;

} 


				if (empty($privacy))$privacy=0;
				
		  $comprueba_feed = Requete ("SELECT * FROM feed  WHERE name_user  = '$name_user'  AND fb_id  = '$fb_id'  AND action_text  = '$action_text'  AND tipo  = '$tipo'  AND id_action  = '$action'  AND id_location  = '$id_location'    AND privacity  = '$privacy'    " , $connexion);
 
        if (mysqli_num_rows($comprueba_feed) == 0){
 
$query_paneldo_feed = Requete("INSERT INTO feed (name_user,fb_id,id_action,action_text,extra_text,tipo, id_location, location, f_creado, privacity )                                     VALUES ('$name_user','$fb_id','$action','$action_text','$extra_text','$tipo','$id_location','$location',NOW(),'$privacy')" , $connexion);
$id_feed= mysqli_insert_id($connexion);





if ($action==7){

	 $registra_comment_panel =  Requete  ("UPDATE comments SET 
								rel_feed = '$id_feed' 

								WHERE autor_coment = '$_SESSION[id]'  AND relacionado_coment='$id_location'", $connexion); 


	
	 
	
}

							}



 } //if ($_SESION['id'] == $you  ){





}


?>