<?php 
if (!session_id() || session_id()==""){
	session_start();
} 
  
require ('conf/sangchaud.php');

require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php');
require ('fonction/fonction_formato_fecha.php');
require ('fonction/time_ago.php');

 $connexion = Connexion ($login_base, $password_base, $base, $host_base);

	   
 
?>
 
 <script type="text/javascript">$('#scrollcolpost').sbscroller();</script>

<div style="width:99%;height:98%;margin:0px;left:0;margin-top:5px;float:left;text-align:left;" align="left"  class="box_results_feed" id="scrollcolpost"> 
<?php
 

			 
	$query_new_panel_imf = mysqli_query($connexion,"SELECT id_myf,title,autor,loves,f_creado,privacy FROM  myfive_panels WHERE privacy = '0'  AND autor <> '' ORDER BY loves DESC LIMIT 0,50");

  while($result_panel = mysqli_fetch_array($query_new_panel_imf)){		


$id_myf = $result_panel['id_myf'];
$titulo_panel = $result_panel['title'];
$autor_panel = $result_panel['autor'];
$loves = $result_panel['loves'];
$privacy_post = $result_panel['privacy'];
														
		$f_creado =  $result_panel['f_creado'] ;



if (($privacy_post == 0) OR ( $privacy_post == 1  AND $autor_panel == $_SESSION['id'])){


$consulta_user_datos = Requete ("SELECT id_user,name_user,fb_id  FROM users  WHERE id_user  = '$autor_panel'  $extra_clause " , $connexion);
$datos_user = mysqli_fetch_array($consulta_user_datos) ;
$id_user = $datos_user['id_user'];
$name_user = $datos_user['name_user'];
$fb_id_user = $datos_user['fb_id'];

	 	/*$fb_id_user="";
	$name_user=""; 
	$id_post="";  
	$title=""; 
	$loves="";
	$f_creado="";  */
	
	$title=$titulo_panel;                                    
$f_creado = time_ago($f_creado);
 
 if (!empty($titulo_panel)){
 include ("templates/template_item_post.php");
 }
 
 } // end while
 } // if privacy
 

?>

</div>


 

<script type="text/javascript">$('#scrollcolpost').sbscroller('refresh');</script>

  <script type="text/javascript"> $('#col_featured_scroll').sbscroller('refresh');</script>
