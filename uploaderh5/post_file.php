<?php
if (!session_id() || session_id()==""){
	session_start();
}
// If you want to ignore the uploaded files, 
// set $demo_mode to true;

require ('../fonction/fonction_url.php');
$demo_mode = false;
//$upload_dir = '../u_i/';
$upload_dir = '../u_i/'.$_SESSION['id'].'/';


if (!is_dir($upload_dir)){ mkdir($upload_dir,0777); }


$allowed_ext = array('jpg','jpeg','png','gif');


if(strtolower($_SERVER['REQUEST_METHOD']) != 'post'){
	exit_status('Error! Wrong HTTP method!');
}


if(array_key_exists('pic',$_FILES) && $_FILES['pic']['error'] == 0 ){
	
	$pic = $_FILES['pic'];
	
	      
     $pic['name'] =  clean_chars_($pic['name']);

	if(!in_array(get_extension($pic['name']),$allowed_ext)){
		exit_status('Only '.implode(',',$allowed_ext).' files are allowed!');
	}	

	if($demo_mode){
		
		// File uploads are ignored. We only log them.
		
		$line = implode('		', array( date('r'), $_SERVER['REMOTE_ADDR'], $pic['size'], $pic['name']));
		file_put_contents('log.txt', $line.PHP_EOL, FILE_APPEND);
		
		exit_status('Uploads are ignored in demo mode.');
	}
	
	
	// Move the uploaded file from the temporary 
	// directory to the uploads folder:
	
	if(move_uploaded_file($pic['tmp_name'], $upload_dir.$pic['name'])){
		
		
		
		
		 
require ('../conf/sangchaud.php');
require ('../fonction/fonction_connexion.php');
require ('../fonction/fonction_requete.php');

$connexion = Connexion ($login_base, $password_base, $base, $host_base);
      
       
      
$save_connection = Requete("INSERT INTO img_posts_users (nom_image, owner_image, post_id, f_uploaded)  VALUES ('$pic[name]','$_SESSION[id]','$_POST[id_post_upload]',  NOW() ) ", $connexion);
 
 $id_base =  mysqli_insert_id($connexion);
	}
	
}

exit_status('Something went wrong with your upload!');


// Helper functions

function exit_status($str){
	echo json_encode(array('status'=>$str));
	exit;
}

function get_extension($file_name){
	$ext = explode('.', $file_name);
	$ext = array_pop($ext);
	return strtolower($ext);
}
?>