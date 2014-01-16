<?php 
if (!empty($_SESSION['id'])){

 
?>
<div style="clear:both;">  
<?php
if (!empty($_SESSION['id'])){

echo "
<div id=\"caja_user_datos\" valign=\"middle\">
<div id=\"image_user\" ><img src=\"https://graph.facebook.com/".$_SESSION['fb_id']."/picture\" width=\"26\" align=\"absmiddle\" alt=\"You!\"></div>&nbsp;&nbsp;<a href=\"index.php?q=profile\" class=\"texto blanco\" title=\"You\"><p><u>".$_SESSION['username']."</u></p></a> 
&nbsp;&nbsp;<a href=\"home.php?q=profile\" class=\" negro\">".$url."</a></div>";

}
?>
<?php 

$comprueba_exists_panels = Requete ("SELECT title, id_myf FROM myfive_panels  WHERE autor  = '$_SESSION[id]'    ORDER BY orden ASC" , $connexion);
 
 $cont = 1; 
 
 if (mysqli_num_rows($comprueba_exists_panels) !==0 ){

echo "<div align=\"center\"  style=\"padding:5px;\">
<a href=\"crear_new_panel.php?zt=$_SESSION[id]\" rel=\"ventana\" class=\"button blue  big \" title=\"+ Create a new panel\">+ New Panel</a>
 </div> 
<ul id=\"lista_panels_left\" style=\"margin:0;padding:0px;width:100%;\">";

while ($datos_panels = mysqli_fetch_array($comprueba_exists_panels) ){
?>
<li class="item_menu_lat"  id="tit_col_<?php echo $datos_panels['id_myf']; ?>">


<div class="handle" style="width:25px;float:left;display:inline-block;cursor:pointer;background:transparent;"><img src="img/ico_list.png" width="20" alt="" align="absmiddle"  ></div>

<a href="javascript:void_()"; onclick="show_panel_main('<?php echo $datos_panels['id_myf']; ?>');"  class=" texto_12 negro">
<div style="margin-left:30px;" id="item_lateral_<?php echo $datos_panels['id_myf']; ?>"><?php echo $datos_panels['title']; ?></a></div>




</li>
<?php

}  // end while
}  // end num rows

echo "

</ul> 
";    

 ?>

<div style="clear:both;">&nbsp;</div>
</div>

<?php

} else  {
echo "create yours";
 
echo "
<div id=\"caja_user_datos\" valign=\"middle\">
<div id=\"image_user\" ><img src=\"https://graph.facebook.com/".$user_fb_id."/picture\" width=\"30\" align=\"absmiddle\" alt=\"You!\"></div>&nbsp;&nbsp;<a href=\"home.php?q=profile\" class=\"texto negro\" title=\"You\">".$user_name."</a>  </div>";
?>

 
 
<img src="img/line_user_bottom.png" alt="" align="absmiddle"  >

<?php 

$comprueba_exists_panels = Requete ("SELECT title, id_myf FROM myfive_panels  WHERE autor  = '$id_user'    ORDER BY orden ASC" , $connexion);
 
 $cont = 1; 
 
 if (mysqli_num_rows($comprueba_exists_panels) !==0 ){

echo " 
 <div style=\"clear:both;\">&nbsp;</div>
<ul id=\"lista_panels_left\" style=\"margin:0;padding:0px;width:100%;\">";

while ($datos_panels = mysqli_fetch_array($comprueba_exists_panels) ){
?>

<li class="item_menu_lat texto_10" id="tit_col_<?php echo $datos_panels['id_myf']; ?>">
<div style="width:30px;float:left;height:30px;display:inline-block;">

<div class="handle" style="cursor:pointer;background:transparent;"><img src="img/ico_list.png" alt="" align="absmiddle"  ></div></div>
<div style="width:280px;float:left;margin-left:10px;display:inline-block;" id="item_lateral_<?php echo $datos_panels['id_myf']; ?>">
<a href="javascript:void_()" onclick="show_panel_main('<?php echo $datos_panels['id_myf']; ?>');"  class=" texto_12 negro"><?php echo $datos_panels['title']; ?></a>

</div>
<!--<div id="" class="" style="position:relative;top:0px;float:right;display:inline-block;width:10px;" ><a href="javascript:void_()" onClick="borrar_panel('<?php echo $datos_panels['id_myf']; ?>');"  class="modal"   ><img src="img/bot_close_mini.png" border="0"></a></div>-->
</li>  

<?php

}  // end while
}  // end num rows

echo "

</ul>
<div id=\"info\"></div>
";    

 ?>
 <br>
 
<?php

}

?>
<?php 
if (!empty($_SESSION['id'])){
 
 	$cuantos_amigos_comun=count($_SESSION['friends_comun']);	
 	
	if ($cuantos_amigos_comun>=1)echo"Algunos amigos tuyos ya est&aacute;n en myFIVEby.com <br />";
	//print_r($friends_comun);
	
	foreach ($_SESSION['friends_comun'] as $value) { 
    echo"<div style=\"padding:2px;display:inline-block;\" id=\"avatar_friend_".$value."\"><img src=\"https://graph.facebook.com/".$value."/picture\" width=\"45\" align=\"absmiddle\" alt=\"\"><br /><a href=\"javascript:void_()\" onClick=\"follow_user(".$value.")\" class=\"texto_9 negro\">Follow</a></div>";
  
    
}
	
	
?>
<br /><br>
<b>Follow </b>(<?php echo count($lista_amigos); ?>)
<div id="box_follow"> 
<?php 

if ( count($lista_amigos)>0 ){
	foreach ($lista_amigos as $key => $value1) {
    echo"<div style=\"padding:2px;display:inline-block;\" id=\"avatar_friend_".$value1."\"><a href=\"javascript:void()\"  onClick=\"show_user('".$value1."')\"   class=\" texto_9 negro\"><img src=\"https://graph.facebook.com/".$value1."/picture\" width=\"45\" align=\"absmiddle\" alt=\"\" border=\"0\" ><br />View</a></div>";
}
}
 ?>

</div>
<br />
<br />
<b>Invite your friends</b><br /><br>
<b>Followers</b><br /><br>
<br />
<?php

} else  {
echo "create yours";

}

?>
