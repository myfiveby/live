<?php
header('Cache-Control: no-cache, must-revalidate');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Content-type: application/json');
 
require ('../conf/sangchaud.php');
require ('../fonction/fonction_connexion.php');
require ('../fonction/fonction_requete.php');

if (!isset($_GET['id']) ){
echo '[{"status":404,"message":"no id data.","response":404}]';
} else {

$connexion = Connexion ($login_base, $password_base, $base, $host_base);

// $consulta_user_datos = Requete ("SELECT id_user,name_user,url_user,url,bio,fb_id FROM users  WHERE url_user  = '$_GET[id]'  $extra_clause " , $connexion);

$query = "SELECT u.id_user, u.name_user, u.url_user, u.url, u.bio, u.fb_id,
COUNT( DISTINCT (t.id_th)) AS threadcount,
COUNT( DISTINCT (p.id_myf)) AS panelcount,
COUNT( DISTINCT (f.id_user_to_follow)) AS followscount,
COUNT( DISTINCT (fd.id_user_f)) as followers
FROM users AS u
LEFT JOIN threads AS t ON u.id_user = t.autor_th
LEFT JOIN myfive_panels AS p ON u.id_user = p.autor
LEFT JOIN follow AS f ON u.id_user = f.id_user_f
LEFT JOIN follow AS fd ON u.id_user = fd.id_user_to_follow
WHERE u.url_user = '$_GET[id]' ";

$result = Requete ($query, $connexion);

if (!$result){

echo '[{"status":404,"message":"not found.","response":404}]';

 } else {

$user = mysqli_fetch_array($result) ;

$jdata = json_encode($user);  

$id_user = $user['id_user'];
$name_user = $user['name_user'];
$bio_user = $user['bio'];
$url_user = $url_site_global.$user['url'];
$url_user = str_replace("/","\/",$url_user);
$threadcount = $user['threadcount'];
$panelcount = $user['panelcount'];
$followscount = $user['followscount'];
$followers = $user['followers'];

if ($id_user) {
 
echo '[{"status": 200,"message": "ok","user":[{"id":'.$id_user.',"name":"'.$name_user.'","bio":"'.$bio_user.'","url":"'.$url_user.'","posts":"'.$panelcount.'","conversations":"'.$threadcount.'","following":"'.$followscount.'","followedby":"'.$followers.'"}]}]'; 

} else {
	echo '[{"status":404,"message":"user not found.","response":404}]';
}

}// end if num rows
  
   
  } // end if get id
?>