<?php if (!session_id() || session_id()==""){
	session_start();
} if (!empty($_SESSION['id'])){ 
//**********************************************************************************************
require ('../conf/sangchaud.php');
require ('../fonction/fonction_connexion.php');
require ('../fonction/fonction_requete.php');
$connexion = Connexion ($login_base, $password_base, $base,$host_base);

$consulta_rss_datos = Requete ("SELECT *  FROM connections_rss  WHERE user_myfiveby  = '$_SESSION[id]' AND url_rss='$_POST[url_blog]' $extra_clause " , $connexion);
 
if (mysqli_num_rows($consulta_rss_datos)== 0){
 $query_rss_datos = Requete("INSERT INTO   connections_rss (url_rss,user_myfiveby,f_connection) VALUES ('$_POST[url_blog]','$_SESSION[id]',NOW())" , $connexion);

$id_new_rss =  mysqli_insert_id($connexion);  
 
 
	  echo  '<div id="buton_'.$id_new_rss.'" class="texto_13 gris item_rss_connected" style="padding:5px;width:90%;float:left;text-align:left;margin-left:15px;">  <div style="display:inline-block;cursor:pointer;" class="button white small texto_12 " onClick="remove_rss_to_my5(\''.$id_new_rss.'\')">  x </div>'.$_POST['url_blog'].'</div>';

	
 
 }else { echo "<div style=\"width:100%;text-align:center;font-size:14px;color:#999;\">This Blog is already connected.</div>";} 
        } else { echo "KO";} ?>