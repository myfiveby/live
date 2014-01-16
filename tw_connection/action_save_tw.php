<?php if (!session_id() || session_id()==""){
	session_start();
} if (!empty($_SESSION['id'])){ 
//**********************************************************************************************

require ('../conf/sangchaud.php');

require ('../fonction/fonction_connexion.php');
require ('../fonction/fonction_requete.php');
$connexiontw = Connexion ($login_basetw, $password_basetw, $basetw,$host_basetw);


	$_POST['user_twitter'] = str_replace("@","",$_POST['user_twitter']); 


$consulta_tw_datos = Requete ("SELECT *  FROM connections_twitter  WHERE user_myfiveby  = '$_SESSION[id]' AND user_twitter='$_POST[user_twitter]' $extra_clause " , $connexiontw);
 
 if (mysqli_num_rows($consulta_tw_datos)== 0){
 $query_rss_datos = Requete("INSERT INTO   connections_twitter (user_twitter,user_myfiveby,f_connection,status_connection) VALUES ('$_POST[user_twitter]','$_SESSION[id]',NOW(),'1')" , $connexiontw);
 
  
 echo "<div>Connected!</div>";
 }else { echo "This user is already connected.";} 
        } else { echo "KO";} ?>