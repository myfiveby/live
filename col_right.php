<div class="tit_box" style=" height:30px;">
<div  style="display:inline-block;float:right; height:20px;padding:4px;padding-top:0px; ">
<a href="javascript:void_()" class=" button white small bigrounded" onClick="close_box('col_lat_right')"><b>x</b></a></div>


<div id="" style="display:inline-block;float:left;height:25px;padding:4px;padding-left:4px;text-shadow:1px 1px 1px #ffffff;" class="tit_col_box">
<b>Posts</b></div>

</div>

 
	<script type="text/javascript">
$().ready(function(){
		$('#scrollcolright').lionbars();
	}); // end ready

</script>
<div id="scrollcolright" style="width:260px;height:250px;">
 

<?php
?>



<?php


	$query_new_panel_imf = mysqli_query($connexion,"SELECT * FROM  myfive_panels ORDER BY f_creado DESC LIMIT 0,50");

  while($result_panel = mysqli_fetch_array($query_new_panel_imf)){		


$id_myf = $result_panel['id_myf'];
$titulo_panel = $result_panel['title'];
$autor_panel = $result_panel['autor'];



$consulta_user_datos = Requete ("SELECT id_user,name_user,fb_id  FROM users  WHERE id_user  = '$autor_panel'  $extra_clause " , $connexion);
$datos_user = mysqli_fetch_array($consulta_user_datos) ;
$id_user = $datos_user['id_user'];
$name_user = $datos_user['name_user'];
$fb_id_user = $datos_user['fb_id'];


echo "
<div style=\"padding:4px;\"><a href=\"javascript:void_()\" onclick=\"show_panel_main('$id_myf')\"  class=\" texto_14 negro\">".$titulo_panel."</a><br><a href=\"javascript:void_()\"  onClick=\"show_user('$fb_id_user')\"   class=\" texto_9 negro\"><font size=\"1\" color=\"#a1a1a1\">by $name_user</font></a></div>";

 }
 



?></div> 