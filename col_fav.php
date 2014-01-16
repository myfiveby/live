<?php 
if (!session_id() || session_id()==""){
	session_start();
}
$extra_clause="";
if (!empty($_SESSION['id'])){
  
require ('conf/sangchaud.php');

require ('fonction/fonction_connexion.php');
require ('fonction/fonction_requete.php');
require ('fonction/fonction_formato_fecha.php');
require ('fonction/time_ago.php');
 $connexion = Connexion ($login_base, $password_base, $base, $host_base);
 
?>  	<!--


 <div class="tit_box" style=" height:30px;">
<div  style="display:inline-block;float:right; height:20px;padding:4px;padding-top:0px; ">
<a href="javascript:void_()" class=" button white small bigrounded" onClick="hide_fav_menu()"><b>x</b></a></div>


<div id="" style="display:inline-block;float:left;height:25px;padding:4px;padding-left:4px;">
<a href="javascript:void_()";  class=" texto_14 tit_col_box"><img src="img/ico_fav_top.png"   alt="History" align="absmiddle"> Favorites</div>
</div>
 
 
-->
	<script type="text/javascript">
$().ready(function(){  $('#scrollcolfav').sbscroller();
		 
	}); // end ready

</script>	
<div id="scrollcolfav" style="padding:4px;width:245px;height:97%;">
<?php 

$comprueba_fav_panels = Requete ("SELECT * FROM favs LEFT JOIN myfive_panels ON id_myf = fav_panel WHERE fav_users  = '".$_SESSION['id']."'  ORDER BY f_fav DESC " , $connexion);
 
$cont = 1;
 
 if (mysqli_num_rows($comprueba_fav_panels) !==0 ){
 
 
 
while ($datos_panels = mysqli_fetch_array($comprueba_fav_panels) ){



 $fav_panel = $datos_panels['fav_panel'];
 
 
 
 	 
	$query_new_panel_imf = mysqli_query($connexion,"SELECT id_myf,title,autor,favs,f_creado FROM  myfive_panels WHERE id_myf ='$fav_panel'   ORDER BY f_creado DESC LIMIT 0,50");

  $result_panel = mysqli_fetch_array($query_new_panel_imf);


$id_myf = $result_panel['id_myf'];
$titulo_panel = $result_panel['title'];
$autor_panel = $result_panel['autor'];
$favs = $result_panel['favs'];
														
		$f_creado =  $result_panel['f_creado'] ;


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
 
 include ("templates/template_item_fav.php");
							 }
?>
 


<?php


} // while 
?>
 
</div>
 


<?php
 
} // end  num rows
	else {
	
 
 echo "<div class=\"texto_13 gris  \" style=\"margin:0 auto;text-align:center;width:99%;\"><br><br><br><br>Posts you mark as favorites will appear here</div>";
	
	
	}

} // end  empty session id
?>
</div>