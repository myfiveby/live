<?php 
if (!empty($_SESSION['id'])){

echo "
<div id=\"caja_user_datos\" valign=\"middle\">
<div id=\"image_user\" ><img src=\"https://graph.facebook.com/".$_SESSION['fb_id']."/picture\" width=\"30\" align=\"absmiddle\" alt=\"You!\"></div>&nbsp;&nbsp;<a href=\"home.php?q=profile\" class=\"texto negro\" title=\"You\">".$_SESSION['username']."</a> 
&nbsp;&nbsp;<a href=\"home.php?q=profile\" class=\" negro\">".$url."</a></div>";


?>
<div style="clear:both;"> 
<img src="img/line_user_bottom.png" alt="" align="absmiddle"  >

<?php 

$comprueba_exists_panels = Requete ("SELECT title, id_myf FROM myfive_panels  WHERE autor  = '$_SESSION[id]'    ORDER BY orden ASC" , $connexion);
 
 $cont = 1; 
 
 if (mysqli_num_rows($comprueba_exists_panels) !==0 ){

echo "<div style=\"text-align:right;width:100%;height:30px;float:right;\" class=\"gris modal button white medium\"  >
<a href=\"crear_new_panel.php?zt=$_SESSION[id_user]\" rel=\"ventana\" title=\"+ Create a new panel\">+ New Panel</a>
 </div>
 <div style=\"clear:both;\">&nbsp;</div>
<ul id=\"lista_panels_left\" style=\"margin:0;padding:0px;width:100%;\">";

while ($datos_panels = mysqli_fetch_array($comprueba_exists_panels) ){
?>

<li class="item_menu_lat texto_10" id="tit_col_<?php echo $datos_panels['id_myf']; ?>">
<div style="width:30px;float:left;height:30px;display:inline-block;">

<div class="handle" style="cursor:pointer;background:transparent;"><img src="img/ico_list.png" alt="" align="absmiddle"  ></div></div>
<div style="width:150px;float:left;margin-left:10px;display:inline-block;" id="item_lateral_<?php echo $datos_panels['id_myf']; ?>">
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
 

</div>

<?php

} else  {
echo "create yours";
 
echo "
<div id=\"caja_user_datos\" valign=\"middle\">
<div id=\"image_user\" ><img src=\"https://graph.facebook.com/".$user_fb_id."/picture\" width=\"30\" align=\"absmiddle\" alt=\"You!\"></div>&nbsp;&nbsp;<a href=\"home.php?q=profile\" class=\"texto negro\" title=\"You\">".$user_name."</a>  </div>";
?>

 

<div style="clear:both;"> 
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

<li class="item_menu_lat texto_10" id="tit_col_<?php echo $datos_panels['id_myf']; ?>">a
<div style="width:30px;float:left;height:30px;display:inline-block;">

<div class="handle" style="cursor:pointer;background:transparent;"><img src="img/ico_list.png" alt="" align="absmiddle"  ></div></div>
<div style="width:150px;float:left;margin-left:10px;display:inline-block;" id="item_lateral_<?php echo $datos_panels['id_myf']; ?>">
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
