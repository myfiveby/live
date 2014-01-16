<?php
/*
Uploadify
Copyright (c) 2012 Reactive Apps, Ronnie Garcia
Released under the MIT License <http://www.opensource.org/licenses/mit-license.php> 
*/

// Define a destination
$targetFolder =  '/u_i/'.$_POST['u']."/"; // Relative to the root
$targetFoldert =  '../u_i/'.$_POST['u']."/"; // Relative to the root


if (!is_dir($targetFoldert)){ mkdir($targetFoldert,0777); }




if (!empty($_FILES)) {
	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetPath = $_SERVER['DOCUMENT_ROOT'] . $targetFolder;
	//$targetPath = $targetFolder;
	$targetFile = rtrim($targetPath,'/') . '/' . $_FILES['Filedata']['name'];
	
	// Validate the file type
	$fileTypes = array('jpg','jpeg','gif','png'); // File extensions
	$fileParts = pathinfo($_FILES['Filedata']['name']);
	
	if (in_array($fileParts['extension'],$fileTypes)) {
		move_uploaded_file($tempFile,$targetFile);
		//echo '1';
		
		//var_dump($_FILES['Filedata']);
		//echo "<br>".$targetFile."<br><br>".$targetFolder;
		
 	
		 
require ('../conf/sangchaud.php');
require ('../fonction/fonction_connexion.php');
require ('../fonction/fonction_requete.php');

$connexion = Connexion ($login_base, $password_base, $base, $host_base);
      
       
      $new_image = $_FILES['Filedata']['name'];
$save_connection = Requete("INSERT INTO img_posts_users (nom_image, owner_image, post_id, f_uploaded)  VALUES ('$new_image','$_POST[u]','$_POST[p]',  NOW() ) ", $connexion);
 
 $id_base =  mysqli_insert_id($connexion);
	 
  
  echo '<li id="listItem_'.$id_base.'"  class="picture_post_m"><img src="'.$targetFolder.$new_image.'" class="picture_post_th" width="60"><div><img src="../img/ico_remove.png" onClick="remove_picture_fpost(\''.$id_base.'\',\''.$_POST['u'].'\',\''.$new_image.'\');" style="cursor:pointer;margin_2px; width:18px;border:1px solid #eee;padding:1px;"></div></li>';		
		
		
		
		
		
		
		
		
		
		
		
	} else {
		echo 'Invalid file type.';
	}
}
?>