<?php
if (!session_id() || session_id()==""){
	session_start();
}
if (!empty($_SESSION['id'])){
 
require ('conf/sangchaud.php');

require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php');
require ('fonction/fonction_formato_fecha.php');
require ('fonction/time_ago.php');
 $connexion = Connexion ($login_base, $password_base, $base, $host_base);
  
 

 
?> 
 
	<script type="text/javascript">
	
	  $('#scrollcolfeed').sbscroller();
 
</script>
 
<div id="scrollcolfeed" style="padding:4px;width:250px;height:97%;">

<?php 

$comprueba_history_panels = Requete ("SELECT * FROM history  LEFT JOIN users ON fb_id_object = fb_id   WHERE history.id_user  = '".$_SESSION['id']."' ORDER BY date_view DESC LIMIT 0,30" , $connexion);
 
$cont = 1;
 
 if (mysqli_num_rows($comprueba_history_panels) !==0 ){
 
 
 ?>
 

<!-- <div id="scrollcolhist" style="width:260px;height:250px;"> -->
 
 <?php
 
 
echo " 
<ul id=\"user_lista_panels_left\" style=\"margin:0;padding:0px;width:100%;\">";

while ($datos_panels = mysqli_fetch_array($comprueba_history_panels) ){

$date_item   = retour_date_formater($datos_panels['date_view'], '3');
$date_item   = "<span class=\"texto_9 gris\" >".$date_item."</span>";
	                         
$f_creado = time_ago($datos_panels['date_view']);

$id_myf = $datos_panels['id_object'];
$fb_id_user =  $datos_panels['fb_id_object'];
$name_user = $datos_panels['name_user'];
$title = $datos_panels['text_object'];
$object = $datos_panels['object'];
$bio = $datos_panels['bio']; 
?>

<?php if ($object == "p") {
 
$comprueba_exists_tit = Requete ("SELECT  loves FROM myfive_panels  WHERE id_myf  = '$id_myf' " , $connexion);
$datos_tit = mysqli_fetch_array($comprueba_exists_tit) ;
$loves = $datos_tit['loves'];
 
 
include("templates/template_item_post.php");
 
}
if ($object == "u") {

include("templates/template_item_user.php");
 
}
 

} // while
echo "</ul>";
?>
 
 
 

<?php
 
} // end  num rows


} // end  empty session id
?>