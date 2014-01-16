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

<div  style="width:99%;height:99%;margin:0px;left:0;margin-top:5px;float:left;text-align:left;" align="left" id="col_featured_scroll"> 
<?php

$query_new_panel_imf = mysqli_query($connexion,"SELECT id_myf,title,autor,loves,f_creado,privacy FROM  myfive_panels LEFT JOIN users ON id_user = autor WHERE privacy = '0'  ORDER BY f_creado DESC LIMIT 0,50");

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
 ?>
 
 <div id="p_<?php echo $id_myf; ?>" style="margin-bottom:5px;margin-top:5px;">																										 
<div id="image_user"  style="float:left; padding:4px;width:40px;display:inline-block;cursor:pointer;" onclick="show_user('<?php echo $fb_id_user; ?>');"  ><img src="https://graph.facebook.com/<?php echo $fb_id_user;?>/picture" width="40" align="absmiddle" alt="<?php echo $name_user; ?>"  style="-webkit-border-radius: .5em;-moz-border-radius: .5em;	border-radius: .5em;border:0px;"></div>
 				 
<div style="position:relative; width:185px; float:left;left:0px;padding-top:0px;text-align:left;"  class="texto_10 gris">

<a  href="javascript:void_()" onclick="show_panel_main('<?php echo $id_myf; ?>');"  class="texto_13 negro"><?php echo $title; ?> </a>

 	           
  <div class="texto_10 negro" style="float:left;margin-left:0px;width:180px;display:inline-block;letter-spacing:0px;padding:0px;padding-top:0px; " > by<a href="javascript:void_()"; onclick="show_user('<?php echo $fb_id_user; ?>');"   ><?php echo " <d class=\"texto_10 azul\">".$name_user."</span> </a> <br /><div class=\"texto_10 gris\"  style=\"display:inline-block;\"> &#9638; ".$f_creado; ?></div>
  
  
  <div  class=" negro ico_love_base"   style="float:right;display:inline-block;height:19px;"><?php echo $loves; ?></div> 
 
  
  
  </div>
  
  
 

  
  
 </div>	
 
 
<div style="width:95%;clear:both;border-bottom:1px solid #ddd; height:10px;margin-left:4px;margin-bottom:5px;margin-top:5px;"> </div>
 
 
 <?php 
 }
 
 } // end while
 } // if privacy
 

?>

 </div>


<script type="text/javascript">

 	$('#col_featured_scroll').sbscroller(); 

</script>


  <script type="text/javascript">
  
  $('#col_featured_scroll').sbscroller('refresh'); 


  </script>
 