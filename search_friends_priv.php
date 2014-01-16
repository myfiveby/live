<?php 
if (!session_id() || session_id()==""){
	session_start();
}
 
 
require ('conf/sangchaud.php');
require ("fonction/fonction_connexion.php");
require ("fonction/fonction_requete.php");

$connexion = Connexion ($login_base, $password_base, $base, $host_base);
 
    $q = $_POST['term'];

		$search_t = "[";

    
$query_friends = mysqli_query($connexion,"SELECT * FROM follow LEFT JOIN users ON fb_id = id_to_follow WHERE  id_user_f='$_SESSION[id]' AND name_user LIKE '%$q%' "   );
$num_following=mysqli_num_rows($query_friends);

 
while($lista_amigos_view = mysqli_fetch_array($query_friends)){


		$id_user_fw = $lista_amigos_view['id_user'];
		$id_user_f = $lista_amigos_view['id_to_follow'];
		$bio_user = $lista_amigos_view['bio'];
		
		$name_user =  $lista_amigos_view['name_user'];
	
	
	
	
	if($name_user){

	   $search_t .= '{"first_name":"'.$id_user_fw.'","label":"'.$name_user.'","value":"'.$id_user_fw.'"},';
 
  
}
}




$search_t .= $search_t."]";

$search_t = str_replace("},]","}]",$search_t);
																 echo $search_t;

 
?>