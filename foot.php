  


<?php
 /*
$comprueba_exists_tit = Requete ("SELECT id_myf,f_creado,title  FROM myfive_panels    " , $connexion);
 
while ($datos_tit = mysqli_fetch_array($comprueba_exists_tit)){
$id_myf = $datos_tit['id_myf']; 
$f_creado = $datos_tit['f_creado'];

$tipo = "1";
$tiempo_UNIX=time();
$d_unix  = strtotime($f_creado);

$date_url =  $d_unix.$id_myf.$tipo;




	 $resultat_update_tit =  Requete  ("UPDATE myfive_panels
								SET 
								url = '$date_url' 
								WHERE id_myf = '$id_myf' ", $connexion);
  
}

*/


$comprueba_exists_tit = Requete ("SELECT * FROM users    " , $connexion);
 
while ($datos_tit = mysqli_fetch_array($comprueba_exists_tit)){
$id_myf = $datos_tit['id_user']; 
$f_creado = $datos_tit['f_alta']; 

$tipo = "2";
$tiempo_UNIX=time();
$d_unix  = strtotime($f_creado);

$date_url =  $d_unix.$id_myf.$tipo;

$date_url = $datos_tit['url_user']; 


	 $resultat_update_tit =  Requete  ("UPDATE users
								SET 
								url = '$date_url' 
								WHERE id_user = '$id_myf' ", $connexion);
  
  
  
}



 



$comprueba_exists_tit = Requete ("SELECT * FROM threads    " , $connexion);
 
while ($datos_tit = mysqli_fetch_array($comprueba_exists_tit)){
$id_myf = $datos_tit['id_th']; 
$f_creado = $datos_tit['f_th'];

$tipo = "3";
$tiempo_UNIX=time();
$d_unix  = strtotime($f_creado);

$date_url =  $d_unix.$id_myf.$tipo;

 

	 $resultat_update_tit =  Requete  ("UPDATE threads
								SET 
								url_th = '$date_url' 
								WHERE id_th = '$id_myf' ", $connexion);
  
 
  
}
/*
 foreach ($_SESSION as $key => $value){
  echo "$key"."=$value <br /><br />";
}

//print_r($_SESSION['userdata']); 
 */
//print_r($_SESSION['uaccounts']);









/*

$comprueba_existsf = Requete ("SELECT * FROM follow    " , $connexion);
 
while ($datos_titf = mysqli_fetch_array($comprueba_existsf)){
$id_to_follow = $datos_titf['id_to_follow'];  
 
 

$comprueba_exists_titu = Requete ("SELECT * FROM users   WHERE fb_id = '$id_to_follow' " , $connexion);
 
$datos_titu = mysqli_fetch_array($comprueba_exists_titu);
$id_user_tof = $datos_titu['id_user'];  




	 $resultat_update_tit =  Requete  ("UPDATE follow
								SET 
								id_user_to_follow = '$id_user_tof' 
								WHERE id_to_follow = '$id_to_follow' ", $connexion);
  
 
  
}
*/








?>