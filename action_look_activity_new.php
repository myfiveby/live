<?php
if (!session_id() || session_id()==""){
	session_start();
}

if (!empty($_SESSION['id'])){ 

require ('conf/sangchaud.php');
 
require ('fonction/fonction_connexion.php');

require ('fonction/fonction_requete.php'); 

 $connexion = Connexion ($login_base, $password_base, $base, $host_base); 
 /*
$query_new_activity = Requete("SELECT id_feed FROM feed
                              LEFT JOIN follow ON id_to_follow = feed.fb_id
                              WHERE  
                                 ( feed.id_feed > $_POST[from_idfeed] )
                                 AND (follow.id_user_f='$_SESSION[id]'
                              AND follow.id_to_follow = feed.fb_id
                              
                           )
                              
                              ",$connexion  );*/

     
$query_new_activity = Requete ("SELECT *, feed.f_creado FROM feed LEFT JOIN follow ON id_to_follow = feed.fb_id  WHERE  id_user_f='$_SESSION[id]' AND id_to_follow = feed.fb_id  AND id_feed > $_POST[from_idfeed]  ORDER BY feed.f_creado  ",$connexion  );

$num_following_news=mysqli_num_rows($query_new_activity);

echo   $num_following_news;
 
} else {
    
?>

<script>
    
    window.location="index.php";
    
</script>
<?php
    
}

?>
 