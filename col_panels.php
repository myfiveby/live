<?php 
if (!empty($_SESSION['id'])){

 
?>
<script>$("#mcs_container").mCustomScrollbar("vertical",300,"easeOutCirc",1.05,"auto","yes","yes",15); </script>
<h3   class="tit_box" >My Panels <div style="float:right;margin:0px;width:30px; "><a href="javascript:void_()" onClick="hide_panels_menu()"><img src="img/boton_close.png"></a></div></h3>  


<?php 

$comprueba_exists_panels = Requete ("SELECT title, id_myf FROM myfive_panels  WHERE autor  = '".$_SESSION['id']."'    ORDER BY orden ASC" , $connexion);
 
$cont = 1;
 
 if (mysqli_num_rows($comprueba_exists_panels) !==0 ){

echo "<div align=\"center\" style=\"padding:5px;\">
<div class=\"button blue medium\" onClick=\"open_crear_new_panel('".$_SESSION['id']."');\" id=\"button_new_panel\">+ New Panel</div>
 </div> ";
 
 ?>
 
<div id="mcs5_container">
<div class="customScrollBox"> 
<div class="container">
<div class="content">
 <?php
 
 echo"
<ul id=\"user_lista_panels_left\" style=\"margin:0;padding:0px;width:100%;\">";

while ($datos_panels = mysqli_fetch_array($comprueba_exists_panels) ){
?>
<li class="item_menu_lat"  id="tit_col_<?php echo $datos_panels['id_myf']; ?>">

<div class="handle_panels_list" style="width:25px;float:left;display:inline-block;cursor:pointer;background:transparent;"><img src="img/ico_list.png" width="20" alt="Order" ></div>

<a href="javascript:void_()"; onclick="show_panel_main('<?php echo $datos_panels['id_myf']; ?>');"  class=" texto_12 negro"><div style="margin-left:25px;" id="item_lateral_<?php echo $datos_panels['id_myf']; ?>"><?php echo $datos_panels['title']; ?></div></a>
 

</li>
<?php

}  // end while
}  // end num rows

echo "

</ul> 
";    

 ?>
 

</div>
</div>
<div class="dragger_container">
<div class="dragger"></div>
 
</div>
</div>
</div>


<?php

}  ?>